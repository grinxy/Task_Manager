<?php declare(strict_types=1);
class TaskModel extends Model
{

    protected array $tasks;
    protected $jsonFile;
    protected int $id;

    public function __construct()
    {
        $this->jsonFile = __DIR__ . "/dataBase.json";
        $this->tasks = [];
        $this->id = $this->generateID();



    }


    public function listTasks(): array
    {
        $dataBase = file_get_contents($this->jsonFile);

        $this->tasks = json_decode($dataBase, true);
        return $this->tasks;

    }

    public function searchByNum(int $taskNum) : ?array
    {
        $tasks = $this->listTasks();
        foreach($tasks as $task){
            if($task['id'] === $taskNum)
        {
            return $task;
        }
        }
        return null;
    }
    public function createTask(array $newTask): void
    {
        $this->listTasks();
        $this->tasks[] = $newTask;
        $jsonFile = json_encode($this->tasks, JSON_PRETTY_PRINT);
        file_put_contents($this->jsonFile, $jsonFile);

    }
    public function generateID(): int
    {
        $this->listTasks();
        $lastTask = end($this->tasks);   //coger ultimo objeto que hay en el array
        $newID = ($lastTask == null)? 1 : ++$lastTask["id"];     // incrementar numero id
        return $newID;

    }

    public function getTaskData(int $taskId): array
    {
        $taskList = $this->listTasks();

        foreach ($taskList as $task) {
            if ($taskId === $task["id"]) {
                return $task;
            }
        }

        return [];
    }



    public function updateTask(int $taskId, array $updatedTask): void
    {

        $taskList = $this->listTasks();
        foreach ($taskList as $index => $task) {
            if ($taskId === $task["id"]) {
                $taskIndex = $index;
                $this->tasks[$taskIndex] = $updatedTask;
            }

            $jsonFile = json_encode($this->tasks, JSON_PRETTY_PRINT);
            file_put_contents($this->jsonFile, $jsonFile);


        }

    }

    public function deleteTask(int $taskId): void
    {
        $taskList = $this->listTasks();
        foreach ($taskList as $index => $task) {
            if ($taskId === $task["id"]) {
                unset($taskList[$index]);
            }
            
        }
        $this->tasks = array_values($taskList);   // reindexar los elementos del array --> unset borra indice y no reordena
        $jsonFile = json_encode($this->tasks, JSON_PRETTY_PRINT);
        file_put_contents($this->jsonFile, $jsonFile);
        $taskList = $this->listTasks();

    }
} 

?>