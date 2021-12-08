<!DOCTYPE html>
<html>
<head>
  <title>Upload your files</title>
</head>
<body>
  <form enctype="multipart/form-data" action="upload.php" method="POST">
    <p>Upload your file</p>
    <input type="file" name="uploaded_file"></input><br />
    <input type="submit" value="Upload"></input>
  </form>
</body>
</html>
<?PHP


$lesExtensions=array("jpg","png","jpeg");
  if(!empty($_FILES['uploaded_file']))
  {

	  $fichier=$_FILES['uploaded_file']['name'];
	  $ext=pathinfo($fichier,PATHINFO_EXTENSION);
	  
	  if (in_array($ext,$lesExtensions))
	  {
		$path = "uploads/";
		$path = $path . basename( $_FILES['uploaded_file']['name']);
		
		if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) 
			echo "The file ".  basename( $_FILES['uploaded_file']['name']). " has been uploaded";
		
		else
        echo "There was an error uploading the file, please try again!";

	  }
  else
	  echo "verifier l'extension de votre image svp!";
  }
  else
	  echo "il faut selectionner un fichier";
  
?>