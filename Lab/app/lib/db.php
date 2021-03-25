<?php
	
	class db {
		private $pdo = NULL;
		
		public function query($sql, $bind = []){
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute($bind);
			return $stmt;
		}
		
		private function connect(){
			if($this->pdo === NULL){
				$this->pdo = new pdo('mysql:host=localhost; dbname=aioc3000; charset=utf8','root','',[
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
				]);
			}
			return $this->pdo;
		}
	}
	
?>