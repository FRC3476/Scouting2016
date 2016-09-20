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
		<?php
                if($uploadOk == 1){
                    echo "Report submitted. Please do not refresh this page.<br>";
                }
             ?>
			<a><h2>Picture Upload: </h2></a>
            <form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<b><text class="col-lg-2 control-label" >Team Number: </text></b>
				<div class="col-lg-10">
					<input type="text" class="form-control" id="TeamNumber" name="TeamNumber" placeholder=" ">
				</div>
			</div>
			<br>
			<div class="col-lg-12 col-sm-12 col-xs-12">
				Select images to upload:
				<input type="file" name="fileToUpload" multiple id="fileToUpload">
				<input id="PitScouting" type="submit" class="btn btn-primary" value="Submit Data" onclick="" >
			</form>
			</div>

