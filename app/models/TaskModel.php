<?php declare(strict_types=1);
class TaskModel
{

   protected array $tasks;
    protected $jsonFile;

    public function __construct()
    {
        $this->jsonFile = __DIR__ . "/dataBase.json";
     
    }


    public function listTasks(): void
    {
        $dataBase = file_get_contents($this->jsonFile);

        $this->tasks = json_decode($dataBase, true);

    }
    public function getTasks(): array
    {
        return $this->tasks;
    }    

}

?>