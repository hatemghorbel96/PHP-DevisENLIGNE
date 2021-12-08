<?php
session_start();
if (!isset($_SESSION["login"]))
	header('Location: login.php?error=login');

require_once"../class/panneau_class.php";
$panneau=new panneau();



?>
<!DOCTYPE HTML>
<html>
<head>
<title>Controle</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />



<!--links of loading-->
	<link rel="stylesheet" href="css/test.css">

	<script src="js/vendor/modernizr-2.6.2.min.js"></script>


<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/amcharts.js"></script>	
<script src="js/serial.js"></script>	
<script src="js/light.js"></script>	
<script src="js/radar.js"></script>	
<link href="css/barChart.css" rel='stylesheet' type='text/css' />
<link href="css/fabochart.css" rel='stylesheet' type='text/css' />
<!--clock init-->
<script src="js/css3clock.js"></script>
<!--Easy Pie Chart-->
<!--skycons-icons-->
<script src="js/skycons.js"></script>

<script src="js/jquery.easydropdown.js"></script>
<script>
$(document).ready(function(){
	<?php if ($_GET['error']=='dejaexiste')
		echo"$('#id_profile').removeClass('active');$('#id_password').removeClass('active');$('#id_id').addClass('active');
	";
	?>
});
</script>
<!--//skycons-icons-->
</head> 
<body>


		


	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
	<script src="js/main.js"></script>
	
   <div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			<div class="header-section">	
				<div class="clearfix"></div>
			</div>
			<!-- //header-ends -->
						<div class="outter-wp">
							<h3 class="head-top"><i class="fa fa-cog"></i> Paramètre</h3>
								<div class="grid_3 grid_5">					
									<div class="but_list">
										<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
											<ul id="myTab" class="nav nav-tabs" role="tablist">
												<li role="presentation" class="active"><a href="#modifier" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><i class="fa fa-pencil"></i> Mise à jour</a></li>
												<li role="presentation"><a href="#ajouter" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile"><i class="fa fa-plus-square"></i> Ajouter un admin</a></li>
												
												
											</ul>
											<div id="myTabContent" class="tab-content">
												<div role="tabpanel" class="tab-pane fade in active" id="modifier" aria-labelledby="home-tab">
													<!---------------------------Start----------------------->
													<div class="grid_3 grid_5">					
														<div class="but_list">
															<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
																<ul id="myTab" class="nav nav-tabs" role="tablist">
																	<li id="id_profile" role="presentation" class="active"><a href="#profile" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><i class="fa fa-user"></i> Profile</a></li>
																	<li id="id_id" role="presentation"><a href="#id" role="tab" id="identifiant-tab" data-toggle="tab" aria-controls="identifiant"><i class="fa fa-info"></i> Identifiant</a></li>
																	<li id="id_password" role="presentation"><a href="#password" role="tab" id="password-tab" data-toggle="tab" aria-controls="profile"><i class="fa fa-key"></i> Mot de passe</a></li>
																	
																</ul>
																<div id="myTabContent" class="tab-content">
																	<div role="tabpanel" class="tab-pane fade in active" id="profile" aria-labelledby="home-tab">
																		<!---------------------------Start----------------------->
																		<div class="forms-main">
																			
																				<div class="graph-form">
																					<div class="validation-form">
																						<!---->
																						<form enctype="multipart/form-data" method="post" action="controller/modifier.php">
																							<input type='hidden' name='identif' value="<?php echo $_SESSION['login']?>" > 
																							
																						<?php
																							if(isset($_GET['error']))
																							{
																								if($_GET['error']=='extension')
																									echo"<div class='col-md-12 form-group1 group-mail'>
																									<label class='control-label' style='color: red;'>** Verifier l'extension de votre fichier svp !</label>
																									
																								</div>
																							<div class='clearfix'> </div>";
																							else
																								echo"<div class='col-md-12 form-group1 group-mail'>
																									<label class='control-label' style='color: red;'>** Erreur ,essayer de de saisir a nouveau !</label>
																									
																								</div>
																							<div class='clearfix'> </div>";
																							}
																						$info=$panneau->getInformationClient($_SESSION["login"]);
																						foreach($info as $row){
																						?>
																							
																							<div class="vali-form">
																								<div class="col-md-6 form-group1">
																									<label class="control-label">Nom</label>
																							<input type="text" name="nom" placeholder="nom" value=<?php echo "$row[2]";?>>
																								</div>
																								<div class="col-md-6 form-group1 form-last">
																									<label class="control-label">Prénom</label>
																									<input type="text" name="prenom" placeholder="Prénom" value=<?php echo "$row[3]";?>>
																								</div>
																								<div class="clearfix"> </div>
																								</div>
																						
																								<div class="col-md-12 form-group1 group-mail">
																									<label class="control-label">Description</label>
																									<input type="text" name="desc" placeholder="description" value=<?php echo "$row[5]";?>>
																								</div>
																								<div class="clearfix"> </div>
																								<div class="col-md-12 form-group1 group-mail">
																									<br><br>
																									<img src="images/<?php echo "$row[4]";?>" height="90" width="104">
																									<br><br>
																									<label class="control-label">Photo de profile</label>
																									<input type="file" name="uploaded_file" style="background: #00C6D7;color: #fff;font-size: 1em; outline: none;border: none;">
																									
																								</div>
																						<?php } ?>
																						 <div class="clearfix"> </div>
																					  
																						<div class="col-md-12 form-group button-2">
																						  <button type="submit" class="btn btn-primary">Valider</button>
																						</div>
																					  <div class="clearfix"> </div>
																					</form>
																				
																				<!---->
																			 </div>

																			</div>
																		</div>
																		<!---------------------------Start----------------------->
																		
																	</div>
																	<div role="tabpanel" class="tab-pane fade" id="id" aria-labelledby="profile-tab">
																		<!---------------------------Start----------------------->
																		<div class="forms-main">
																			
																				<div class="graph-form">
																					<div class="validation-form">
																						<!---->
																					<form method="post" action="controller/modifierId.php">
																							
																						<input type='hidden' name='identif' value="<?php echo $_SESSION['login']?>" > 	
																						<?php
																							if(isset($_GET['error']))
																							{
																								if($_GET['error']=='dejaexiste')
																									echo"<div class='col-md-12 form-group1 group-mail'>
																									<label class='control-label' style='color: red;'>** l'identifiant deja existe !</label>
																									
																								</div>
																							<div class='clearfix'> </div>";
																							
																							}
																						$info=$panneau->getInformationClient($_SESSION["login"]);
																						foreach($info as $row){
																						?>
																							
																							
																						
																								<div class="col-md-12 form-group1 group-mail">
																									<label class="control-label">Identifiant</label>
																									<input type="text" name="identifiant" placeholder="identifiant" value=<?php echo "$row[0]";?>>
																								</div>
																								<div class="clearfix"> </div>
																								
																						<?php } ?>
																						 <div class="clearfix"> </div>
																					  
																						<div class="col-md-12 form-group button-2">
																						  <button type="submit" class="btn btn-primary">Valider</button>
																						</div>
																					  <div class="clearfix"> </div>
																					</form>
																				
																				<!---->
																			 </div>

																			</div>
																		</div>
																	</div>
																	<div role="tabpanel" class="tab-pane fade" id="password" aria-labelledby="profile-tab">
																		<!---------------------------Start----------------------->
																			<div class="forms-main">
																			
																				<div class="graph-form">
																					<div class="validation-form">
																						<!---->
																					<form method="post" action="controller/modifierPass.php">
																							
																						<input type='hidden' name='id' value="<?php echo $row[0];?>" > 	
																						<?php
																							
																						$info=$panneau->getInformationClient($_SESSION["login"]);
																						foreach($info as $row){
																						?>
																							
																							
																						
																								<div class="col-md-12 form-group1 group-mail">
																									<label class="control-label">Mot de passe</label>
																									<input type="text" name="password" required="" value=<?php echo "$row[1]";?>>
																								</div>
																								<div class="clearfix"> </div>
																								
																						<?php } ?>
																						 <div class="clearfix"> </div>
																					  
																						<div class="col-md-12 form-group button-2">
																						  <button type="submit" class="btn btn-primary">Valider</button>
																						</div>
																					  <div class="clearfix"> </div>
																					</form>
																				
																				<!---->
																			 </div>

																			</div>
																		</div>
																		<!---------------------------Start----------------------->
																		
																	</div>
																	
																</div>
															</div>
														</div>
													</div>
													<!---------------------------Start----------------------->
												</div>
												<div role="tabpanel" class="tab-pane fade" id="ajouter" aria-labelledby="profile-tab">
													<!---------------------------Start----------------------->
													<div class="forms-main">
																			
																				<div class="graph-form">
																					<div class="validation-form">
																						<!---->
																					<form method="post" enctype="multipart/form-data" action="controller/ajoutAdmin.php">
																								<div class="vali-form">
																								<div class="col-md-6 form-group1">
																									<label class="control-label">Nom</label>
																							<input type="text" name="nom" placeholder="nom" >
																								</div>
																								<div class="col-md-6 form-group1 form-last">
																									<label class="control-label">Prénom</label>
																									<input type="text" name="prenom" placeholder="Prénom" >
																								</div>
																								<div class="clearfix"> </div>
																								</div>
																								<div class="vali-form">
																								<div class="col-md-6 form-group1">
																									<label class="control-label">Description</label>
																							<input type="text" name="desc" placeholder="Description" >
																								</div>
																								<div class="col-md-6 form-group1 form-last">
																									<label class="control-label">Photo de profile</label>
																									<input type="file" name="uploaded_file" placeholder="Prénom" >
																								</div>
																								<div class="clearfix"> </div>
																								</div>
																								<div class="col-md-12 form-group1 group-mail">
																									<label class="control-label">Identifiant</label>
																									<input type="text" name="id" required="" placeholder="identifiant">
																								</div>
																								<div class="col-md-12 form-group1 group-mail">
																									<label class="control-label">Mot de passe</label>
																									<input type="password" name="password" required="" placeholder="mot de passe">
																								</div>
																								<div class="clearfix"> </div>
																								
																						
																						 <div class="clearfix"> </div>
																					  
																						<div class="col-md-12 form-group button-2">
																						  <button type="submit" class="btn btn-primary">Valider</button>
																						</div>
																					  <div class="clearfix"> </div>
																					</form>
																				
																				<!---->
																			 </div>

																			</div>
																		</div>
																	</div>
																	
																	
																</div>
															</div>
														</div>
													</div>
													<!---------------------------Start----------------------->
												</div>
											</div>
										</div>
									 </div>
								</div>
						<!--//outer-wp-->
						</div>
									
								
				<!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
				<header class="logo">
					
				</header>
			<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
			<!--/down-->
							<div class="down">	
									  <a><img src="images/<?php echo $panneau->getUserImg($_SESSION["login"]);?>" height="70" width="74"></a><!--get the image from the database-->
									  <span class=" name-caret"><?php echo $_SESSION["user"];?></span><!--the name-->
									 <p><?php echo $panneau->getUserDesc($_SESSION["login"]);?></p>
									
							</div>
							   <!--//down-->
                           <div class="menu">
									<ul id="menu" >
										<li><a href="../panneau"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
										 <li id="menu-academico" ><a href="#"><i class="fa fa-user"></i> <span>Mon compte</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										 <ul id="menu-academico-sub" >
											<li id="menu-academico-avaliacoes" ><a href="parametre.php"><i class="fa fa-cog"></i> Paramètre</a></li>
											<li id="menu-academico-boletim" ><a href="logout.php"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
											
											
										  </ul>
										</li>
								  </ul>
								</div>
							  
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<link rel="stylesheet" href="css/vroom.css">
<script type="text/javascript" src="js/vroom.js"></script>
<script type="text/javascript" src="js/TweenLite.min.js"></script>
<script type="text/javascript" src="js/CSSPlugin.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>

<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>