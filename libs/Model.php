<?php

/**
 * Created by PhpStorm.
 * User: Andrei Ciubotariu
 * Date: 3/22/2017
 * Time: 3:01 PM
 */
class Model
{
	public $table_name;
	
	public function getTableName()
	{
		echo $this->table_name;
	}
	
	public function getByPk($pk)
	{
		$query = 'SELECT * FROM '.$this->table_name.' WHERE id = '.$pk;
		
		$db = new Database();
		$db->query($query);
	}
}