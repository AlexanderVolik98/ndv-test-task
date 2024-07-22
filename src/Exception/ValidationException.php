<?php

declare(strict_types=1);

namespace App\Exception;

use Symfony\Component\Validator\ConstraintViolationListInterface;

class ValidationException extends \RuntimeException implements ApiExceptionInterface
{
    public function __construct(private readonly ConstraintViolationListInterface $violations)
    {
        parent::__construct('validation failed', 400);
    }

    public function getViolations(): ConstraintViolationListInterface
    {
        return $this->violations;
    }
}
