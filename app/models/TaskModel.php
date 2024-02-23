<?php declare(strict_types=1);
class TaskModel
{

   protected array $tasks;
    protected $jsonFile;
    protected int $id;

    public function __construct()
    {
        $this->jsonFile = __DIR__ . "/dataBase.json";
        $this->tasks = [];
        $this->id = $this->getID();
      
     
    }


    public function listTasks(): array
    {
        $dataBase = file_get_contents($this->jsonFile);

        $this->tasks = json_decode($dataBase, true);
        return $this->tasks;

    }

    public function createTask(array $newTask): void
    {
        $this->listTasks();
        $this->tasks[] = $newTask;
        $jsonFile = json_encode($this->tasks, JSON_PRETTY_PRINT);
        file_put_contents($this->jsonFile, $jsonFile);

    }
    public function getID(): int
    {
        $this->listTasks();
        $lastTask = end($this->tasks);   //coger ultimo objeto que hay en el array
        $newID = ++$lastTask["id"];     // incrementar numero id
        return $newID;
    }
}

?>