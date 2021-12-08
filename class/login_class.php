<?php
	class login{
		public function __construct(){
			
		}
		public function verif($id,$pass)
		{
			require_once"../config/config.php";
			$c=new connexion();
			$pdo=$c->cnx();
			$req="select count(*) from utilisateurs where id='$id' and pass='$pass'";
			$res=$pdo->query($req);
			return $res->fetchColumn();
		}
		public function getInfo($id){
			require_once"../config/config.php";
			$c=new connexion();
			$pdo=$c->cnx();
			$req="select concat(nom,' ',prenom) from utilisateurs where id='$id'";
			$res=$pdo->query($req);
			foreach ($res as $r)
				return $r[0];
		}
	}


?>