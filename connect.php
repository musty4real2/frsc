<?php 

//CONNECT TO DATABASE ON HOST
$connect=@mysql_connect("localhost", "root", "");
if(!$connect){
	echo "OOPS! CONNECTION ERROR : ".mysql_error();
	}
	
//SELECT THE DATABASE
$selectdb=@mysql_select_db("frsc", $connect);
if(!$selectdb){
	echo "OOPS! DATABASE CONNECTION ERROR : ".mysql_error();
	}

















?>