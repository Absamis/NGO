<?php
session_start();
if(!isset($_SESSION["adminlogin"]) && !isset($_SESSION["adminid"])){
	$_SESSION["error"] = "You must login first";
	header("location: index.php");
}else{
	$_SESSION["error"] = "";
}
?>