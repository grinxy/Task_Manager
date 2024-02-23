<?php 

/**
 * Used to define the routes in the system.
 * 
 * A route should be defined with a key matching the URL and an
 * controller#action-to-call method. E.g.:
 * 
 * '/' => 'index#index',
 * '/calendar' => 'calendar#index'
 */
$routes = array(

	'/' => 'Application#index', 
	'/createTask' => 'Application#createTask',
	'/createTaskOK' => 'Application#createTaskOK',
	/* 
	 '/' => 'Application#index', --> o directamente showTaskList
    '/createTask' => 'Application#createTask',
    '/updateTask' => 'Application#updateTask',
    '/deleteTask' => 'Application#deleteTask',
    */
	
);
