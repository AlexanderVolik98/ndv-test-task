<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\EmployeeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    public function __construct(
        private readonly EmployeeService $employeeService,
    ) {}

    #[Route(path: '/', methods: ['GET'])]
    public function index(): Response
    {
        $employees = $this->employeeService->getAllEmployees();

        return $this->render('base.html.twig', [
            'employees' => $employees,
        ]);
    }
}
