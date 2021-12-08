<?php
	$id=$_POST["id"];
	$pass=$_POST["pass"];
	require_once"../class/login_class.php";
	$log=new login();
	$nb=$log->verif($id,$pass);
	if($nb==0)
		header ('location: login.php?error=invalide');
		
	else
	{
		session_start();
		$_SESSION["login"]=$id;
		$_SESSION["user"]=$log->getInfo($id);
		header ('location: index.php');
	}
		

?>