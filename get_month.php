<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php 
  
  include ("class.php");
  $object=new ourclass;
  
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


  <p>&nbsp;</p>
  <?php
//SQL query to pull out all registered students
$fetch="SELECT * FROM `logbook` WHERE MONTH(`date`)= '{$_GET['month}' AND YEAR(`date`)=YEAR(NOW())  ORDER BY `timein` ASC LIMIT $start, $display ";
$fetch=@mysql_query($fetch) or die(mysql_error());

if($object->checkNumofVisitors($fetch)==false){echo "Sorry, no visitors found!";}
elseif($object->checkNumofVisitors($fetch)==true){
?>
  <table width='850' border='0' style='margin:auto;' id="tabone">


<tr  class="tabonetr">
<th>NAME</th>
<th>TIME IN</th>
<th>TIME OUT</th>
<th>Whom to see</th>
<th>PURPOSE</th>
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


</tr>

<?php
}//if visitors exist
}
?>
</table>
    <?php
 
  //paginate result set
if ($pages > 1) {
echo '<center>';
$current_page = ($start/$display) + 1;

if ($current_page != 1) {
 echo '<center><a href="view_month.php?s=' .
($start - $display) . '&p=' . $pages .
'">Previous</a></center> ';
 }

for ($i = 1; $i <= $pages; $i++) {
 if ($i != $current_page) {
 echo '<a href="view_month.php?s=' .
(($display * ($i - 1))) . '&p=' .
$pages . '">' . $i . '</a> ';
 } else {
 echo $i . ' ';
}
 }

if ($current_page != $pages) {
 echo '<center><a href="view_month.php?s=' .
($start + $display) . '&p=' . $pages .
'">Next</a></center>';
 }

 echo '</center>';// Close the paragraph.
 
 }
 ?>  
 
  
  
?>

</body>
</html>