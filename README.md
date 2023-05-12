# 4IWJ DOCKER PROJECT

To run the project, execute the following command in the terminal: docker-compose up --build.

Access the project in your web browser at http://localhost:8080/.

The todo list can be accessed at http://localhost:8080/todo.

Migration code:
1.
php bin/console make:migration

2.
src/migrations 
add this method :
public function up(Schema $schema): void
{
    $this->addSql('ALTER TABLE todo ADD done BOOLEAN DEFAULT 0 NOT NULL');
}

3.
php bin/console doctrine:migrations:migrate

4.
src/Controller/ApiController.php
modify this method
public function getTodos(TodoRepository $todoRepository): JsonResponse
{
    $todos = $todoRepository->findAll();

    $data = [];
    foreach ($todos as $todo) {
        $data[] = [
            'id' => $todo->getId(),
            'title' => $todo->getTitle(),
            'done' => $todo->getDone(), // Ajout de la propriété "done"
        ];
    }

    return $this->json($data);
}
