<?php

namespace App\Collection;

use App\Entity\DataMinerInterface;

class DataMinerCollection
{
    /** @var array $items */
    private $items = [];

    public function add(DataMinerInterface $dataMiner)
    {
        $this->items[] = $dataMiner;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
