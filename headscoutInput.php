<html>
<body>
<?php include("navbar.php");?>
<script src="sortable.js"> </script>
<?php

	if($_POST['matchNum']){
		include("databaseName16.php");
		
		$con= mysql_connect($address, $username, $password);  

		if (!$con){
   			die('Could not connect: ' . mysql_error());
		}

mysql_select_db($database, $con);

$matchNum = filter_var($_POST['matchNum'],FILTER_SANITIZE_STRIPPED);
$redGroupA= filter_var($_POST['redGroupA'],FILTER_SANITIZE_STRIPPED);
$redGroupB= filter_var($_POST['redGroupB'],FILTER_SANITIZE_STRIPPED);
$redGroupC= filter_var($_POST['redGroupC'],FILTER_SANITIZE_STRIPPED);
$redGroupD= filter_var($_POST['redGroupD'],FILTER_SANITIZE_STRIPPED);
$blueGroupA= filter_var($_POST['blueGroupA'],FILTER_SANITIZE_STRIPPED);
$blueGroupB= filter_var($_POST['blueGroupB'],FILTER_SANITIZE_STRIPPED);
$blueGroupC= filter_var($_POST['blueGroupC'],FILTER_SANITIZE_STRIPPED);
$blueGroupD= filter_var($_POST['blueGroupD'],FILTER_SANITIZE_STRIPPED);
$redTeam1= filter_var($_POST['redTeam1'],FILTER_SANITIZE_STRIPPED);
$redTeam2= filter_var($_POST['redTeam2'],FILTER_SANITIZE_STRIPPED);
$redTeam3= filter_var($_POST['redTeam3'],FILTER_SANITIZE_STRIPPED);
$blueTeam1= filter_var($_POST['blueTeam1'],FILTER_SANITIZE_STRIPPED);
$blueTeam2= filter_var($_POST['blueTeam2'],FILTER_SANITIZE_STRIPPED);
$blueTeam3= filter_var($_POST['blueTeam3'],FILTER_SANITIZE_STRIPPED);

$sql = "INSERT INTO `".$database."`.`".$headScoutDatabase."` 
(`matchNum`,
 `redGroupA`,
 `redGroupB`,
 `redGroupC`,
 `redGroupD`,
 `blueGroupA`,
 `blueGroupB`,
 `blueGroupC`,
 `blueGroupD`,
 `redTeam1`,
 `redTeam2`,
 `redTeam3`,
 `blueTeam1`,
 `blueTeam2`,
 `blueTeam3`)
 VALUES 
 ('$matchNum',
 '$redGroupA',
 '$redGroupB',
 '$redGroupC',
 '$redGroupD',
 '$blueGroupA',
 '$blueGroupB',
 '$blueGroupC',
 '$blueGroupD',
 '$redTeam1',
 '$redTeam2',
 '$redTeam3',
 '$blueTeam1',
 '$blueTeam2',
 '$blueTeam3');";




if (!mysql_query($sql,$con)){
  			die('Error: ' . mysql_error());
  		}
  		
  		echo "Report submitted. Please do not refresh this page.<br>";

	}
	
?>


