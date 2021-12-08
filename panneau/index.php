<?php
session_start();
if (!isset($_SESSION["login"]))
	header('Location: login.php?error=login');

require_once"../class/panneau_class.php";
$panneau=new panneau();
$lesDemandes=$panneau->afficheToutDemandes();
$panneau=new panneau();
$res=$panneau->clientInfo(17);
$clientInfo=json_decode($res);


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
						<!--menu-right-->
						
						<!--//menu-right-->
					<div class="clearfix"></div>
				</div>
					<!-- //header-ends -->
						<div class="outter-wp">
								<!--custom-widgets-->
												<div class="custom-widgets">
												   <div class="row-one">
														<div class="col-md-3 widget">
															<a href="?s=jour">
															<div class="stats-left ">
																<h5>Aujourd'hui</h5>
																<h4>Demandes</h4>
															</div>
															<div class="stats-right">
																<label><?php echo $panneau->demandeJour();?></label>
															</div></a>
															<div class="clearfix"> </div>	
														</div>
														<div class="col-md-3 widget states-mdl">
															<a href="?s=semaine">
															<div class="stats-left">
																<h5>dans une semaine</h5>
																<h4>Demandes</h4>
															</div>
															<div class="stats-right">
																<label><?php echo $panneau->demandeSemaine();?></label>
															</div>
															</a>
															<div class="clearfix"> </div>	
														</div>
														<div class="col-md-3 widget states-thrd">
															<a href="?id=moin">
															<div class="stats-left">
																<h5>dans un moin</h5>
																<h4>Demandes</h4>
															</div>
															<div class="stats-right">
																<label><?php echo $panneau->demandeMoin();?></label>
															</div></a>
															<div class="clearfix"> </div>	
														</div>
														<div class="col-md-3 widget states-last">
															<a href="?s=tout">
															<div class="stats-left">
																<h5>Total</h5>
																<h4>Demandes</h4>
															</div>
															<div class="stats-right">
																<label><?php echo $panneau->demandeTotal();?></label>
															</div></a>
															<div class="clearfix"> </div>	
														</div>
														<div class="clearfix"> </div>	
													</div>
												</div>
												<!--//custom-widgets-->
												
										<div class="graph-visual tables-main"><br>
											<h2 class="inner-tittle">Toutes les demandes:</h2>
												
												
													<div class="graph">
															<div class="tables">
																<table class="table table-hover">
																	<thead>
																		<tr>
																		  <th>#</th>
																		  <th>#</th>
																		  <th>Nom et prénom</th>
																		  <th>Societé</th>
																		  <th>besoin</th>
																		  <th>Date de demande</th>
																		  
																		</tr>
																	</thead>
																	<tbody>
																	<?php $i=1; foreach($lesDemandes as $d){
																		
																		$clientInfo=json_decode($d[2]);
																		$devis=$panneau->typeDevis($d[1]);
																		$nomC=$clientInfo->{'nom'};
																		$socC=$clientInfo->{'societe'};
																		echo"<tr>
																		  <th scope='row'>$i</th>
																		  <th><button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#myModal$i'>
												  Information Client
												 </button></th>
																		  <td>$nomC</td>
																		  <td>$socC</td>
																		  <td>$devis</td>
																		  <td>$d[4]</td>
																	</tr>";
																	$i++;}
																		?>
																	</tbody>
																	
																</table>
															</div>
												
													</div>

												
										</div>			
											
												
															
																
						</div>										
							<!--  devis ---->
							
							<div class="bs-example2 bs-example-padded-bottom">
												 <!--<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
												  Launch demo modal
												 </button>-->
												 <?php
												 for($i=1;$i<=$panneau->demandeTotal();$i++){
													 $res=$panneau->afficheToutDemandes();
													 foreach($res as $r){
														 
														 $clientInfo=json_decode($r[2]);
														$nom=$clientInfo->{'nom'} ;
														$societe=$clientInfo->{'societe'};
														$poste=$clientInfo->{'poste'};
														$activite=$clientInfo->{'activite'};
														$taille=$clientInfo->{'taille'};
														$mail=$clientInfo->{'mail'};
														$pays=$clientInfo->{'Pays'};
														
													
													 }
													 echo"
													 
													 <div class='modal fade' id='myModal$i' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>
																<div class='modal-dialog'>
																	<div class='modal-content'>
																		<div class='modal-header'>
																			<button type='button' class='close second' data-dismiss='modal' aria-hidden='true'>×</button>
																			>
																		</div>
																		<div class='modal-body'>
																			<h3></h3>
																				<p> Nom et prénom : $nom</p>
																				 <p>Nom de la société : $societe</p>
																				 <p>Poste actuelle : $poste</p>
																				<p>Secteur d’activité : $activite</p>
																				<p>Taille de l’entreprise : $taille</p>
																				<p>E-mail : $mail</p>
																				<p>Pays : $pays</p>
											
																				</div>													
																		</div>
																		<div class='modal-footer'>
																			<button type='button' class='btn btn-default' data-dismiss='modal'>Fermé</button>
																			
																		</div>
																	</div><!-- /.modal-content -->
																</div><!-- /.modal-dialog -->
															</div>	
													 
													 ";
												 }
												 
												
													
?>
												
									
									<!--//bottom-grids-->
									
							</div>
									<!--/charts-inner-->
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