<?php

require_once"class/panneau_class.php";
$panneau=new panneau();
$res=$panneau->clientInfo(17);
$a=json_decode($res);
echo $a->{'nom'};
?>