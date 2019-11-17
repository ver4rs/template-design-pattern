<?php

namespace App\FileMiner;

use App\Collection\DataMinerCollection;
use App\Entity\DataMiner;
use App\Exceptions\FileNotFoundException;
use App\ValueObject\FileSourceData;

/**
 * Class JsonFileDataMiner
 */
class JsonFileDataMiner implements FileDataMiner
{
    /** @var string $file */
    protected $file;

    /**
     * @param string $file
     */
    public function __construct(string $file)
    {
        $this->file = $file;
    }

    /**
     * @return DataMinerCollection
     * @throws FileNotFoundException
     */
    public function mine(): DataMinerCollection
    {
        $rawData = $this->openFile($this->file);

        $baseData = $this->extractData($rawData);

        $transformedData = $this->transformData($baseData);

        $this->closeFile($rawData);

        return $transformedData;
    }

    /**
     * @param string $file
     *
     * @return FileSourceData
     * @throws FileNotFoundException
     */
    public function openFile(string $file): FileSourceData
    {
        $data = file_get_contents($file);

        if (!$data) {
            throw new FileNotFoundException('.json');
        }

        return new FileSourceData($file, $data, null);
    }

    /**
     * @param FileSourceData $sourceData
     *
     * @return array
     */
    public function extractData(FileSourceData $sourceData): array
    {
        $data = json_decode($sourceData->getData());
        $newData = [];

        foreach ($data as $item){
            $newData[] = (array) $item;
        }

        return $newData;
    }

    /**
     * @param array $data
     *
     * @return DataMinerCollection
     */
    public function transformData(array $data): DataMinerCollection
    {
        $newData = new DataMinerCollection();

        foreach ($data as $item) {
            $newData->add(new DataMiner($item['number'], $item['miner'], $item['time']));
        }

        return $newData;
    }

    /**
     * @param FileSourceData $sourceData
     */
    public function closeFile(FileSourceData $sourceData): void
    {
        // ...
    }
}
