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

	public function dbselect($tablename, $select, $where=NULL){
		try{
				if(null==$this->db){
					$this->init();
				}
		 		$return = array();
			 	$query = $this->db->prepare("SELECT ".implode(", ",$select)." FROM ". $tablename." ". $where);
			 	$query->execute();
			 	for($i=0; $row = $query->fetch(); $i++){
					$return[$i] = array();
					foreach($row as $key => $rowitem){
						$return[$i][$key] = $rowitem;
					}
				}
			}catch (PDOException $e) {
				echo $e->getMessage();
			}
			$query->closeCursor();
			$this->db = null;
			return $return;
 	}

	 public function dbadd($tablename, $cols, $values){
		 	try{
		 		//$this->init();
			 	$query = $this->db->prepare("INSERT INTO ". $tablename."(".$cols.") VALUES (".$values.")");
			 	$result = $query->execute();
				$add = $query->rowCount();
			}catch (PDOException $e) {
				echo $e->getMessage();
			}
			$query->closeCursor();
			$this->db = null;
			return $add;
	 }
 
 public function dbupdate($tablename, $insert, $where){
 }

}