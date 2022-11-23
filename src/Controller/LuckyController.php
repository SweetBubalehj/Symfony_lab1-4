<?php

namespace App\Controller;

use App\Service\GreetingService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    #[Route('/lucky/{id<\d+>}', name: 'app_lucky')]
    public function index(int $id, LoggerInterface $logger, GreetingService $greetingService): Response
    {
        $greeting = $greetingService->getGreetingMessage();

        try {
            $random_number = random_int(0, $id);
        } catch (\Exception $e) {
            $random_number = 1;
        }

        $logger->info("The lucky number is {$random_number}");

        return $this->render('lucky/index.html.twig', [
            'lucky_number'  => $random_number,
            'greeting'      => $greeting,
        ]);
    }
}
