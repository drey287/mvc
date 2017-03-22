<?php

class Utils {
	
	public static function separateURL($url) {
		
		$r   = explode("/", $url);
		
		if (count($r) < 2 ){
			$r[] =  'index';
		}
		return $r;
	}
	
	public static function checkController($controller) {
		
		$controller .= 'Controller';
		$controller = ucfirst($controller);
		
		$controller =  new $controller();
		if($controller){
			return $controller;
		}
		return false;
	}
	
	public static function doAction($controller,$action) {
		
		$action = 'action'.ucfirst($action);
		
		if (method_exists($controller, $action)){
			$controller->{$action}();
			return true;
		}
		return false;
		
	}
}