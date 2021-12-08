<?php
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$desc=$_POST['desc'];
$id=$_POST['id'];
$pass=$_POST['password'];


$lesExtensions=array("jpg","png","jpeg");
  if(empty($_FILES['uploaded_file']))
	  $erreur='empty';
  else
  {
	  
	  $fichier=$_FILES['uploaded_file']['name'];
	  $ext=pathinfo($fichier,PATHINFO_EXTENSION);
	  
	  if (!in_array($ext,$lesExtensions))
		  $erreur="extension";
	  else
	  {
		 
		$path = "../images/";
		$path = $path . basename( $_FILES['uploaded_file']['name']);
		
		if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) 
			$image=$_FILES['uploaded_file']['name'];
		else
			$error="true";

	  }
  
  }
  
 $image=$_FILES['uploaded_file']['name'];
  require_once"../../class/panneau_class.php";
	  $panneau=new panneau();
	  $panneau->ajouterAdmin($id,$pass,$nom,$prenom,$image,$desc);
	  
  


?>