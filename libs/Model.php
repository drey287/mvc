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
	
	
	public function __construct() { }
	
	/**
	 * @return Model
	 */
	public static function model()
	{
		$class = get_called_class();
		return new $class();
	}
	
	public function getTableName()
	{
		$table_name = $this->table_name;
		return $table_name;
	}
	
	public function getByPk($pk)
	{
		$query = 'SELECT * FROM ' . $this->table_name . ' WHERE id= '.$pk;
		
		$db = new Database();
		$db->query($query);
		
		$results = $db->resultset();
		$oject = $this->populate($results);
		
		return  $oject[0];
	}
	
	public function delete()
	{
		$query = 'DELETE FROM ' . $this->table_name . ' WHERE id = :id';
		
		$db = new Database();
		$db->query($query);
		
		$db->bind(':id' , $this->id , PDO::PARAM_INT);
		$db->execute();
	}
	

	
	public function getAll($criteria = array())
	{
		$criteria = array('first_name' => 'Andrei', 'last_name' => 'ciubotariu');
		$numItems = count($criteria);
		$i = 0;
		$conditions = '';
		foreach($criteria as $key => $item)
		{
			$i++;
			
			$conditions .= $key . ' = ' . '"' . $item .'"';

			if ($i != $numItems) {
				$conditions .= ' AND ';
			}
		}

		// SELECT * from users WHERE first_name = "Andrei" AND last_name = "ciubotariu"
//		var_dump($conditions);die;
			$query  = 'SELECT * FROM ' . $this->table_name. ' WHERE '. $conditions ;
			$db = new Database();
			$db->query($query);
			$db->resultset();
		var_dump($db->resultset());
	}
	
	
	
	private function populate($results)
	{
		$class =  get_called_class();
		
		foreach ($results as $item)
		{
			$obj = new $class();
			foreach ($item as $key => $value)
			{
				$obj->$key = $value;
			}
			$objects[] = $obj;
		}
		return $objects;
	}
}