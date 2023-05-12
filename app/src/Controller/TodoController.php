<?php

namespace App\Controller;

use App\Entity\Todo;
use App\Form\TodoType;
use App\Repository\TodoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class TodoController extends AbstractController
{
    private $entityManager; // déclarer la propriété privée $entityManager

    public function __construct(EntityManagerInterface $entityManager) // injecter EntityManagerInterface dans le constructeur
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_todos')]
    public function index(Request $request, TodoRepository $todoRepository): Response
    {
        $todos = $todoRepository->findAll();

        return $this->render('todos/index.html.twig', [
            'todos' => $todos
        ]);
    }

    #[Route('/new', name: 'app_new_todo')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
{
    $todo = new Todo();

    $form = $this->createForm(TodoType::class, $todo);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->persist($todo);

        // Sauvegarde de la propriété "done"
        $done = $form->get('done')->getData();
        $todo->setDone($done);

        $entityManager->flush();

        return $this->redirectToRoute('todo_index');
    }

    return $this->render('todo/new.html.twig', [
        'form' => $form->createView(),
    ]);
}

public function edit(Request $request, Todo $todo, EntityManagerInterface $entityManager): Response
{
    $form = $this->createForm(TodoType::class, $todo);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // Sauvegarde de la propriété "done"
        $done = $form->get('done')->getData();
        $todo->setDone($done);

        $entityManager->flush();

        return $this->redirectToRoute('todo_index');
    }

    return $this->render('todo/edit.html.twig', [
        'form' => $form->createView(),
    ]);
}


    #[Route('/delete/{id}', name: 'app_delete_todo')]
    public function delete(TodoRepository $todoRepository, int $id): Response
    {
        $todo = $todoRepository->find($id);

        if (!$todo) {
            throw $this->createNotFoundException('The todo does not exist');
        }

        $this->entityManager->remove($todo); // utiliser $entityManager pour supprimer le todo
        $this->entityManager->flush(); // envoyer la requête à la base de données

        return $this->redirectToRoute('app_todos');
    }
}