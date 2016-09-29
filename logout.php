<?php
    session_start();
    
	include("databaseName16.php");

	$con= mysql_connect($address, $username, $password); 

	if (!$con){
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db($database, $con);
    
    if($_SESSION['userIDCookie']){
        mysql_query('UPDATE '.$userDatabase.' SET isLoggedIn="0" WHERE ID="'.$_SESSION['userIDCookie'].'"'); 
        
        session_unset(); 
        session_destroy(); 
    }
    
    header("Location: login.php");

?>