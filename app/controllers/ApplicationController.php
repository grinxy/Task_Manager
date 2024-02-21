<?php
require_once(__DIR__ ."/../models/TaskModel.php");
/**
 * Base controller for the application.
 * Add general things in this controller.
 */
class ApplicationController extends Controller 
{
	
    public function indexAction(){
        $taskModel = new TaskModel();
        $taskModel->listTasks();
        $tasks = $taskModel->getTasks();
        $this->view->allTasks = $tasks;
     
      }

      public function createTaskAction(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //recoger los datos introducidos en formulario de nueva tarea
        $description = $_POST["description"];
        $author = $_POST["author"];
        $status = $_POST["status"];
        $creationDate = date_create()->format('Y-m-d');
        $deadline = $_POST["deadline"]->format('Y-m-d');

      }
    }


}
