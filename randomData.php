<?php
$hostname="localhost";
$username="root";
$password="";
$error = "";
$message="";
$con=mysql_connect($hostname,$username,$password);
if(!$con)
      {die('Could not connect'.mysql_error());}
mysql_select_db("thenewstory",$con);

$my_array = array('Kashish','Dhananjay','Shruti','Rushil');

$sql="SELECT youRated,const FROM `table 6` WHERE youRated<>"" UNION SELECT youRated,const FROM `table 7` WHERE youRated<>";
echo $sql;

$result=mysql_query($row=mysql_fetch_array($result););
while ($a <= 10)
{
  $row=mysql_fetch_array($result);
  $user=$my_array[rand(0,3)];
  $sql1="INSERT INTO ratings VALUES ($row['youRated'],$user,$row['const'],0,1,0)";
  echo $sql1;
  mysql_query($sql1);
}
 ?>
