<?php
class connexion{
	
	public function __construct(){}
	public function cnx(){
		$host = "localhost";
		$username = "root";
		$password = "";
		$dbname = "devis";

			$db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
			return $db;
	}
}
?>