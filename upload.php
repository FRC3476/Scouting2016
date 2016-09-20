<?php
    $TeamNumber = $_POST["TeamNumber"];
    $RobotWeight = $_POST["RobotWeight"];
    $NumBatteries = $_POST["NumBatteries"];
    $BatteriesCharged = $_POST["BatteriesCharged"];
	$Comments = $_POST["Comments"]; 
if($_FILES["fileToUpload"]["name"]){

    
    $target_dir = "uploads/";
    $imageFileType = pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION);
    $target_file = $target_dir . $TeamNumber;
    $uploadOk = 1;
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            //echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
     $i = 0;
    while(true){
        if (file_exists($target_file.'-'.$i.'.'.$imageFileType)) {
            //echo "Sorry, ".$target_file.'-'.$i.'.'.$imageFileType." already exists.";
            $i++;
        }
        else{
            break;
        }
    }
    $target_file = $target_file.'-'.$i.'.'.$imageFileType;
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 100000000) {
        //echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "JPEG" && $imageFileType != "gif"  && $imageFileType != "GIF") {
        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        //echo $imageFileType;
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        //echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
           // echo "Sorry, there was an error uploading your file.";
           $uploadOk = 0;
        }
    }
}
    if($TeamNumber != ""){ 
        include("databaseName16.php");

        $con= mysql_connect($address, $username, $password); 
        if (!$con){
            die('Could not connect: ' . mysql_error());
        }
	
        mysql_select_db($database, $con);
        
        $sql = "INSERT INTO `".$database."`.`".$pitDatabase."` (`TeamNumber`,`RobotWeight`,`NumBatteries`,`BatteriesCharged`, `Comments`)VALUES ('$TeamNumber' , '$RobotWeight' , '$NumBatteries' , '$BatteriesCharged', '$Comments');";
        
        if (!mysql_query($sql,$con)){
  			die('Error: ' . mysql_error());
  		}
  		
  		$con = Null; 
        echo("Team ".$TeamNumber." submitted.");
	}
    
 


?>