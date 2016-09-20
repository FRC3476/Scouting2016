<html>
<body>
<?php include("navbar.php");?>
<script src="sortable.js"> </script>


<div class="container row-offcanvas row-offcanvas-left">
	<div class="well column  col-lg-12  col-sm-12 col-xs-12" id="content">
<!--Page content-->
		<div class="section3">
			
			<h1>Register</h1>
	
		</div>
		<div class = "section3">
			
		<div style="width: 50%; margin: 0 auto;">
		<?php
			if($_POST["ID"]){
				
				include("databaseName16.php");

				$con= mysql_connect($address, $username, $password); 
		
				if (!$con){		
					die('Could not connect: ' . mysql_error());
				}
		
				mysql_select_db($database, $con);


				mysql_query('INSERT INTO '.$userDatabase.' VALUES ("'.htmlspecialchars($_POST["Name"]).'","'.htmlspecialchars($_POST["ID"]).'","0")');

				
				echo("<h3>Thank you for registering. Please do not refresh.</h3>");	
			}
			else{
				echo('
				
					<form method = "POST" id= "regForm" style="width: 50%; margin: 0 auto;">
						<h3 style="text-align: center;">Name</h3>
						<input type="text" style="margin: auto;margin-left: auto;margin-right: auto; display:block;" id="Name" name="Name">
						<h3 style="text-align: center;">ID</h3>
						<input type="text" style="margin: auto;margin-left: auto;margin-right: auto; display:block;" id = "ID" name="ID">
						<br>
						<input style="margin: 0 auto;margin-left: auto;margin-right: auto; display:block;"  class="myButton" type="submit" value="Submit"><br>
					</form>
					
						
				');
			}
				?>
			
				</div>
			</div>
		</div>
	</div>
</body>
</html>