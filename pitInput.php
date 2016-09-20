<html>
<?php include("navbar.php");?>
<?php include("upload.php");?>
<head>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-material-design-master/dist/css/ripples.min.css" rel="stylesheet">
    <link href="bootstrap-material-design-master/dist/css/material-wfont.min.css" rel="stylesheet">	
	<script src="jquery-1.11.2.min.js"></script>
	<script src="sorttable.js"></script>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	

</head>
<body>
<style>
#overallForm {
		font-size: 15px;
		display: inline-block;
}
</style>
<div class="container row-offcanvas row-offcanvas-left">
	<div class="well column  col-lg-12  col-sm-12 col-xs-12" id="content">
            <form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<b><text class="col-lg-2 control-label" >Team Number: </text></b>
				<div class="col-lg-10">
					<input type="text" class="form-control" id="TeamNumber" name="TeamNumber" placeholder=" ">
				</div>
			</div>
			
			<div class="col-lg-2">
			<b><br>Weight of Robot: </b>
			</div>
				<div class="col-lg-10">
				<br>
				<input type="text" class="form-control" id="RobotWeight" name="RobotWeight" placeholder=" ">
				<br>
			</div>
			
			<div class="col-lg-2">
			<b><br>How Many Batteries in the Pit: </b>
			</div>
				<div class="col-lg-10">
				<br>
				<input type="text" class="form-control" id="NumBatteries" name="NumBatteries" placeholder=" ">
				<br>
				</div>
			
			<div class="col-lg-2">
			<b><br>How Many Batteries Can Be Charged Simultaneously: </b>
			</div>
				<div class="col-lg-10">
				<br>
				<br>
				<input type="text" class="form-control" id="BatteriesCharged" name="BatteriesCharged" placeholder=" ">
				<br>
				</div>
			
			<div style="float:left; text-align: center;">
					<br> <br>
					<div style="float:right; padding: 5px;display: inline-block; padding-bottom: 10;" >
					<u>Comments: </u><br>
					<textarea placeholder="Click to add comment (Key-Rec will turn off) 
					This text will disappear once you begin typing.  
					Example Things to Comment About: 
					Did the robot get in the way of others?
					Is the robot good at blocking shots?? 
					What defenses are they good/bad at?? 
					Decisions made during last few seceonds of match? 
					MAKE SURE ALL FIELDS ARE FILLED IN BEFORE SUBMITTING
					<" rows="9" cols="50" id = "comments"  class="form-control" onclick="commentOn()"> 
					</textarea>
					</div>
				</div>
	
			<div class="col-lg-12 col-sm-12 col-xs-12">
				<input id="PitScouting" type="submit" class="btn btn-primary" value="Submit Data" onclick="" >
			</form>
			</div>

<?php
/*
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["PitScouting"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	*/
?>

			<br>
			
		
		
	</div>
</div>
