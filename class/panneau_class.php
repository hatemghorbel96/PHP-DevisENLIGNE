<?php
	class panneau{
		public function __construct(){
			
		}
		public function afficheToutDemandes(){
			require_once"../config/config.php";
			$c=new connexion();
			$pdo=$c->cnx();
			$req="select * from demandes";
			return $pdo->query($req);
		}
		public function afficheDemande($Devis){
			require_once"../config/config.php";
			$c=new connexion();
			$pdo=$c->cnx();
			$req="select * from demandes where iddevis = $Devis";
			return $pdo->query($req);
		}
		public function typeDevis($id){
			require_once"../config/config.php";
			$c=new connexion();
			$pdo=$c->cnx();
			$req="select libelle from main where id=$id";
			$res=$pdo->query($req);
			foreach($res as $r)
				return $r[0];
		}
		public function demandeTotal(){
			require_once"../config/config.php";
			$c=new connexion();
			$pdo=$c->cnx();
			$req="select count(*) from demandes";
			$res=$pdo->query($req);
			return $res->fetchColumn();
		}
		public function demandeJour(){
			require_once"../config/config.php";
			$c=new connexion();
			$pdo=$c->cnx();
			$req="select count(*) from demandes where dated = curdate()";
			$res=$pdo->query($req);
			return $res->fetchColumn();
		}
		public function demandeSemaine(){
			require_once"../config/config.php";
			$c=new connexion();
			$pdo=$c->cnx();
			$req="select count(*) from demandes where week(dated) = week(curdate())";
			$res=$pdo->query($req);
			return $res->fetchColumn();
		}
		public function demandeMoin(){
			require_once"../config/config.php";
			$c=new connexion();
			$pdo=$c->cnx();
			$req="select count(*) from demandes where MONTH(dated) = MONTH(curdate())";
			$res=$pdo->query($req);
			return $res->fetchColumn();
		}
		public function clientInfo($id){
			require_once"../config/config.php";
			$c=new connexion();
			$pdo=$c->cnx();
			$req="select client from demandes where id=$id";
			$res=$pdo->query($req);
			foreach ($res as $r)
				$json=$r;
			return $json["client"];

		}
		public function getUserImg($id){
			require_once"../config/config.php";
			$c=new connexion();
			$pdo=$c->cnx();
			$req="select image from utilisateurs where id='$id'";
			$res=$pdo->query($req);
			foreach ($res as $r)
				return $r[0];
		}
		public function getUserDesc($id){
			require_once"../config/config.php";
			$c=new connexion();
			$pdo=$c->cnx();
			$req="select description from utilisateurs where id='$id'";
			$res=$pdo->query($req);
			foreach ($res as $r)
				return $r[0];
		}
		public function getInformationClient($id){
			require_once"../config/config.php";
			$c=new connexion();
			$pdo=$c->cnx();
			$req="select * from utilisateurs where id='$id'";
			$res=$pdo->query($req);
			return $res;
		}
		public function modifieProfile($id,$nom,$prenom,$image,$desc){
			require_once"../../config/config.php";
			$c=new connexion();
			$pdo=$c->cnx();
			$req="update utilisateurs set nom = '$nom' , prenom = '$prenom' , image='$image' , description = '$desc' where id='$id'";
			$pdo->exec($req);
		}
		public function getImgUpdate($id){
			require_once"../../config/config.php";
			$c=new connexion();
			$pdo=$c->cnx();
			$req="select image from utilisateurs where id='$id'";
			$res=$pdo->query($req);
			foreach ($res as $r)
				return $r[0];
		}
		public function rechID($id){
			require_once"../../config/config.php";
			$c=new connexion();
			$pdo=$c->cnx();
			$req="select id from utilisateurs";
			$res=$pdo->query($req);
				if(isset($res))
					return true;
				else
					return false;
		}
		public function updateID($id,$Nid){
			require_once"../../config/config.php";
			$c=new connexion();
			$pdo=$c->cnx();
			$req="update utilisateurs set id='$Nid' where id='$id'";
			$pdo->exec($req);
		}
		public function updatepass($id,$pass){
			require_once"../../config/config.php";
			$c=new connexion();
			$pdo=$c->cnx();
			$req="update utilisateurs set pass='$pass' where id='$id'";
			$pdo->exec($req);
		}
		public function ajouterAdmin($id,$pass,$nom,$prenom,$image,$description)
		{
			require_once"../../config/config.php";
			$c=new connexion();
			$pdo=$c->cnx();
			$req="insert into utilisateurs values('$id','$pass','$nom','$prenom','$image','$description')";
			$pdo->exec($req);
		}
		
	}