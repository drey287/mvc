<?php

/**
 * Created by PhpStorm.
 * User: Andrei Ciubotariu
 * Date: 3/22/2017
 * Time: 10:09 AM
 */

class User extends Model
{
	public $table_name = 'users';
	
	public function getUserId()
	{
		$this->getTableName();
		$this->getByPk(1);
	}

}