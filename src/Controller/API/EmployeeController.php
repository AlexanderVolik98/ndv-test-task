<?php

declare(strict_types=1);

namespace App\Controller\API;

use App\Attribute\RequestBody;
use App\Model\CreateEmployeeRequest;
use App\Model\UpdateEmployeeRequest;
use App\Service\EmployeeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Attributes as OA;

class EmployeeController extends AbstractController
{
    public function __construct(
        private readonly EmployeeService $employeeService,
    ) {}

    #[Route(path: '/api/v1/employees', methods: ['GET'])]
    #[OA\Tag(name: 'Employee API')]
    #[OA\Response(response: 200, description: 'Получить список сотрудников')]
    public function getEmployees(): Response
    {
        return $this->json($this->employeeService->getAllEmployees());
    }

    #[Route(path: '/api/v1/employee/{id}', methods: ['GET'])]
    #[OA\Tag(name: 'Employee API')]
    #[OA\Response(response: 200, description: 'Получить сотрудника по id')]
    #[OA\Response(response: 404, description: 'сотрудник не найден')]
    public function getEmployeeById(int $id): Response
    {
        return $this->json($this->employeeService->findEmployeeById($id));
    }

    #[Route(path: '/api/v1/employee', methods: ['POST'])]
    #[OA\Tag(name: 'Employee API')]
    #[OA\Response(response: 200, description: 'Создать сотрудника')]
    #[OA\Response(response: 400, description: 'Ошибка валидации')]
    public function createEmployee(#[RequestBody] CreateEmployeeRequest $createEmployeeRequest): Response
    {
        return $this->json('Новый сотрудник создан, id: ' . $this->employeeService->createEmployee($createEmployeeRequest));
    }

    #[Route(path: '/api/v1/employee/{id}', methods: ['PUT'])]
    #[OA\Tag(name: 'Employee API')]
    #[OA\Response(response: 200, description: 'Обновить сотрудника')]
    #[OA\Response(response: 400, description: 'Ошибка валидации')]
    #[OA\Response(response: 404, description: 'сотрудник не найден')]
    public function updateEmployee(int $id, #[RequestBody] UpdateEmployeeRequest $updateEmployeeRequest): Response
    {
        return $this->json('Сотрудник обновлен, id: ' . $this->employeeService->updateEmployee($id, $updateEmployeeRequest));
    }

    #[Route(path: '/api/v1/employee/{id}', methods: ['DELETE'])]
    #[OA\Tag(name: 'Employee API')]
    #[OA\Response(response: 200, description: 'Удалить сотрудника')]
    #[OA\Response(response: 404, description: 'Сотрудник не найден')]
    public function deleteEmployee(int $id): Response
    {
        return $this->json('Сотрудник удален, id: ' . $this->employeeService->deleteEmployee($id));
    }
}
