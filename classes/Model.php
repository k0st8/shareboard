<?php

/**
* 
*/
abstract class Model
{
	protected $dbh;
	protected $stmt;
	protected $table = null;

	public function __construct()
	{
		try{
			$this->dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" .DB_NAME, DB_USER, DB_PASS);
			$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e){
			echo 'Connection failed '.$e->getMessage();
		}
	}

	public function query($query)
	{
		$this->stmt = $this->dbh->prepare($query);
	}

	public function bind($param, $value, $type = null)
	{
		if(is_null($type)){
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;

				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;

				default:
					$type = PDO::PARAM_STR;
					break;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute()
	{
		$this->stmt->execute();
	}
	/**
	* $type PDO::FETCH_*
	*/
	public function resultSet($type = PDO::FETCH_ASSOC)
	{
		$this->execute();
		return $this->stmt->fetchAll($type);
	}

	public function lastInsertId()
	{
		return $this->dbh->lastInsertId();	
	}

	public function single($type = PDO::FETCH_ASSOC)
	{
		$this->execute();
		return $this->stmt->fetch($type);
	}
}