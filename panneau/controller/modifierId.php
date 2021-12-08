<?php
session_start();
$id=$_POST['identif'];
$Nid=$_POST['identifiant'];
require_once"../../class/panneau_class.php";
	  $panneau=new panneau();
	  if ($panneau->rechID($id))
		  header('Location: ../parametre.php?error=dejaexiste');
	  else
		{
			$panneau->updateID($id,$Nid);
			$_SESSION['login']=$Nid;
			header('Location: ../parametre.php');
		}
?>