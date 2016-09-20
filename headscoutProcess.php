<?php
include("databaseName16.php");

print_r($_POST);

$con= mysql_connect($address, $username, $password);  


if (!$con){
	die('Could not connect: ' . mysql_error());
}

mysql_select_db($database, $con);


$sql = "INSERT INTO `".$database."`.`".$headscoutProcess."` 
(`rd1`,
 `rd2`, 
 `rd3`,
 `bd1`,
 `bd2`, 
 `bd3`, 
 `matchnumber`,
 `rt1`,
 `rt2`, 
 `rt3`,
 `bt1`,
 `bt2`,
 `bt3`,
 `ri1`,
 `ri2`,
 `ri3`,
 `bi1`,
 `bi2`,
 `bi3`) 
 VALUES 
 ('".$_POST['rd1']."', 
 '".$_POST['rd2']."',
 '".$_POST['rd3']."', 
 '".$_POST['bd1']."', 
 '".$_POST['bd2']."',  
 '".$_POST['bd3']."', 
 '".$_POST['matchnumber']."', 
 '".$_POST['rt1']."', 
 '".$_POST['rt2']."',  
 '".$_POST['rt3']."',  
 '".$_POST['bt1']."',  
 '".$_POST['bt2']."', 
 '".$_POST['bt3']."', 
 '".$_POST['ri1']."',  
 '".$_POST['ri2']."',  
 '".$_POST['ri3']."',   
 '".$_POST['bi1']."',  
 '".$_POST['bi2']."', 
 '".$_POST['bi3']."')";

echo($sql);

if (!mysql_query($sql,$con)){
  			die('Error: ' . mysql_error());
  		}
  		
  		echo "Report submitted. Please do not refresh this page.<br>";
		
	

?>