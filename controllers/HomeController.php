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
		
        $post = Post::model()->getByPk(3);
//		$post->delete();
		
		$user = User::model()->getByPk(1);
//		$user->delete();
		$user->getAll();
		
//		var_dump($post);
//		var_dump($user);
		
		
    }
}