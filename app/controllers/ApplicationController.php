<?php
require_once(__DIR__ . "/../models/TaskModel.php");
/**
 * Base controller for the application.
 * Add general things in this controller.
 */
class ApplicationController extends Controller
{
    private $taskModel;

    public function __construct()
    {

        $this->taskModel = new TaskModel();

    }

    public function indexAction()
    {


        $allTasks = $this->taskModel->listTasks();
        $this->view->allTasks = $allTasks;                     //metodo __set en View $this->view['allTasks'] = $allTasks para pasar data del controlador a la vista

    }

    public function createTaskAction(): void
    {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //recoger los datos introducidos en formulario de nueva tarea
            $description = $this->_getParam("description");
            $author = $this->_getParam("author");
            $status = $this->_getParam("status");
            $creationDate = date_create()->format('Y-m-d');
            $deadlineDate = date_create($_POST["deadline"]);
            $deadline = $deadlineDate->format('Y-m-d');


            $newTask = [
                'id' => $this->taskModel->generateID(),
                'description' => $description,
                'author' => $author,
                'creationDate' => $creationDate,
                'status' => $status,
                'deadline' => $deadline,
                'lastEdited' =>""
            ];

            $this->taskModel->createTask($newTask);
            header("Location: " . $this->_baseUrl() . "/createTaskOK");
            exit();

        }


    }

    public function createTaskOKAction(): void
    {
        $this->view->createTaskOK;
    }


    public function updateTaskAction(): void
    {
        $taskId = ((int) $this->_getParam('id'));

        $taskData = $this->taskModel->getTaskData($taskId);

        $this->view->taskData = $taskData;

    }

    public function updateTaskDataAction(): void
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $updatedTask = [
                'id' => ((int) $this->_getParam("id")),
                'description' => $this->_getParam("description"),
                'author' => $this->_getParam("author"),
                'creationDate' => $this->_getParam("creationDate"),
                'status' => $this->_getParam("status"),
                'deadline' => $this->_getParam("deadline"),
                'lastEdited' =>  date_create()->format('Y-m-d')
            ];


            $this->taskModel->updateTask($updatedTask['id'], $updatedTask);


        }
    }
    public function deleteTaskAction(): void
    {
        $taskId = ((int) $this->_getParam('id'));
        $this->taskModel->deleteTask($taskId);

        header("Location: " . $this->_baseUrl());
        exit();

    }
}




