<?php
class database {
	private $host	= 'localhost';
	private $user	= 'beheerder';
	private $pass	= 'geheim';
	private $dbname	= 'db_vindbaarin';

	private $dbh;
	private $error;
	private $stmt;

	public function __construct(){
		// Set DSN
		$dsn = 'mysql:host='. $this->host . ';dbname='. $this->dbname;
		// Set Options
		$options = array(
			PDO::ATTR_ERRMODE		=> PDO::ERRMODE_EXCEPTION
		);
		// Create new PDO and error handling
		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
		} catch(PDOEception $e){
			$this->error = $e->getMessage();
		}
	}

	public function query($query){
		$this->stmt = $this->dbh->prepare($query);
	}

	public function execute(){
		return $this->stmt->execute();
	}

	public function lastInsertId(){
		$this->dbh->lastInsertId();
	}

	public function resultset(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}