<?php

namespace App\Service;

use App\Entity\Employee;
use App\Model\CreateEmployeeRequest;
use App\Model\UpdateEmployeeRequest;
use App\Repository\EmployeeRepository;
use Doctrine\ORM\EntityManagerInterface;

class EmployeeService
{
    public function __construct(
        private readonly EmployeeRepository $employeeRepository,
        private readonly EntityManagerInterface $entityManager,
    )
    {
    }

    public function getAllEmployees(): ?array
    {
        return $this->employeeRepository->findAll();
    }

    public function findEmployeeById(int $id): ?Employee
    {
        return $this->employeeRepository->find($id);
    }

    public function createEmployee(CreateEmployeeRequest $request): int
    {
        $employee = (new Employee())
            ->setName($request->getName())
            ->setPosition($request->getPosition())
            ->setSalary($request->getSalary());

        $this->entityManager->persist($employee);
        $this->entityManager->flush();

        return $employee->getId();
    }

    public function updateEmployee(int $id, UpdateEmployeeRequest $updateEmployeeRequest): int
    {
        $employee = $this->employeeRepository->getEmployeeById($id);

        $employee->setName($updateEmployeeRequest->getName())
            ->setSalary($updateEmployeeRequest->getSalary())
            ->setPosition($updateEmployeeRequest->getPosition());

        $this->entityManager->persist($employee);
        $this->entityManager->flush();

        return $id;
    }

    public function deleteEmployee(int $id): int
    {
        $employee = $this->employeeRepository->getEmployeeById($id);

        $this->entityManager->remove($employee);
        $this->entityManager->flush();

        return $id;
    }
}
