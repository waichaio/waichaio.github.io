<?php

class Database{

	public $dbserver = '';
	public $username = '';
	public $password = '';
	public $database = '';
	public $db = '';

	public function __construct(){
		$this->dbserver = 'localhost';
		$this->username = 'root';
		$this->database = 'kickstartapp';
		$this->password = '';
		$this->db = new PDO("mysql:host=".$this->dbserver.";dbname=".$this->database, $this->username, $this->password);
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	public function init(){
		$this->dbserver = 'localhost';
		$this->username = 'root';
		$this->database = 'kickstartapp';
		$this->password = '';
		$this->db = new PDO("mysql:host=".$this->dbserver.";dbname=".$this->database, $this->username, $this->password);
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	public function dbselect($table, $select, $where=NULL){
 }

	 public function dbadd($tablename, $cols, $values){
		 	try{
		 		//$this->init();
			 	$query = $this->db->prepare("INSERT INTO". $tablename."(".$cols.") VALUES (".$values.")");
			 	$result = $query->execute();
				$add = $query->rowCount();
			}catch (PDOException $e) {
				echo $e->getMessage();
			}
			$query->closeCursor();
			//$his->db = null;
			return $add;
	 }
 
 public function dbupdate($tablename, $insert, $where){
 }

}