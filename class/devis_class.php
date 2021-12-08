<?php
class devis
{
	public function __construct(){
		
	}
	public function affichemenuprincipal(){
		require_once"config/config.php";
		$c=new connexion();
		$pdo=$c->cnx();
		$req="select * from main";
		$res=$pdo->query($req);
		return $res;
	}
	 public function lesquestions($id){
		 require_once"config/config.php";
		$c=new connexion();
		$pdo=$c->cnx();
		$req="select * from lesdevis where idtype=$id";
		$res=$pdo->query($req);
		return $res;
	 }
	 public function nbquestion($menu){
		  require_once"config/config.php";
		$c=new connexion();
		$pdo=$c->cnx();
		$req="select count(*) from lesdevis where idtype=$menu";
		$res=$pdo->query($req);
		return $res->fetchColumn();
		 
	 }
	 public function isLinked($i){
		 require_once"config/config.php";
		$c=new connexion();
		$pdo=$c->cnx();
		$req="select * from lesdevis order by id limit $i,1";
		$res=$pdo->query($req);
		foreach($res as $row)
		{
			if ($row[5]=="true")
				return 1;
			else
				return 0;
		}
	 }
	 
	 
	 public function getNbRep($idtype,$i){
		require_once"config/config.php";
		$c=new connexion();
		$pdo=$c->cnx();
		$req="select * from lesdevis where idtype=$idtype limit $i,1";
		$res=$pdo->query($req);
		foreach($res as $row){
			if ($row[4] != "checkbox")
				return $row[6];
			else
				return 1;
		}
	 }	
	
	public function getQuestions($menu){
		require_once"../config/config.php";
		$c=new connexion();
		$pdo=$c->cnx();
		$req="select id from lesdevis where idtype=$menu";
		$res=$pdo->query($req);
		return $res;
	}
	
	public function demande($reponces,$info,$menu){
		$date=date('Y-m-d');
		require_once"../config/config.php";
		$c=new connexion();
		$pdo=$c->cnx();
		$req="insert into demandes values('',$menu,'$info','$reponces',now())";
		$pdo->exec($req)or print_r($pdo->errorInfo());
	}
	
	
	

}

?>