<?php

namespace App\Entity;

/**
 * Class DataMiner
 */
interface DataMinerInterface
{
    /**
     * @return int
     */
    public function getNumber(): int;

    /**
     * @return string
     */
    public function getMiner(): string;

    /**
     * @return \DateTime
     */
    public function getTime(): \DateTime;
}
