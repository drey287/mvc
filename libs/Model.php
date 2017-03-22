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
		
		$className = get_called_class ();
		
		
		
		//trebuie sa vezi din ce classa ai facut requestu
		//creaza o instanta nou cu clasa respectiva
		//si populeaz-o cu datele extrase din db     $object->table_name = 'value frum db'
		
	}
}