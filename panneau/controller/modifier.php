<?php
$id=$_POST['identif'];
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$desc=$_POST["desc"];

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

	  
  
if($erreur == "extension" || $erreur == "true")
	header('Location: ../parametre.php?error='.$erreur);
 else
  {
	  
	  require_once"../../class/panneau_class.php";
	  $panneau=new panneau();
		  $imageO=$panneau->getImgUpdate($id);
		  $image=$_FILES["uploaded_file"]["name"];
		  if($image!='')
		$panneau->modifieProfile($id,$nom,$prenom,$image,$desc);
	else
				$panneau->modifieProfile($id,$nom,$prenom,$imageO,$desc);
	  header('Location: ../parametre.php');
  }


?>