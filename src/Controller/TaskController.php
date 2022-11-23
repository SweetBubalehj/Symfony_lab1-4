<?php

namespace App\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use App\Service\GreetingService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    #[Route('/task/form', name: 'app_task')]
    public function new(GreetingService $greetingService): Response
    {
        $greeting = $greetingService->getGreetingMessage();
        $task = new Task();

        $form = $this->createForm(TaskType::class, $task);

        return $this->renderForm('task/index.html.twig', [
            'form' => $form,
            'greeting' => $greeting,
        ]);
    }
}
