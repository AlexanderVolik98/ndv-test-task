<?php

declare(strict_types=1);

namespace App\Model;

use Symfony\Component\Validator\Constraints\NotBlank;

class UpdateEmployeeRequest
{
    private ?string $name = null;

    private ?string $position = null;

    private ?int $salary = null;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(?string $position): void
    {
        $this->position = $position;
    }

    public function getSalary(): ?int
    {
        return $this->salary;
    }

    public function setSalary(?int $salary): void
    {
        $this->salary = $salary;
    }
}
