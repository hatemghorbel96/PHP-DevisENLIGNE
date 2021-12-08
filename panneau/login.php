<?php
	session_start();
	if(isset($_SESSION["login"]))
		header('location: index.php');
?>
	
	<html>
		<head>
			<title>Connexion</title>
			<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
			<meta charset="utf-8"/>
		</head>
		<body>
			<form action="connexion.php" method="post" class="login">
				
				<div class="w3layouts_main_grid">
					<?php if(isset($_GET['error']))
					{
						echo"<div class='w3_agileits_main_grid w3l_main_grid'>
						<span class='agileits_grid'>";
							if($_GET['error']=="login")
								echo "vous devez d'abord vous connecter";
							else
								echo "l'identifiant ou le mot de passe est incorrecte";
						echo "</span>
					</div>";
					}
						?>
					<div class="w3_agileits_main_grid w3l_main_grid">
						<span class="agileits_grid">
							<label>Identifiant*</label>
							<input type="text" name="id" placeholder="Identifiant" required="">
						</span>
					</div>
					<div class="w3_agileits_main_grid w3l_main_grid">
						<span class="agileits_grid">
							<label>Mot de passe*</label>
							<input type="password" name="pass" placeholder="Mot de passe" required="">
						</span>
					</div>
					<div class="w3_main_grid">
						<div class="loginSub">
							<input type="submit" value="Connexion">
						</div>
					</div>		
				</div>			
			</form>			
						
						
						
						
					
						
	
		</body>
	</html>