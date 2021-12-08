 <?php header('Content-type: text/html; charset=iso-8858-1'); ?>
<!DOCTYPE HTML>
<html>


<head>
		<script src="js/jquery-3.2.1.min.js"></script>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

</head>
<?php

require_once"class/devis_class.php";
$devis=new devis();
$menu=$devis->affichemenuprincipal();
?>

	
		
	<?php

if (!isset($_POST['menu']))
	{
		include"pages/menu.php";
	}
else

{
	?>
	
	<!--  Jquery   -->
	<?php include"pages/jquery.php";?>
	
	<!--CSS-->
	<?php include"pages/css.php";?>
	<body>
		<form method="post" action="controller/devis.php" class="w3_form_post">	
			<input type="hidden" name="menu" value="<?php echo $_POST['menu'];?>">
			<?php
			include"pages/partie_questions.php";
			include"pages/formulaire.php";
			}

			?>
		</form>
	</body>
</html>