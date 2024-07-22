<?php

declare(strict_types=1);

namespace App\EventListener;

use App\Exception\ApiExceptionInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ApiExceptionListener
{
    public function __invoke(ExceptionEvent $event): void
    {
        $throwable = $event->getThrowable();

        if ($throwable instanceof ApiExceptionInterface) {
            $event->setResponse(
                new JsonResponse(
                    [
                        'message' => $event->getThrowable()->getMessage(),
                        'code' => $event->getThrowable()->getCode()
                    ],
                    $event->getThrowable()->getCode())
            );
        }
    }
}
