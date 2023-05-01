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
    public function new(Request $request, TodoRepository $todoRepository): Response
    {
        $todo = new Todo();
        $form = $this->createForm(TodoType::class, $todo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $todoRepository->save($todo, true);

            return $this->redirectToRoute('app_todos', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('todos/new.html.twig', [
            'todo' => $todo,
            'form' => $form,
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
