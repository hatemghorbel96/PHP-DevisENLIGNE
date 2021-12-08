<?php
$id=$_POST['id'];
$pass=$_POST['password'];
require_once'../../class/panneau_class.php';
$panneau=new panneau();
$panneau->updatepass($id,$pass);
header('Location: ../parametre.php');
?>