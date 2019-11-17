<?php

namespace App\Http\Handler\Action;

use App\FileMiner\CsvFileDataMiner;
use App\FileMiner\FileDataMiner;
use App\FileMiner\JsonFileDataMiner;

/**
 * Class ShowDataMinerHandler
 */
class ShowDataMinerHandler
{
    /** @var FileDataMiner $fileDataMiner */
    protected $fileDataMiner;

    /**
     * @param FileDataMiner $fileDataMiner
     */
    public function __construct(FileDataMiner $fileDataMiner)
    {
        $this->fileDataMiner = $fileDataMiner;
    }

    /**
     * @return array
     */
    public function showData(): array
    {
        $data = $this->fileDataMiner->mine()
            ->getItems();

        return [
            'template' => 'dataMiner.index',
            'params' => [
                'data' => $data,
            ],
        ];
    }
}
