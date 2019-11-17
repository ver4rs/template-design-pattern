<?php

namespace App\FileMiner;

use App\Collection\DataMinerCollection;
use App\Entity\DataMiner;
use App\Exceptions\FileNotFoundException;
use App\ValueObject\FileSourceData;

/**
 * Class CsvFileDataMiner
 */
class CsvFileDataMiner implements FileDataMiner
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
        if (($handle = fopen($file, "r")) !== FALSE) {
            return new FileSourceData($file, null, $handle);
        }

        throw new FileNotFoundException('.csv');
    }

    /**
     * @param FileSourceData $sourceData
     *
     * @return array
     */
    public function extractData(FileSourceData $sourceData): array
    {
        $newData = [];

        $handle = $sourceData->getStream();
        for ($i = 0; $row = fgetcsv($handle); ++$i) {
            $newData[] = $row;
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
        $headKeys = $data[0] ?? null;
        if (!is_null($headKeys)) {
            unset($data[0]);
        }

        $newData = new DataMinerCollection();

        foreach ($data as $item) {
            $newData->add(new DataMiner($item[0], $item[1], $item[2]));
        }

        return $newData;
    }

    /**
     * @param FileSourceData $sourceData
     */
    public function closeFile(FileSourceData $sourceData): void
    {
        fclose($sourceData->getStream());
    }
}