<div class="container row-offcanvas row-offcanvas-left">
	<div class="well column  col-lg-12  col-sm-12 col-xs-12" id="content">
	
	
		<div class="row">
			<div style="text-align: center;">	
				<div>
					<h1>Head Scout Pre-Match Input</h1>
				</div>
				<div style="padding: 10px">
				<font size="4">Match Number:</font>
					<input type="text" name="matchNum" id="matchNum" size="8" >
				</div>
				<!--TBDone Reset Button
				<div>
					<input type="button" class="btn btn-primary" value="RESET" onclick="" />
				</div>
				-->
				<!--Drag and Drop Section-->
				<div class="col-lg-12  col-sm-12 col-xs-12 tile__list " name="draganddrop">
					<!--Red Defenses-->
					<div class="col-lg-3 col-sm-3" style="height:660px; border: 2px solid gray; padding: 5px">
					<font color="#CC0000"><h4>Red Defenses</h4></font>
					<div class="col-lg-12  col-sm-12 col-xs-12">
						<ul id="reddef" >
							<li class="list-group-item" id="lowbarred"><img src="lowbar.png" style="height:100px" > <b class="js-remove">X</b></li>
						</ul>
					</div>
					</div>
					<!--Defenses-->
					<div class="col-lg-6 col-sm-6" style="height:660px; border: 2px solid gray; padding: 60px">
					<div class="col-lg-12  col-sm-12 col-xs-12">
						<ul id="defenses" class="col-lg-6" >
							<li class="list-group-item" id="portcullis"><img src="portcullis.png" style="height:100px"> <b class="js-remove">X</b></li>
							<li class="list-group-item" id="ramparts"><img src="ramparts.png" style="height:100px"> <b class="js-remove">X</b></li>
							<li class="list-group-item" id="drawbridge"><img src="drawbridge.png" style="height:100px"> <b class="js-remove">X</b></li>
							<li class="list-group-item" id="rockwall"><img src="rockwall.png" style="height:100px"> <b class="js-remove">X</b></li>
						</ul>
						
						<ul id="defenses2" class="col-lg-6">
							<li class="list-group-item" id="cheval"><img src="cheval.png" style="height:100px"> <b class="js-remove">X</b></li>
							<li class="list-group-item" id="moat"><img src="moat.png" style="height:100px"> <b class="js-remove">X</b></li>
							<li class="list-group-item" id="sallyport"><img src="sallyport.png" style="height:100px"> <b class="js-remove">X</b></li>
							<li class="list-group-item" id="roughterrain"><img src="roughterrain.png" style="height:100px"> <b class="js-remove">X</b></li>
						</ul>
					</div>
					</div>
					<!--Blue Defenses-->
					<div class="col-lg-3 col-sm-3" style="height:660px; border: 2px solid gray; padding: 5px">
										<font color="#3366FF"><h4>Blue Defenses</h4></font>
					<div class="col-lg-12  col-sm-12 col-xs-12">
						<ul id="bluedef" >
							<li class="list-group-item" id="lowbarblue"><img src="lowbar.png" style="height:100px" > <b class="js-remove">X</b></li>
						</ul>
					</div>
					</div>
				</div>
				<!--End of Drag and Drop Section-->
				<!--Start of Team Number List-->
				<div class="col-lg-12  col-sm-12 col-xs-12 tile__list " style="padding:30px">
					<div id="red" class="col-lg-6  col-sm-12 col-xs-12">
						<font color="#CC0000"><h4>Red Alliance Team Numbers:</h4></font>
						<br><input placeholder="Team 1" class="form-control" type="text" name="redTeam1"  id="redTeam1" size="8">
						<br><input placeholder="Team 2" class="form-control" type="text" name="redTeam2"  id="redTeam2" size="8">
						<br><input placeholder="Team 3" class="form-control" type="text" name="redTeam3"  id="redTeam3" size="8">
					</div>
					<div id="blue" class="col-lg-6  col-sm-12 col-xs-12">
						<font color="#3366FF"><h4>Blue Alliance Team Numbers:</h4></font>
						<br><input placeholder="Team 1" class="form-control" type="text" name="blueTeam1"  id="blueTeam1" size="8">
						<br><input placeholder="Team 2" class="form-control" type="text" name="blueTeam2"  id="blueTeam2" size="8">
						<br><input placeholder="Team 3" class="form-control" type="text" name="blueTeam3"  id="blueTeam3" size="8">
					</div>
				</div>
				<!--End of Team Number List-->
				<input type="button" value="Submit Data" class="btn btn-primary" onclick="postwith('');" />
			</div>
		</div>
	</div>
</div>

</html>
<!--End of html-->

<!--Start of CSS-->
<style>
.js-remove {
	color: red; 
	font-size: 30px; 
	font-family: Arial, Helvetica, sans-serif; 
}
</style>
<!--End of CSS-->

