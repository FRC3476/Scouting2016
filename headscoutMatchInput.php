<!DOCTYPE html>

<html>
<?php include("header.php")?>
<body>

<?php include("navbar.php")?>

<?php
	if($_POST['matchNum']){
		include("databaseName16.php");
		
		$con=mysql_connect($address, $username, $password);  

		if (!$con){
   			die('Could not connect: ' . mysql_error());
		}
      
		mysql_select_db($database, $con);
		

		$matchNum = filter_var($_POST['matchNum'],FILTER_SANITIZE_STRIPPED); 
		$Strategy = filter_var($_POST['Strategy'],FILTER_SANITIZE_STRIPPED); 
		$redFinal = filter_var($_POST['redFinal'],FILTER_SANITIZE_STRIPPED);
		$blueFinal = filter_var($_POST['blueFinal'],FILTER_SANITIZE_STRIPPED);
		
		
		$sql = "INSERT INTO `".$database."`.`".$headScoutMatchDatabase."` 
		(`matchNum`,
		`redFinal`,
		`blueFinal`,
		`Strategy`) 
		VALUES 
		('$matchNum',
		'$redFinal',
		'$blueFinal',
		'$Strategy');";
		
		
		
		if (!mysql_query($sql,$con)){
  			die('Error: ' . mysql_error());
  		}
  		
  		echo "Report submitted. Please do not refresh this page.<br>";

	}
?>

<style>
#overallForm {
		font-size: 15px;
		display: inline-block;
}
</style>

<div class="container row-offcanvas row-offcanvas-left">
	<div class="well column  col-lg-12  col-sm-12 col-xs-12" id="content">
		<div class="form-group">
			<label for="MatchNumber" class="col-lg-2 control-label">Match Number: </label>
			<div class="col-lg-10">
				<input type="text" class="form-control" id="matchNum" name="matchNum" placeholder="Match Number">
			</div>
		</div>
		
		<div style="float:left; width:100%; display: inline-block; padding-bottom: 10;" class="col-lg-3  col-sm-6 col-xs-6">
			<h4>Strategy: </h4>
			<textarea placeholder="Click to add text." class="form-control" rows="6" id="Strategy" cols="50"></textarea>
		</div>
		<div id="red" class="col-lg-6  col-sm-12 col-xs-12" style="padding:10px">
			<font color="#CC0000">Red Alliance Final Score:   </font><input class="form-control" type="text" name="redFinal"  id="redFinal" size="8">
		</div>
		
		<div  id="blue" class="col-lg-6  col-sm-12 col-xs-12" style="padding:10px">
			<font color="#3366FF">Blue Alliance Final Score: </font><input class="form-control" type="text" name="blueFinal"  id="blueFinal" size="8">
		</div>
		
		<input  type="button" class="btn btn-primary" value="Submit Data" onclick="postwith('');" />
		
	</div>
</div>
<script>
function postwith(to){
		
		var myForm = document.createElement("form");
		myForm.method="post";
		myForm.action = to;
		

		var names = [
		'matchNum',
		'redFinal',
		'blueFinal',
		'Strategy'
		];
		

		var nums = [
		document.getElementById('matchNum').value,
		document.getElementById('redFinal').value,
		document.getElementById('blueFinal').value,
		document.getElementById('Strategy').value
		];  

		
		
		for (var i = 0; i != names.length; i++) {
			var myInput = document.createElement("input");
			myInput.setAttribute("name", names[i]);
			myInput.setAttribute("value", nums[i]);
			myForm.appendChild(myInput);
		}
  
		document.body.appendChild(myForm);
		myForm.submit();
		document.body.removeChild(myForm);
	}
</script>



</body>

</html>

<?php include("footer.php") ?>