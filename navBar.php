<?php
    session_start();
?>
<head>
    <script src="jquery-1.11.2.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script
	<script src="bootstrap-material-design-master/dist/js/material.min.js"></script>
	<script src="bootstrap-material-design-master/dist/js/ripples.min.js"></script>
    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-material-design-master/dist/css/ripples.min.css" rel="stylesheet">
    <link href="bootstrap-material-design-master/dist/css/material-wfont.min.css" rel="stylesheet">
    <script src="sorttable.js"></script>	
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	

</head>


<nav class="navbar navbar-material-orange navbar-static-top " role="navigation">
	<div class = "container">
		<!-- Drop down button for small screens -->
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
		<!-- Left justified logo/text -->
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">
				Scouting
			</a>
		</div>
		<!-- What goes under the drop down button/rest of navbar -->
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-left">
				<li class = "dropdown">
					<a href="index.php" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Forms<b class="caret"></b></a>
	                                <ul class="dropdown-menu">
	                                	<li><a href="matchInput.php">Match Form</a></li>
						<li><a href="headscoutInput.php">HS Pre-Input</a></li>
						<li><a href="headscoutMatchInput.php">HS Input</a></li>
						<li><a href="pitInput.php">PS Form</a></li>
						<li><a href="pictureUpload.php">Picture Upload</a></li>
						<li><a href="registration.php">User Registration</a></li>
						<li><a href="databaseOperations.php">Database Op</a></li>		
	                                </ul>
				</li>
				<li><a href="matchView.php">Match View</a></li>
				<li><a href="teamData.php">Team Data</a></li>
				<li><a href="getMatchData.php">Match Data</a></li>
				<li><a href="defenseSelection.php">Match Summary</a></li>
				<li><a href="teamRanking.php">Ranking</a></li>	
				<li><a href="matchOutput.php">Match Output</a></li>
				<li><a href="headScoutOutput.php">Defense Output</a></li>	
				<li><a href="headOutput.php">HS Output</a></li>		
				
			</ul>
            <ul class="nav navbar-nav navbar-right">
                    <?php
                        if($_SESSION["userIDCookie"]){
                            echo('<li class="dropdown">
                                <a href="index.php" data-target="#" class="dropdown-toggle" data-toggle="dropdown">'.$_SESSION["userIDCookie"].'<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)">Action</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php">Logout</a></li>
                                </ul>
                                </ul>
                                </li>');
								echo(" <script>
     $(document).ready(function(){
        $('.dropdown-toggle').dropdown();
    });
</script>'");
                        }
                    ?>
		</div>
	</div>
</nav>
	
<style>
#overallForm {
		font-size: 15px; 
		display: inline-block;
}
</style>

