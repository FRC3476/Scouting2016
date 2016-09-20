<?php
		session_start();
		if($_SESSION['userIDCookie'] ){
		}
		else{
			header("Location: http://teamcodeorange.com/stanthescout/login.php");
		}

?>
<html>

<?php include("navBar.php");?>
<body>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap-material-design-master/dist/css/ripples.min.css" rel="stylesheet">
<link href="bootstrap-material-design-master/dist/css/material-wfont.min.css" rel="stylesheet">	
<link href="nouislider.min.css" rel="stylesheet">
<script src="nouislider.min.js"> </script>
<script src="list.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/noUiSlider/6.2.0/jquery.nouislider.min.js"></script>
<script src="sorttable.js"></script>
<script src="keypress.js"></script>
<script src="jquery.js"></script>
<script src="bootstrap-material-design-master/dist/js/material.min.js"></script>
<script src="bootstrap-material-design-master/dist/js/ripples.min.js"></script>


<div class="container row-offcanvas row-offcanvas-left">
	<div class="well column  col-lg-12  col-sm-12 col-xs-12" id="content">
        <h1>OrangePool User Predictions</h1>
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
        ?>
    </div>
</div>

				
</body>
</html>
