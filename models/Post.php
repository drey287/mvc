<?php

/**
 * Created by PhpStorm.
 * User: Andrei Ciubotariu
 * Date: 3/22/2017
 * Time: 3:32 PM
 */
class Post extends Model
{
	public $table_name = 'posts';
	
	public function getPostId()
	{
		$this->getTableName();
	}
}