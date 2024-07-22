<?php

declare(strict_types=1);

namespace App\Exception;

class EmployeeNotFoundException extends \RuntimeException implements ApiExceptionInterface
{
    public function __construct()
    {
        parent::__construct('employee not found', 404);
    }
}
