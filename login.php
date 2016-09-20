<?php
	include("databaseName16.php");

	$con= mysql_connect($address, $username, $password); 

	if (!$con){
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db($database, $con);

	//$result = mysql_query('select * from '.$userStatus.' where isLoggedIn = 1');

	//if (!$result){
	//	die('Query failed: ' . mysql_error());
	//}
    
    //Session_start(); is needed when working with any session variables, but this is already called in navBar.php
    session_start();
    
	if($_SESSION['userIDCookie']){
		header("Location: matchInput.php");
	}
	else{ 
		if ($_POST['ID']){
			$userID = mysql_query('select * from '.$userDatabase.' where ID="'.$_POST["ID"].'"'); 
			$user = $_POST['ID']; 
			if ($userID && mysql_num_rows($userID) > 0){ 
			//check if the userID exists
				$loginExist = mysql_query('SELECT * from '.$userDatabase.' WHERE isLoggedIn="1" , ID = "'.$_POST["ID"].'" ');
             
                if ($loginExist && mysql_num_rows($loginExist) > 0){
					//if already logged in create cookie and send to Match Input Page 
					$_SESSION['userIDCookie'] = $user;
					header("Location: matchInput.php");
				}
				else {
                         
                        //if not logged in, set isLoggedIn to 1 w/ update query  
                        mysql_query('UPDATE '.$userDatabase.' SET isLoggedIn="1" WHERE ID="'.$user.'"'); 
                        //create cookie and send to Match Input Page 
                        $_SESSION['userIDCookie'] = $user; 
                        header("Location: matchInput.php");
				}
			}
			else {
			//if the userID does not exist, login again 
				$errorMess = "Invalid ID. Login again.";
				//header("Refresh:0"); 
			}
		}
		else {
			//header("Refresh:0");
		}
	}
/*
	while($row = mysql_fetch_array($result)){
		$userDB= mysql_query('select * from '.$userDatabase.' where ID ="'.$row["ID"].'"');
		$user = mysql_fetch_array($userDB);
		$ID = strtoupper($user["ID"]);
		$name = $user["Name"];
		
		if($user != ""){
			echo('<div id="'.$ID.'" class="tile" alt="'.$name.'"><div class="tileInner"><img src="'.$url.'" alt="'.$name.'"/></div></div>');
		}
	}

	$con = null;
	
	$sql = "INSERT INTO `".$database."`.`".$userStatus."` 
(`ID`) 
 VALUES 
 ('".$_POST['ID']."')";
*/	
?>

<html>
<body>
<?php include("navbar.php");?>
<script src="sortable.js"> </script>


<div class="container row-offcanvas row-offcanvas-left">
	<div class="well column  col-lg-12  col-sm-12 col-xs-12" id="content">
<!--Page content-->
		


			<!--Page content-->
				<div class="section3">
						<h1>Log In</h1>
				</div>
				<div class="section3">
					<?php
                        echo($errorMess);
                    ?>
					<h2 style="text-align: center;" >Sign In</h2>
					<div style="margin: auto;margin-left: auto;margin-right: auto; display:block;">
					<form method="post">
						 <input placeholder="Input your ID here"   style="margin: auto;margin-left: auto;margin-right: auto; display:block;" id="ID" name="ID" type="text"> <br>
						<input name="send" style="margin: auto;margin-left: auto;margin-right: auto; display:block;" type="submit" class ="myButton" value="Submit" > <br><br>
					</form>
					</div>
				</div>
				<div class = "section-half">
					
						<!-- <h3 id="notifyUser">...</h3> -->
				
				</div>					
					
		
<!--end-->		
		</div>
	</div>
</body>
</html>