<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
session_start();
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: FRSC :: Login</title>
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
</div><!--below div-->


<div id="menu"><!--MENU DIV----->
<?php 

if($_GET['access']=='denied'){ echo "<h3 style='color:#F00;'>ACCESS DENIED!! LOGIN </h3>";
}
if($_GET['logout']==1){ echo "<h3 style='color:#F00;'>You have been loged out</h3>";
}


if(isset($_POST['button'])){

	$uname=addslashes($_POST['uname']);
	$pword=addslashes($_POST['pword']);
	

//USERNSAME=admin  PASSWORD=swordfish

if($uname=="admin" && $pword=="logbook"){
	$_SESSION['auth']=1;
	header("location:menu.php");
	}
	
else {echo "<p class='msg warning'>Invalid Username or Password</p>";
}
}

?>


<?php
if($_GET['access']=="denied"){echo "<p class='msg warning'>Access Denied! You must be logged in.</p>";}
?>


<?php
if($_GET['login']==1){echo "<p class='msg info'>You have been loged out.</p>";}
?>


<fieldset style="clear:both;">
<legend>ADMIN LOGIN ONLY</legend>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<table width="800" border="0" height="100">
  <tr>
    <td>Username:</td>
    <td><label>
      <input type="text" name="uname" id="textfield" size="50" />
    </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Password:</td>
    <td><input type="password" name="pword" id="textfield2" size="50"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input type="submit" name="button" id="button" value="Submit" />
    </label></td>
    <td>&nbsp;</td>
  </tr>
</table>
</form></center>
</fieldset>



</div><!--MENU DIV----->

</div><!--RIGHT CONTENT DIV--->

</div><!--BODY DIV--->

<div><!--FOOTER DIV--->
<?php include("footer.php"); ?>
</div><!--FOOTER DIV--->


</div><!--WRAPPER DIV--->

</body>
</html>
