<?php

namespace App\Controller;

use App\Repository\TodoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TodoController extends AbstractController
{
    #[Route('/todo', name: 'app_todo')]
    public function index(TodoRepository $todoRepository): Response
    {
        return $this->render('todos/index.html.twig', [
            'todos' => $todoRepository->findAll(),
        ]);
    }

}
