<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include("connect.php");
include("class.php");
$object=new ourclass;
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: FRSC :: Yearly Logbook Record</title>
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
  
  
  
  $display = 20;
  // Determine how many pages there are...
  if (isset($_GET['p']) && is_numeric($_GET
  ['p'])) { // Already been determined.
  
  $pages = $_GET['p'];
  } else { // Need to determine.
  
  // Count the number of records:
  $q = "SELECT * FROM `logbook`";
  $r = mysql_query ($q);
  $records=mysql_num_rows($r);
  if(!$r){echo " could not select for pagination problem";}
  if(empty($r)){echo "the database query is empty";}
  
  
  // Calculate the number of pages...
  if ($records > $display) { // More than
  $pages = ceil ($records/$display);
  } else {
  $pages = 1;
  }
  }
  if (isset($_GET['s']) && is_numeric
  ($_GET['s'])) {
  $start = $_GET['s'];
  } else {
  $start = 0;
  }
  
  ?>


<?php
//SQL query to pull out all registered students
$fetch="SELECT * FROM `logbook` WHERE  YEAR(`date`)=YEAR(NOW())  ORDER BY `timein` ASC LIMIT $start, $display ";
$fetch=@mysql_query($fetch) or die(mysql_error());

if($object->checkNumofVisitors($fetch)==false){echo "<p class='msg info'>Sorry, no visitors found!</p>";}
elseif($object->checkNumofVisitors($fetch)==true){
?>

  <p>Below are Today's Visitors</p>
  <table width='850' border='0' style='margin:auto;' class="table">


<tr  style="background-color:#F30; color:#FFF;">
<th>NAME</th>
<th>TIME IN</th>
<th>TIME OUT</th>
<th>Whom to see</th>
<th>PURPOSE</th>
<th>DATE</th>
<th>AREA VISITED</th>
<th></th>

</tr>
<?php
//FETCH AND SPIT IT OUT
while($row=mysql_fetch_array($fetch)){
$bg = ($bg=='#cfebf2' ? '#f6f6f6' :
'#cfebf2'); // Switch the background
 echo "<tr bgcolor='$bg' class='trs'>";  ?>

<td><?php echo $row['surname'] .", ". $row['firstname'];?></td>
<td><?php echo $row['timein'];?></td>
<td><?php echo $row['timeout'];?></td>
<td><?php echo $row['purpose'];?></td>
<td><?php echo $row['whomtosee'];?></td>
<td><?php echo $row['date'];?></td>
<td><?php echo $row['area'];?></td>


</tr>

<?php
}  
}
?>
</table>
    <?php
 
  //paginate result set
if ($pages > 1) {
echo '<center>';
$current_page = ($start/$display) + 1;

if ($current_page != 1) {
 echo '<center><a href="view_year.php?s=' .
($start - $display) . '&p=' . $pages .
'">Previous</a></center> ';
 }

for ($i = 1; $i <= $pages; $i++) {
 if ($i != $current_page) {
 echo '<a href="view_year.php?s=' .
(($display * ($i - 1))) . '&p=' .
$pages . '">' . $i . '</a> ';
 } else {
 echo $i . ' ';
}
 }

if ($current_page != $pages) {
 echo '<center><a href="view_year.php?s=' .
($start + $display) . '&p=' . $pages .
'">Next</a></center>';
 }

 echo '</center>';// Close the paragraph.
 
 }
 ?>
  
  
  <p>&nbsp;</p>
<center>   <SCRIPT LANGUAGE="JavaScript">
<!-- Begin
if (window.print) {
document.write('<form>'
+ '<input type="button" name="print" value="  Print  " '
+ 'onClick="javascript:window.print()"></form>');
}
// End -->
</SCRIPT>
</center>


</div><!--MENU DIV----->

</div><!--RIGHT CONTENT DIV--->

</div><!--BODY DIV--->

<div><!--FOOTER DIV--->
<?php include("footer.php"); ?>
</div><!--FOOTER DIV--->


</div><!--WRAPPER DIV--->

</body>
</html>