<!--All script-->
<script>

	//create red alliance array
	var redlist=new Array; 

	//create blue alliance array
	var bluelist=new Array

	//script for creating lists 

	//Create red defense list to put defenses in 
	Sortable.create(reddef, {
	  group: {
	  name: 'reddef',
	  put: ['defenses','defenses2'] 
	  },
	  animation: 100,
	  onAdd: function (/**Event*/evt) {
		var itemEl = evt.item;  // dragged HTMLElement
		evt.from;  				//previous list
		redlist.push(itemEl.id); //adds new item to array 
		assignRed();
		
	},
	//removes defenses 
	 filter: ".js-remove",
	 onFilter: function (evt) {
			 var item = evt.item,
				ctrl = evt.target;
				
			var arrayLength = redlist.length;

			 if (Sortable.utils.is(ctrl, ".js-remove")) {  // Click on remove button
				item.parentNode.removeChild(item); // remove sortable item
			
				for (var i = 0; i < arrayLength; i++) {
					if (redlist[i]==(item.id)){
						redlist.splice(i, 1);
						assignRed();
					}	
				}
			 }
		 } 
	 });

	//create defenses to pull from 
	//first option for all classes of defenses 
	Sortable.create(defenses, {
	  group: {
	  name: 'defenses',
	  put: false, 
	  pull: 'clone',
	  },
	   animation: 100,
	});

	//second option for all classes of defenses 
	Sortable.create(defenses2, {
	group: {
	name: 'defenses2',
	put: false, 
	pull: 'clone',
	},
	animation: 100,
	});

	//Create blue defense list to put defenses in 
	Sortable.create(bluedef, {
	  group: {
	  name: 'bluedef',
	  put: ['defenses', 'defenses2'] 
	  },
	  animation: 100, 
		onAdd: function (/**Event*/evt) {
		var itemEl = evt.item;  // dragged HTMLElement
		evt.from;  				//previous list
		bluelist.push(itemEl.id); //add new item to array 
		assignBlue();
	}, 
	//removes defenses 
	 filter: ".js-remove",
	 onFilter: function (evt) {
			 var item = evt.item,
				ctrl = evt.target;
			var arrayLength = bluelist.length; 

			 if (Sortable.utils.is(ctrl, ".js-remove")) {  // Click on remove button
				item.parentNode.removeChild(item); // remove sortable item
				
			for (var i = 0; i < arrayLength; i++) {
					if (bluelist[i]==(item.id)){
						bluelist.splice(i, 1);
						assignBlue();
					}	
				}
			 }
		 }
	});

//Script for assigning array values to variables 
var redGroupA="";
var redGroupB="";
var redGroupC="";
var redGroupD="";
var blueGroupA="";
var blueGroupB="";
var blueGroupC="";
var blueGroupD="";

//parse through red list and assign defenses to correct variable
function assignRed(){
	for (var i=0; i < redlist.length; i++){
		if (redlist[i]=="portcullis"){
			redGroupA = "portcullis"; 
		}
		else if (redlist[i] == "cheval"){
			redGroupA = "cheval"; 
		}
		else if (redlist[i] == "ramparts"){
			redGroupB = "ramparts";
		}
		else if (redlist[i] == "moat"){
			redGroupB = "moat";
		}
		else if (redlist[i] == "drawbridge"){
			redGroupC = "drawbridge";
		}
		else if (redlist[i] == "sallyport"){
			redGroupC = "sallyport";
		}
		else if (redlist[i] == "rockwall"){
			redGroupD = "rockwall";
		}
		else if (redlist[i] == "roughterrain"){
			redGroupD = "roughterrain";
		}
	}	
}
//parse through blue list and assign defenses to correct variable
function assignBlue(){
	for (var i=0; i < bluelist.length; i++){
		if (bluelist[i]=="portcullis"){
			blueGroupA = "portcullis"; 
		}
		else if (bluelist[i] == "cheval"){
			blueGroupA = "cheval"; 
		}
		else if (bluelist[i] == "ramparts"){
			blueGroupB = "ramparts";
		}
		else if (bluelist[i] == "moat"){
			blueGroupB = "moat";
		}
		else if (bluelist[i] == "drawbridge"){
			blueGroupC = "drawbridge";
		}
		else if (bluelist[i] == "sallyport"){
			blueGroupC = "sallyport";
		}
		else if (bluelist[i] == "rockwall"){
			blueGroupD = "rockwall";
		}
		else if (bluelist[i] == "roughterrain"){
			blueGroupD = "roughterrain";
		}
	}	
}
	
//Start of script for submitting to SQL 
function postwith(to){
		
		var myForm = document.createElement("form");
		myForm.method="post";
		myForm.action = to;
		

		var names = [
		 'matchNum',
		 'redGroupA',
		 'redGroupB',
		 'redGroupC',
		 'redGroupD',
		 'blueGroupA',
		 'blueGroupB',
		 'blueGroupC',
		 'blueGroupD',
		 'redTeam1',
		 'redTeam2',
		 'redTeam3',
		 'blueTeam1',
		 'blueTeam2',
		 'blueTeam3'
		
		];
	

		var nums = [
		document.getElementById('matchNum').value,
		redGroupA,
		redGroupB,
		redGroupC,
		redGroupD,
		blueGroupA,
		blueGroupB,
		blueGroupC,
		blueGroupD,
		document.getElementById('redTeam1').value,
		document.getElementById('redTeam2').value,
		document.getElementById('redTeam3').value,
		document.getElementById('blueTeam1').value,
		document.getElementById('blueTeam2').value,
		document.getElementById('blueTeam3').value,
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
<link href="list.css" rel="stylesheet" type="text/css"/>
<script src="list.js"></script>