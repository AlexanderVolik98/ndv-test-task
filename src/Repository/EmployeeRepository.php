<?php

namespace App\Repository;

use App\Entity\Employee;
use App\Exception\EmployeeNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Employee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Employee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Employee[]    findAll()
 * @method Employee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeeRepository extends ServiceEntityRepository
{
    use RepositoryModifyTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Employee::class);
    }

    public function getEmployeeById(int $id): Employee
    {
        $employee = $this->find($id);

        if (null === $employee) {
            throw new EmployeeNotFoundException();
        }

        return $employee;
    }
}
