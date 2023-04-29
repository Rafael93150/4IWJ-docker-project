<?php

namespace App\Controller;

use App\Entity\Todo;
use App\Form\TodoType;
use App\Repository\TodoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TodoController extends AbstractController
{
    #[Route('/todo', name: 'app_todo')]
    public function index(Request $request, TodoRepository $todoRepository, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createFormBuilder()
            ->add('todos', \Symfony\Component\Form\Extension\Core\Type\CollectionType::class, [
                'entry_type' => \Symfony\Component\Form\Extension\Core\Type\CheckboxType::class,
                'entry_options' => [
                    'label' => false,
                    'required' => false,
                ],
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $todoIds = $data['todos'];
            $todos = $todoRepository->findBy(['id' => $todoIds]);

            foreach ($todos as $todo) {
                $todo->setCompleted(!$todo->isCompleted());
                $entityManager->persist($todo);
            }

            $entityManager->flush();

            return $this->redirectToRoute('app_todo');
        }

        return $this->render('todos/index.html.twig', [
            'todos' => $todoRepository->findAll(),
            'form' => $form->createView(),
        ]);
    }
}
