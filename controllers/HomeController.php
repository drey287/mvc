<?php

/**
 * Created by PhpStorm.
 * User: Andrei Ciubotariu
 * Date: 3/21/2017
 * Time: 1:40 PM
 */

class HomeController extends Controller {

    public function actionIndex(){
        $this->render('index',array(
        	'var1' => 'ceva',
        	'var2' => 'valoare',
		));
        
		$user = new User();
		$user->getUserId();
		
		$post = new Post();
		$post->getPostId();
    }
}