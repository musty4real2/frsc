<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

$vid=$_GET['vid'];
include("connect.php");

//UPDATE
$update="UPDATE `logbook` SET `timeout`=NOW() ,`signin`=0 WHERE `id`='$vid'";
$query=@mysql_query($update);
if(!$query){echo "OOPS! Error encountered trying to signout guest. Please try again.";}

if($query){
	header("location:signout_visitor.php?signout=true&vid=$vid");
	
	}


?>