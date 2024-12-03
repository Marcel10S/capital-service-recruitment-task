<?php

namespace App\Infrastructure\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/loan-schedule', name: 'app_loan_schedule_')]
final class LoanController extends AbstractController
{
    #[Route(name: 'create', methods: ['POST'])]
    public function index(): Response
    {
        // Tworzy raty na podstawie wzoru
        return $this->json(['data' => 123]);
    }

    #[Route(name: 'list', methods: ['GET'])]
    public function list(): Response
    {
        // Zwraca listę ofert z konkretnym sortowaniem
        return $this->json(['data' => 321]);
    }

    #[Route('/{id}/exclude', name: 'exclude', methods: ['DELETE'])]
    public function exclude(): Response
    {
        // Wyklucza ratę, czyli usuwa?
        return $this->json(['data' => 222]);
    }
}
