<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: FRSC :: Vistor's Log  Form</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="wrapper"><!--WRAPPER DIV--->

<div><!--HEADER DIV--->
<img src="images/frsc temp.jpg" width="748" height="82" />
</div><!--HEADER DIV--->

<div id="body"><!--BODY DIV--->


<div id="sidebar"><!--SIDEBAR DIV--->

</div><!--SIDEBAR DIV--->


<div id="rightside"><!--RIGHT CONTENT DIV--->

<div id="top"><!--TOP DIV INSIDE RIGHT CONTENT DIV-->
<img  src="images/topright.jpg" width="216" height="39" border="0" usemap="#Map" style="position:relative; top:24px;"/>
<map name="Map" id="Map">
  <area shape="rect" coords="183,4,214,38" href="logout.php" />
</map>
<img src="images/visitors_log.jpg" width="190" height="39"  style="position:relative; top:-14px; left:600px;"/></div><!--TOP DIV INSIDE RIGHT CONTENT DIV-->

<div id="below"><!--below div-->
<h2>&nbsp; &nbsp; &nbsp; &nbsp;Administrator</h2>
<p>&nbsp; &nbsp; &nbsp; &nbsp;This is FRSC visitor’s Log book</p>
<p align="right"><a href="menu.php">Go to Menu</a></p>

</div><!--below div-->


<div id="menu"><!--MENU DIV----->
<?php 
if(isset($_POST['enter'])){
	
	include("connect.php");
	
	$firstname=mysql_escape_string($_POST['firstname']);
	$surname=mysql_escape_string($_POST['surname']);
	$purpose=mysql_escape_string($_POST['purpose']);
	$whomtosee=mysql_escape_string($_POST['whomtosee']);
		$area=mysql_escape_string($_POST['area']);
/**************************************************************VALIDATE HERE!!!************************************************** *****
*********************************************************************************************************************************************/


 	if($firstname==""){
		$error[]="The Firstname field cannot be empty";
		}
		if($surname==""){
		$error[]="The surname field cannot be empty";
		}	
		if($purpose==""){
		$error[]="The purpose of the visit field cannot be empty";
		}	
		if($whomtosee==""){
		$error[]="The whom to see field cannot be empty";
		}	
	if(!empty($error)){
		echo "<p class='msg warning'><b>Oops! ERROR:</b></p>";
		foreach($error as $oops){
			echo "<p class='msg error'>$oops</p>";
			}//foreach loop
		}//if !empty error
		
		
		//if $error variable is empty, continue with the script
		elseif(empty($error)){
/*********************** *****************************************************************************************************************
************************************************************************************************************************************************************/



/************************************************************************************************************ *****
*********************************************************************************************************************************************/


//INSERT INTO DBASE
$insert="INSERT INTO `logbook` (`firstname`, `surname`, `date`, `whomtosee`, `purpose`, `timein`, `timeout`, `signin`,`area`) VALUES ( '$firstname', '$surname', NOW(), '$whomtosee', '$purpose', NOW(), '', 1, '$area')";



$query=@mysql_query($insert);
if(!$query){die(mysql_error());}

//REDIRECT 
header("location:log_confirmation.php");


		}// the close of the above elseif(empty($error)){   }

	}

?>


<h1>VISITOR'S LOG BOOK</h1>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"  >
<table width="70%" border="0" height="200">
  <tr>
    <td>Firstname:</td>
    <td><label>
      <input name="firstname" type="text" class="tfield" id="firstname" value="<?php if(isset($_POST['firstname'])){ echo $_POST['firstname'];}?>" size="40" placeholder="Enter firstname" />
    </label></td>
    </tr>
  <tr>
    <td>Surname:</td>
    <td><input name="surname" class="tfield"  type="text" id="surname" value="<?php if(isset($_POST['surname'])){ echo $_POST['surname'];}?>" size="40" placeholder="Enter surname" /></td>
    </tr>
  <tr>
    <td>Purpose of Visit:</td>
    <td><textarea name="purpose" cols="30" rows="4" value="value="<?php if(isset($_POST['purpose'])){ echo $_POST['purpose'];}?>" placeholder="Enter purpose of visit"></textarea></td>
    </tr>
  <tr>
    <td>Whom to see:</td>
    <td><input name="whomtosee" class="tfield"  type="text" id="whomtosee" value="<?php if(isset($_POST['whomtosee'])){ echo $_POST['whomtosee'];}?>" size="40" placeholder="Enter whom to see" /></td>
    </tr>
      <tr>
    <td>which part of the office building are you going to:</td>
    <td><select name="area">
    <option value="level 1 (Resturant)">1st Floor (Resturant)</option>
        <option value="level 2 (Office area)">2nd Floor (Office area)</option>
    <option value="level 3(Director's Office only officials are allowed)">3rd Floor (Director's Office only officials are allowed)</option>
    <option value="level 4 (board room)">4th Floor (board room)</option>
</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input type="submit" name="enter" id="button" value="ENTER" />
    </label></td>
    </tr>
</table>
</form>


</div><!--MENU DIV----->

</div><!--RIGHT CONTENT DIV--->

</div><!--BODY DIV--->

<div><!--FOOTER DIV--->
<?php include("footer.php"); ?>
</div><!--FOOTER DIV--->


</div><!--WRAPPER DIV--->

</body>
</html>