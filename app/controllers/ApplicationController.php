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

}
