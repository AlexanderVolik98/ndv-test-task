<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\SubjectRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

#[ORM\HasLifecycleCallbacks]
#[ORM\Entity(repositoryClass: SubjectRepository::class)]
class Subject
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'integer')]
    //#[ORM\OrderBy(["name" => "ASC"])]
    private int $population;

    #[ORM\Column(type: 'integer')]
    private int $populationOverWorkingAge;

    #[ORM\Column(type: 'integer')]
    private int $populationUnderWorkingAge;

    #[ORM\Column(type: 'integer')]
    private int $workingPopulation;


    #[ORM\ManyToOne(targetEntity: Employee::class, inversedBy: 'subjects')]
    #[JoinColumn(name: 'district_id', referencedColumnName: 'id')]
    private Employee $district;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDistrict(): Employee
    {
        return $this->district;
    }

    public function setDistrict(Employee $district): void
    {
        $this->district = $district;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPopulation(): int
    {
        return $this->population;
    }

    public function setPopulation(int $population): void
    {
        $this->population = $population;
    }

    public function getPopulationOverWorkingAge(): int
    {
        return $this->populationOverWorkingAge;
    }

    public function setPopulationOverWorkingAge(int $populationOverWorkingAge): void
    {
        $this->populationOverWorkingAge = $populationOverWorkingAge;
    }

    public function getPopulationUnderWorkingAge(): int
    {
        return $this->populationUnderWorkingAge;
    }

    public function setPopulationUnderWorkingAge(int $populationUnderWorkingAge): void
    {
        $this->populationUnderWorkingAge = $populationUnderWorkingAge;
    }

    public function getWorkingPopulation(): int
    {
        return $this->workingPopulation;
    }

    public function getWorkingPopulationWithLabel(): int
    {
        return $this->workingPopulation;
    }

    public function setWorkingPopulation(int $workingPopulation): void
    {
        $this->workingPopulation = $workingPopulation;
    }
}
