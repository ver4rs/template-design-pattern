<?php

namespace App\FileMiner;

use App\Collection\DataMinerCollection;
use App\Exceptions\FileNotFoundException;

/**
 * Class CsvFileDataMiner
 */
interface FileDataMiner
{
    /**
     * @return DataMinerCollection
     */
    public function mine(): DataMinerCollection;
}
