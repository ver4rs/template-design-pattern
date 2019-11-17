<?php

namespace App\Exceptions;

use Exception;
use Throwable;

/**
 * Class FileNotFoundException
 */
class FileNotFoundException extends Exception
{
    /**
     * @param string         $extension
     * @param int            $code
     * @param Throwable|null $previous
     */
    public function __construct(string $extension = "", int $code = 0, Throwable $previous = null)
    {
        $message = 'File with extension "' . $extension . '" not found.';

        parent::__construct($message, $code, $previous);
    }
}
