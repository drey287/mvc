<?php

class Controller {

    function render($view, $data = array())
	{
		
        // get the class name in whitch the method is used
        $className = get_called_class ();

        // replace the Controller to null from class name
        $classViewDir = str_replace('Controller', '' , $className);


        global $config;

        $view_path = $config['views_path'].strtolower($classViewDir). '/' .$view. '.php';

        if(!file_exists($view_path)) {
            die('The wiew '.$view.' dose not exist');
        }
		$this->loadView($view_path, $data);
    }
    
    private function loadView($path, $data)
	{
		extract($data,EXTR_PREFIX_SAME,'data');
		require_once ($path);
	}
}