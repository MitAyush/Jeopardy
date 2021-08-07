<?php 
	function view($path, $data = NULL){
		require_once __DIR__."./../view/header.php";
		require_once __DIR__."./../view/". $path . ".php";
		require_once __DIR__."./../view/footer.php";
	}

	function getCon()
	{
		$host = 'localhost';
		$db   = 'jeopardy';
		$user = 'root';
		$pass = '';

		$options = [
		    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
		    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
		    \PDO::ATTR_EMULATE_PREPARES   => false,
		];
		$dsn = "mysql:host=$host;dbname=$db;";
		try {
		     $con = new \PDO($dsn, $user, $pass, $options);
		} catch (\PDOException $e) {
		     throw new \PDOException($e->getMessage(), (int)$e->getCode());
		}
		return $con;
	}