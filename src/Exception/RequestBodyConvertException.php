<?php

declare(strict_types=1);

namespace App\Exception;

class RequestBodyConvertException extends \RuntimeException implements ApiExceptionInterface
{
    public function __construct(\Throwable $previous)
    {
        parent::__construct('error while unmarshalling request body', 400);
    }
}
