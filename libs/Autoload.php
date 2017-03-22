<?php
/**
 * Created by PhpStorm.
 * User: Andrei Ciubotariu
 * Date: 3/22/2017
 * Time: 11:28 AM
 */

function controllers_autoloader($class)
{
	global $config;
	load_class($class,$config['controllers_path']);
}

function models_autoloader($class)
{
	global $config;
	load_class($class,$config['models_path']);
}

function libs_autoloader($class)
{
	global $config;
	load_class($class,$config['libs_path']);
}

function load_class($class, $path)
{
	$class = ucfirst($class);
	$file = $path . $class. '.php';

	if(file_exists($file)){
		require_once $file ;
	}
}

spl_autoload_register('controllers_autoloader');
spl_autoload_register('models_autoloader');
spl_autoload_register('libs_autoloader');


















//spl_autoload_register('models_autoloader');
//spl_autoload_register('models_autoloader');
//spl_autoload_register('models_autoloader');