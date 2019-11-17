<?php

namespace App\Entity;

/**
 * Class DataMiner
 */
class DataMiner implements DataMinerInterface
{
    /** @var int $number */
    private $number;

    /** @var string $miner */
    private $miner;

    /** @var int $time */
    private $time;

    /**
     * @param int    $number
     * @param string $miner
     * @param int    $time
     */
    public function __construct(int $number, string $miner, int $time)
    {
        $this->number = $number;
        $this->miner  = $miner;
        $this->time   = $time;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getMiner(): string
    {
        return $this->miner;
    }

    /**
     * @return \DateTime
     * @throws \Exception
     */
    public function getTime(): \DateTime
    {
        return ((new \DateTime())->setTimestamp($this->time));
    }

}
