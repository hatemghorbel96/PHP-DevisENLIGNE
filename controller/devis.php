<?php
$menu=$_POST['menu'];
require_once"../class/devis_class.php";
$devis=new devis();
$questions=$devis->getQuestions($menu);

$rep=array();
$client=array();

$i=1;
	
foreach($questions as $q)
{
	$case='reponce'.$i;
	
	
	if(is_array($_POST[$case])){
		$valeur=implode(";",$_POST[$case]);
		$caseA='reponceA'.$i;
		$valeur.=";".$_POST[$caseA];
	}
	else
		$valeur=$_POST[$case];
	$conv=utf8_encode($valeur);
	$rep["$i"]=$conv;
	$i++;
}

$client["nom"]=$_POST["nom"];
$client["societe"]=$_POST["societe"];
$client["poste"]=$_POST["poste"];
$client["activite"]=$_POST["activite"];
$client["taille"]=$_POST["taille"];
$client["mail"]=$_POST["mail"];
$client["Pays"]=$_POST["Pays"];




$reponces=json_encode($rep);
$info=json_encode($client);
$devis->demande($reponces,$info,$menu);
header('location: ../thankyou.html');
?>