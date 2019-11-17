<?php

namespace App\ValueObject;

/**
 * Class FileSourceData
 */
class FileSourceData
{
    /** @var string $file */
    private $file;

    /** @var string|null $data */
    private $data;

    /** @var $stream */
    private $stream;

    /**
     * @param string $file
     * @param string|null $data
     * @param        $stream
     */
    public function __construct(string $file, ?string $data, $stream)
    {
        $this->file   = $file;
        $this->data   = $data;
        $this->stream = $stream;
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getStream()
    {
        return $this->stream;
    }
}
