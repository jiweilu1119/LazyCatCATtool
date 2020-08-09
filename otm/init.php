<?php
session_start();

$languages = array("english","chinese");

if (isset($_SESSION["lang"]) === false){
	$_SESSION["lang"] = "chinese";
}
if (isset($_GET["lang"]) === true && in_array($_GET["lang"],$languages)=== true){
	$_SESSION["lang"] = $_GET["lang"];
}

include "lang/".$_SESSION["lang"].".php";
?>