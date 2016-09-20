<html>
<?php 
	include("navbar.php");
	$sqlDir = "SQLSave";
	//Op
	if($_POST['pass'] == "stan"){
		//Upload
		if($_FILES["fileToUpload"]["name"]){
			$uploadOk = 1;
			$imageFileType = pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION);
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 100000000) {
				//echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "sql" && $imageFileType != "SQL") {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				echo $imageFileType;
				$uploadOk = 0;
			}
			
			if($uploadOk == 1){
				//Get contents
				$fileContent = file_get_contents($_FILES['fileToUpload']['tmp_name']);
				//Ready for query

			}
		}
		//Revert
		if($_POST['revert'] == '1'){		
			//Read dir and get newest file
			$newestFile = "";
			$newestFileDate = 0;
			if (is_dir($sqlDir)){
			  if ($dh = opendir($sqlDir)){
				while (($file = readdir($dh)) !== false){
					if($file != "." && $file != ".."){
						$fileName = $sqlDir."/".$file;
						$fileDate = filemtime($fileName);
						if($fileDate > $newestFileDate){
							$newestFileDate = $fileDate;
							$newestFile = $fileName;
						}
					}	
				}
				closedir($dh);
			  }
			}
			if($newestFile != ""){
				$fileContent = file_get_contents($newestFile);
			}
		}
		
		//Run Query
		if(isset($fileContent)){
			//Save old sql to file
			$externalUse = True;
			include("exportSQL.php");
			$saveSQL = Export_Database($mysqlHostName,$mysqlUserName,$mysqlPassword,$DbName, True, $tables , $backup_name=false );
			$fname = $sqlDir."/sqlSave".date('m-d-Y-His').".sql";
			$SQLFile = fopen($fname , 'w') or die("Unable to write save file (".$fname.")!");
			fwrite($SQLFile , $saveSQL);
			fclose($SQLFile);
			
			include("databaseName16.php");

			$con= mysql_connect($address, $username, $password); 
			if (!$con){
				die('Could not connect: ' . mysql_error());
			}
		
			mysql_select_db($database, $con);
			
			$sql = explode(";;;;;;" , $fileContent);

			foreach($sql as &$sqlquery){
				if(trim($sqlquery) != ""){
					if (!mysql_query($sqlquery,$con)){
						echo($sqlquery."<br>");
						die('Error: ' . mysql_error());
						
					}
				}
				
			}
			
			$con = Null; 
			echo("Database changed.");
		}
	}
	
	
	
	
?>
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
			
			<div class="col-lg-4 col-sm-4 col-xs-12">
				<a><h2>Database Upload </h2></a>
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<b><text class=" control-label" >Password</text></b>
						<div class="col-lg-10">
							<input type="password" class="form-control" id="pass" name="pass" placeholder=" ">
						</div>
					</div>
					<br>
					Upload SQL file.
					<input type="file" name="fileToUpload" multiple id="fileToUpload">
					<input id="uploadFleSubmit" type="submit" class="btn btn-primary" value="Submit Data" onclick="" >
				</form>
			</div>
			
			<div class="col-lg-4 col-sm-4 col-xs-12">
				<a><h2>Export Database</h2></a>
				<a href="exportSQL.php" class="btn btn-raised btn-primary">Download File</a>
			</div>
			
			<div class="col-lg-4 col-sm-4 col-xs-12">
				<a><h2>Revert To Previous</h2></a>
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<b><text class=" control-label" >Password</text></b>
						<div class="col-lg-10">
							<input type="password" class="form-control" id="pass" name="pass" placeholder=" ">
						</div>
					</div>
					<input type="hidden" name="revert" value="1">
					<input id="revertSubmit" type="submit" class="btn btn-primary" value="Revert" onclick="" >
				</form>
			</div>
	</div>
</div>
</body>
</html>
