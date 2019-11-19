<?php

namespace App\FileMiner;

use App\Collection\DataMinerCollection;
use App\Exceptions\FileNotFoundException;
use App\ValueObject\FileSourceData;

/**
 * Class BaseFileDataMiner
 */
abstract class BaseFileDataMiner1 implements FileDataMiner
{
    /** @var string $file */
    protected $file;

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
    abstract public function openFile(string $file): FileSourceData;

    /**
     * @param FileSourceData $sourceData
     *
     * @return array
     */
    abstract public function extractData(FileSourceData $sourceData): array;

    /**
     * @param array $data
     *
     * @return DataMinerCollection
     */
    abstract public function transformData(array $data): DataMinerCollection;

    /**
     * @param FileSourceData $sourceData
     */
    abstract public function closeFile(FileSourceData $sourceData): void;
}
