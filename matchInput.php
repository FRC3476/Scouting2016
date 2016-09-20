<?php
		session_start();
		if($_SESSION['userIDCookie'] ){
		}
		else{
			header("Location: login.php");
		}

?>
<?php
	if($_POST['teamNum']){
		include("databaseName16.php");
		
		$con= mysql_connect($address, $username, $password);  

		if (!$con){
   			die('Could not connect: ' . mysql_error());
		}

mysql_select_db($database, $con);


$user = ($_SESSION['userIDCookie']);
$matchNum = filter_var($_POST['matchNum'],FILTER_SANITIZE_STRIPPED);
$teamNum= filter_var($_POST['teamNum'],FILTER_SANITIZE_STRIPPED);
$ID = $matchNum."-".$teamNum;
$allianceColor = filter_var($_POST['allianceColor'],FILTER_SANITIZE_STRIPPED);
$defenseReach = filter_var($_POST['defenseReach'],FILTER_SANITIZE_STRIPPED);
$crossDefense = filter_var($_POST['crossDefense'],FILTER_SANITIZE_STRIPPED);
$highShotsMadeA = filter_var($_POST['highShotsMadeA'],FILTER_SANITIZE_STRIPPED);
$highShotsAttemptA= filter_var($_POST['highShotsAttemptA'],FILTER_SANITIZE_STRIPPED);
$lowShotsMadeA = filter_var($_POST['lowShotsMadeA'],FILTER_SANITIZE_STRIPPED);
$lowShotsAttemptA = filter_var($_POST['lowShotsAttemptA'],FILTER_SANITIZE_STRIPPED);
$highShotsMadeT = filter_var($_POST['highShotsMadeT'],FILTER_SANITIZE_STRIPPED);
$lowShotsMadeT = filter_var($_POST['lowShotsMadeT'],FILTER_SANITIZE_STRIPPED);
$highShotsMissedT = filter_var($_POST['highShotsMissedT'],FILTER_SANITIZE_STRIPPED);
$groupA = filter_var($_POST['groupA'],FILTER_SANITIZE_STRIPPED);
$groupB = filter_var($_POST['groupB'],FILTER_SANITIZE_STRIPPED);
$groupC = filter_var($_POST['groupC'],FILTER_SANITIZE_STRIPPED);
$groupD = filter_var($_POST['groupD'],FILTER_SANITIZE_STRIPPED);
$issues = filter_var($_POST['issues'],FILTER_SANITIZE_STRIPPED);
$lowBar = filter_var($_POST['lowBar'],FILTER_SANITIZE_STRIPPED);
$scales = filter_var($_POST['scales'],FILTER_SANITIZE_STRIPPED);
$scalesExtent = filter_var($_POST['scalesExtent'],FILTER_SANITIZE_STRIPPED);
$challenge = filter_var($_POST['challenge'],FILTER_SANITIZE_STRIPPED);
$comments = filter_var($_POST['comments'],FILTER_SANITIZE_STRIPPED);
$DefenseA = filter_var($_POST['DefenseA'],FILTER_SANITIZE_STRIPPED);
$DefenseB = filter_var($_POST['DefenseB'],FILTER_SANITIZE_STRIPPED);
$DefenseC = filter_var($_POST['DefenseC'],FILTER_SANITIZE_STRIPPED);
$DefenseD = filter_var($_POST['DefenseD'],FILTER_SANITIZE_STRIPPED);

$sql = "INSERT INTO `".$database."`.`".$matchScoutDatabase."` 
(`user`,
 `ID`,
 `matchNum`,
 `teamNum`,
 `allianceColor`,
 `defenseReach`,
 `crossDefense`,
 `highShotsMadeA`,
 `highShotsAttemptA`,
 `lowShotsMadeA`,
 `lowShotsAttemptA`,
 `highShotsMadeT`,
 `lowShotsMadeT`,
 `highShotsMissedT`,
 `groupA`,
 `groupB`,
 `groupC`,
 `groupD`,
 `issues`,
 `lowBar`,
 `scales`,
 `scalesExtent`,
 `challenge`,
 `comments`,
 `DefenseA`,
 `DefenseB`,
 `DefenseC`,
 `DefenseD`)
 VALUES 
 ('$user',
 '$ID',
 '$matchNum',
 '$teamNum',
 '$allianceColor',
 '$defenseReach',
 '$crossDefense',
 '$highShotsMadeA',
 '$highShotsAttemptA',
 '$lowShotsMadeA',
 '$lowShotsAttemptA',
 '$highShotsMadeT',
 '$lowShotsMadeT',
 '$highShotsMissedT',
 '$groupA',
 '$groupB',
 '$groupC',
 '$groupD',
 '$issues',
 '$lowBar',
 '$scales',
 '$scalesExtent',
 '$challenge',
 '$comments',	
 '$DefenseA',
 '$DefenseB',
 '$DefenseC',
 '$DefenseD');";




if (!mysql_query($sql,$con)){
  			die('Error: ' . mysql_error());
  		}
  		
  		echo "Report submitted. Please do not refresh this page.<br>";

	}
?>
<html>

<?php include("navbar.php");?>
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
<script>
var increment = 1;
var keyPressOk = true;
var mode = true;
var removeStuff = 0;
var topGoal = 0;
var bottomGoal = 0;
var groupACrossNumber = 0;
var groupBCrossNumber = 0;
var groupCCrossNumber = 0;
var groupDCrossNumber = 0;
var lowBar = 0;
var highShotsAttemptA = 0;
var lowShotsAttemptA = 0;
var highShotsMadeA = 0;
var lowShotsMadeA = 0; 
var highShotsMissedT = 0; 

$( document ).ready(function() {
    $.material.init();
});

function increasehighMissed(){
	highShotsMissedT = highShotsMissedT + increment; 
	if (highShotsMissedT < 0){
		highShotsMissedT = 0;
	} 
	document.getElementById("highShotsMissedT").innerHTML=("(W) Missed (High Shots): " + highShotsMissedT);
}

function decreasehighMissed(){
	highShotsMissedT = highShotsMissedT - increment; 
	if (highShotsMissedT < 0){
		highShotsMissedT = 0;
	} 
	document.getElementById("highShotsMissedT").innerHTML=("(W) Missed (High Shots): " + highShotsMissedT);
}

function increaseGroupA(){
	groupACrossNumber = groupACrossNumber+ increment;
	document.getElementById("DefenseA").innerHTML=groupACrossNumber;
}
function decreaseGroupA(){
	groupACrossNumber = groupACrossNumber - increment;
	if (groupACrossNumber < 0){
		groupACrossNumber = 0;
	} 
	document.getElementById("DefenseA").innerHTML=groupACrossNumber;
}
function increaseGroupB(){
	groupBCrossNumber = groupBCrossNumber + increment;
	document.getElementById("DefenseB").innerHTML=groupBCrossNumber;
}
function decreaseGroupB(){
	groupBCrossNumber = groupBCrossNumber - increment;
	if (groupBCrossNumber < 0){
		groupBCrossNumber = 0;
	} 
	document.getElementById("DefenseB").innerHTML=groupBCrossNumber;
}	
function increaseGroupC(){
	groupCCrossNumber = groupCCrossNumber + increment;
	document.getElementById("DefenseC").innerHTML=groupCCrossNumber;
}	
function decreaseGroupC(){
	groupCCrossNumber = groupCCrossNumber - increment;
	if (groupCCrossNumber < 0){
		groupCCrossNumber = 0;
	} 
	document.getElementById("DefenseC").innerHTML=groupCCrossNumber;
}
function increaseGroupD(){
	groupDCrossNumber = groupDCrossNumber + increment;
	document.getElementById("DefenseD").innerHTML=groupDCrossNumber;
}
function decreaseGroupD(){
	groupDCrossNumber = groupDCrossNumber - increment;
	if (groupDCrossNumber < 0){
		groupDCrossNumber = 0;
	} 
	document.getElementById("DefenseD").innerHTML=groupDCrossNumber; 
}
function increaseautoHigh(){
	highShotsAttemptA = highShotsAttemptA + increment;
	document.getElementById("highShotsAttemptA").innerHTML=highShotsAttemptA;
}
function decreaseautoHigh(){
	highShotsAttemptA = highShotsAttemptA - increment;
	if (highShotsAttemptA < 0){
		highShotsAttemptA = 0;
	} 
	document.getElementById("highShotsAttemptA").innerHTML=highShotsAttemptA; 
}

function incrautoHighMade(){
	highShotsMadeA = highShotsMadeA + increment;
	document.getElementById("highShotsMadeA").innerHTML=highShotsMadeA;
}

function decautoHighMade(){
	highShotsMadeA = highShotsMadeA - increment;
	if (highShotsMadeA < 0){
		highShotsMadeA = 0;
	} 
	document.getElementById("highShotsMadeA").innerHTML=highShotsMadeA; 
}

function incrautoLowMade(){
	lowShotsMadeA = lowShotsMadeA + increment;
	document.getElementById("lowShotsMadeA").innerHTML=lowShotsMadeA;
}

function decautoLowMade(){
	lowShotsMadeA = lowShotsMadeA - increment;
	if (lowShotsMadeA < 0){
		lowShotsMadeA = 0;
	} 
	document.getElementById("lowShotsMadeA").innerHTML=lowShotsMadeA;
}

function increaseautoLow(){
	lowShotsAttemptA = lowShotsAttemptA + increment;
	document.getElementById("lowShotsAttemptA").innerHTML=lowShotsAttemptA;
}
function decreaseautoLow(){
	lowShotsAttemptA = lowShotsAttemptA - increment;
	if (lowShotsAttemptA < 0){
		lowShotsAttemptA = 0;
	} 
	document.getElementById("lowShotsAttemptA").innerHTML=lowShotsAttemptA;
}
function increaselowBar(){
	lowBar = lowBar + increment;
	document.getElementById("LowBar").innerHTML=lowBar;
}
function decreaselowBar(){
	lowBar = lowBar - increment;
	if (lowBar < 0){
		lowBar = 0;
	} 
	document.getElementById("LowBar").innerHTML=lowBar;
 
}

	
$(function(){
  		$('#teleopscouting').hide();
	});
	
function autotele(){
		if(mode == true){
			$('#autoscouting').hide();
			$('#teleopscouting').show();
			document.getElementById("Switch").innerHTML = "Auto <br> (Shift)";
		}
		else{
			$('#autoscouting').show();
			$('#teleopscouting').hide();
			document.getElementById("Switch").innerHTML="Teleop <br> (Shift)";
		}
		mode = !mode; 
	}	

	function KeyRec(){
		
		if(keyPressOk){
			document.getElementById('Keyrec').innerHTML="Key-Rec <br> Off";
			//added to enable comments if keyrec is off
			//document.getElementById('Comments').disabled=false;
		}
		else{
			document.getElementById('Keyrec').innerHTML="Key-Rec <br> On";
			//added to disable comments if keyrec is on
			//document.getElementById('Comments').disabled=true;
		}
		keyPressOk = !keyPressOk;
	}
	
		function commentOn(){
		
			document.getElementById('Keyrec').innerHTML="Key-Rec <br> Off";
			//added to enable comments if keyrec is off
			//document.getElementById('Comments').disabled=false;

			keyPressOk = false;
	}

	function toggleColor(){
		
		 var colorTog = document.getElementById("allianceColor");
		if (colorTog.innerHTML !== "Blue <b>(a)</b>") {
			colorTog.innerHTML = "Blue <b>(a)</b>";
			document.getElementById("allianceColor").value="Blue";
		}
		else {
			colorTog.innerHTML = "Red <b>(a)</b>";
			document.getElementById("allianceColor").value="Red";
		}

	}

	function removeVal(a){
		b = document.getElementById("Remove").checked;
		removeStuff = 0; 
		if(a){
			b = a;
			removeStuff = 1; 
		}
		
		/*if(b){	
			increment = -1;
		}	
		else{
			increment = 1; 
		}
		*/
	
	}
	
	keypress.combo("shift", function() {
		if(keyPressOk){
    			autotele();
    		}	
	});

	keypress.combo("r", function() {
		
		if(keyPressOk){
			document.getElementById("Remove").checked = !document.getElementById("Remove").checked;	
			removeVal(document.getElementById("Remove").checked);

			 var div = document.getElementById("RemoveAlert");
				if (div.style.display !== "none") {
					div.style.display = "none";
				}
				else {
					div.style.display = "block";
				}
	}
			
	});
	keypress.combo("c", function() {
		if(keyPressOk){
			if(mode){
				if (removeStuff==0){
    				increaseautoHigh();
					}
					else{
						decreaseautoHigh();
					}
    			}
    		}	
	});
	keypress.combo("d", function() {
		if(keyPressOk){
			if(mode){
				if (removeStuff==0){
    				increaseautoLow();
					}
					else{
						decreaseautoLow();
					}
    			}
    		}	
	});
	keypress.combo("a", function() {
		if(keyPressOk){
			if(mode){
				if (removeStuff==0){
    				incrautoHighMade();
					}
					else{
						decautoHighMade();
					}
    			}
    		}	
	});
	keypress.combo("s", function() {
		if(keyPressOk){
			if(mode){
				if (removeStuff==0){
    				incrautoLowMade();
					}
					else{
						decautoLowMade();
					}
    			}
    		}	
	});
	
	keypress.combo("w", function() {
		if(keyPressOk){
			if(!mode){
				if (removeStuff==0){
    				increasehighMissed();
					}
					else{
						decreasehighMissed();
					}
    			}
    		}	
	});
	
	keypress.combo("n", function() {
		if(keyPressOk){
			if(!mode){
				if (removeStuff==0){
    				increaseGroupA();
					}
					else{
						decreaseGroupA();
					}
    			}
    		}	
	});
	keypress.combo("j", function() {
		if(keyPressOk){
			if(!mode){
				if (removeStuff==0){
    				increaseGroupB();
					}
					else{
						decreaseGroupB();
					}
    			}
    		}	
	});
	keypress.combo("k", function() {
		if(keyPressOk){
			if(!mode){
				if (removeStuff==0){
    				increaseGroupC();
					}
					else{
						decreaseGroupC();
					}
    			}
    		}	
	});
	keypress.combo("l", function() {
		if(keyPressOk){
			if(!mode){
				if (removeStuff==0){
    				increaseGroupD();
					}
					else{
						decreaseGroupD();
					}
    			}
    		}	
	});
		document.onkeydown = checkKey;

function checkKey(e) {

    e = e || window.event;
if(keyPressOk){
if(mode){
	}
	else{
    if (e.keyCode == '38') {
        // up arrow
		increasehighGoal(); 
    }
	 else if (e.keyCode == '40') {
       // down arrow

	   decreaseHighGoal();
	   
    }
    else if (e.keyCode == '39') {
       // right arrow

	   increaselowGoal();
	   
    }
	 else if (e.keyCode == '37') {
       // left arrow

	   decreaseLowGoal();
	   
    }
	}
}
}
//prevent scrolling with arrows
window.addEventListener("keydown", function(e) {
    // space and arrow keys
    if([37, 38, 39, 40].indexOf(e.keyCode) > -1) {
        e.preventDefault();
    }
}, false);

</script>
<script>
function postwith(to){
		
		var myForm = document.createElement("form");
		myForm.method="post";
		myForm.action = to;
		

		var names = [
		 'matchNum',
		 'teamNum',
		 'allianceColor',
		 'defenseReach',
		 'crossDefense',
		 'highShotsMadeA',
		 'highShotsAttemptA',
		 'lowShotsMadeA',
		 'lowShotsAttemptA',
		 'highShotsMadeT',
		 'lowShotsMadeT',
		 'highShotsMissedT',
		 'groupA',
		 'groupB',
		 'groupC',
		 'groupD',
		 'issues',
		 'lowBar',
		 'scales',
		 'scalesExtent',
		 'challenge',
		 'comments',
		 'DefenseA',
		 'DefenseB',
		 'DefenseC',
		 'DefenseD'
		
		];
	

		var nums = [
		document.getElementById('matchNum').value,
		document.getElementById('teamNum').value,
		document.getElementById('allianceColor').value,
		document.getElementById('defenseReach').checked?1:0,
		document.getElementById('crossDefense').value,
		highShotsMadeA,
		highShotsAttemptA,
		lowShotsMadeA,
		lowShotsAttemptA,
		highShotsMadeT,
		lowShotsMadeT,
		highShotsMissedT,
		document.getElementById('groupA').value,
		document.getElementById('groupB').value,
		document.getElementById('groupC').value,
		document.getElementById('groupD').value,
		document.getElementById('issues').value,
		document.getElementById('lowBar').checked?1:0,
		document.getElementById('scales').checked?1:0,
		document.getElementById('scalesExtent').value,
		document.getElementById('challenge').checked?1:0,
		document.getElementById('comments').value,
		groupACrossNumber,
		groupBCrossNumber,
		groupCCrossNumber,
		groupDCrossNumber
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

<style>
  #slider .sample1, #slider .sample2 {
    padding: 20px 0;
    background-color: #f0f0f0;
    margin-bottom: 20px;
  }
  #slider .sample2 {
    height: 150px;
  }
  #slider .sample2 .slider {
    margin: 0 40px;
  }
  #slider h2 {
    padding: 14px;
    margin: 0;
    font-size: 16px;
    font-weight: 400;
  }
  #slider .slider {
    margin: 15px;
  }
</style>

<div class="container row-offcanvas row-offcanvas-left">
	<div class="well column  col-lg-12  col-sm-12 col-xs-12" id="content">
		<div class="row">
        <div id="matchinfo" style="text-align: center;">	
			<div class="col-md-2">
				Match Number:
				<input type="text" name="matchNum" id="matchNum" size="8" class="form-control">
			</div>
			<div class="col-md-2">
				Team Number:
				<input type= "text" name="teamNum"  id="teamNum" size="8" class="form-control">
			</div>
			<div class="col-md-2">
			Alliance Color:
			<select id="allianceColor" class="form-control">
			<option value="blue">Blue</option>
			<option value="red">Red</option>
			</select>
			</div>
			<div class="col-md-2">
				<button id="Switch" onclick="autotele();" class="btn btn-primary" >Teleop <br> (Shift)</button>
			</div>
			<div class="col-md-2">
				<button id="Keyrec" onclick="KeyRec();"class="btn btn-primary">Key-Rec <br> On</button>
			</div>
			<div class="col-md-2">
			Remove Value <b>(r)</b>
			<input type="checkbox" id="Remove" name="Remove" onclick="removeVal();">
			((If you need to scroll, use page up/page down or use the touchpad))
			</div>
				<div id="dataForm"> <!--div encompasses both auto and teleop-->
					<div id="RemoveAlert" style="display:none;">
					<a class="removealert">REMOVE VALUE IS ON</a>
					</div>
				</div>
			</div>
		</div>
<div id="autoscouting">
<a><h3><b><u>Auto Scouting:</u></b></h3></a>
<div class="row">
	<div class="col-md-3">
	<div class="togglebutton" id="reach">
		<label>
			Reached a defense :
			<input id="defenseReach" type="checkbox">
		</label>
	</div>
	</div>
	<div class="col-md-3">
		Crossed a Defense :
	  <select id="crossDefense" class="form-control">

					  <option value="Not Attempted">Not Attempted</option>
					  <option value="groupa">Group A (portcullis/cheval)</option>
					  <option value="groupb">Group B (ramparts/moat)</option>
					  <option value="groupc">Group C (draw/sallyport)</option>
					  <option value="groupd">Group D (rock wall/rought terrain)</option>
					  <option value="lowbar">Low Bar</option>

				</select>
	</div>
	</div>
	<div class="col-md-3">
	<h5><b>Number of High Shots Made</b><b>(a)</b>:</h5>
	<button type="button" onClick="decautoHighMade()" class="enlargedtext ">-</button>	
	<a id="highShotsMadeA" class="enlargedtext">0</a>
	<button type="button" onClick="incrautoHighMade()" class="enlargedtext">+</button>
	
	<h5><b>Number of High Shots Missed</b><b>(c)</b>:</h5>
	<button type="button" onClick="decreaseautoHigh()" class="enlargedtext ">-</button>	
	<a id="highShotsAttemptA" class="enlargedtext">0</a>
	<button type="button" onClick="increaseautoHigh()" class="enlargedtext">+</button>
	</div>
<div class="col-md-3">
<h5><b>Number of Low Shots Made</b><b>(s)</b>:</h5>
	<button type="button" onClick="decautoLowMade()" class="enlargedtext ">-</button>	
	<a id="lowShotsMadeA" class="enlargedtext">0</a>
	<button type="button" onClick="incrautoLowMade()" class="enlargedtext">+</button>
	
	<h5><b>Number of Low Shot Missed</b><b>(d)</b>:</h5>
	<button type="button" onClick="decreaseautoLow()" class="enlargedtext ">-</button>	
	<a id="lowShotsAttemptA" class="enlargedtext">0</a>
	<button type="button" onClick="increaseautoLow()" class="enlargedtext">+</button>
	</div>
</div>



<div id="teleopscouting">
	<a><h3><b><u>Teleop Scouting:</u></b></h3></a>
	<div class="row">
		<div>
			<div class="col-md-5" >
			<div style="width: 70%; margin: 0 auto; ">
			<a href="javascript:void(0)" class="btn btn-raised btn-boulder btn-material-red-600" onclick="increasehighMissed()" id="highShotsMissedT">(W) Missed (High Shots): 0</a><br>
			<a href="javascript:void(0)" class="btn btn-raised btn-boulder btn-material-red-600" onclick="decreasehighMissed()" id="decreasehighMissed">Undo Missed</a><br>
			
			</div>
			<a href="javascript:void(0)" class="btn btn-raised btn-boulder btn-material-teal-600" id="highShotsMadeT" onclick="increasehighGoal()"><b>+</b> (H)Boulder<b>(&#8657;)</b></a>
			<a href="javascript:void(0)" class="btn btn-raised btn-boulder btn-material-teal-600" id="lowShotsMadeT" onClick="increaselowGoal()"><b>+</b> (L)Boulder<b>(&#8658;)</b></a>
			<a href="javascript:void(0)" class="btn btn-raised btn-boulder btn-material-teal-600" id="dHighGoal" onclick="decreaseHighGoal()"><b>-</b> (H)Boulder<b>(&#8659;)</b></a>
			<a href="javascript:void(0)" class="btn btn-raised btn-boulder btn-material-teal-600" id="dLowGoal" onClick="decreaseLowGoal()"><b>-</b> (L)Boulder<b>(&#8656;)</b></a>
			<div id='txt'>
		</div>
		<form action="" method="post">
		<input style = "display: none;"type="text" id='totaltotes'>
		<canvas id="myCanvas" width="300" height="300" style="border:1px solid #d3d3d3;">
		Your browser does not support the HTML5 canvas tag.</canvas>

		<script>
		
var highShotsMadeT=0;
var lowShotsMadeT= 0;	
	
/**/
 var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(100, 100, 100, 150);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(90, 65, 30, 35);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(135, 65, 30, 35);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(180, 65, 30, 35);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(50, 250, 200, 35);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.beginPath();
		ctx.strokeStyle="orange";
		ctx.lineWidth="3";
		ctx.arc(150,220,20,0,10*Math.PI);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.beginPath();
		ctx.strokeStyle="orange";
		ctx.lineWidth="3";
		ctx.arc(150,130,20,0,10*Math.PI);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.moveTo(150,20);
		ctx.lineTo(150,65);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
		ctx.font = "30px Arial";
		ctx.fillText(highShotsMadeT,142,140);
        var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
		ctx.font = "30px Arial";
		ctx.fillText(lowShotsMadeT,142,230);
		/**/    
	
function increasehighGoal(){ 
	highShotsMadeT = highShotsMadeT + 1;
	
	var c = document.getElementById("myCanvas");
	var ctx = c.getContext("2d");

	ctx.clearRect(0,0, c.width, c.height);
	var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(100, 100, 100, 150);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(90, 65, 30, 35);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(135, 65, 30, 35);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(180, 65, 30, 35);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(50, 250, 200, 35);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.beginPath();
		ctx.strokeStyle="orange";
		ctx.lineWidth="3";
		ctx.arc(150,220,20,0,10*Math.PI);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.beginPath();
		ctx.strokeStyle="orange";
		ctx.lineWidth="3";
		ctx.arc(150,130,20,0,10*Math.PI);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.moveTo(150,20);
		ctx.lineTo(150,65);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
		ctx.font = "30px Arial";
		ctx.fillText(highShotsMadeT,142,140);
        var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
		ctx.font = "30px Arial";
		ctx.fillText(lowShotsMadeT,142,230);
}
function decreaseHighGoal(){
	highShotsMadeT = highShotsMadeT - 1;
	if (highShotsMadeT < 0){
		highShotsMadeT = 0;
	}
	var c = document.getElementById("myCanvas");
	var ctx = c.getContext("2d");

	ctx.clearRect(0,0, c.width, c.height);
	var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(100, 100, 100, 150);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(90, 65, 30, 35);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(135, 65, 30, 35);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(180, 65, 30, 35);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(50, 250, 200, 35);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.beginPath();
		ctx.strokeStyle="orange";
		ctx.lineWidth="3";
		ctx.arc(150,220,20,0,10*Math.PI);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.beginPath();
		ctx.strokeStyle="orange";
		ctx.lineWidth="3";
		ctx.arc(150,130,20,0,10*Math.PI);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.moveTo(150,20);
		ctx.lineTo(150,65);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
		ctx.font = "30px Arial";
		ctx.fillText(highShotsMadeT,142,140);
        var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
		ctx.font = "30px Arial";
		ctx.fillText(lowShotsMadeT,142,230);
}
function increaselowGoal(){
	lowShotsMadeT = lowShotsMadeT + 1;
	
	var c = document.getElementById("myCanvas");
	var ctx = c.getContext("2d");

	ctx.clearRect(0,0, c.width, c.height);
	var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(100, 100, 100, 150);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(90, 65, 30, 35);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(135, 65, 30, 35);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(180, 65, 30, 35);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(50, 250, 200, 35);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.beginPath();
		ctx.strokeStyle="orange";
		ctx.lineWidth="3";
		ctx.arc(150,220,20,0,10*Math.PI);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.beginPath();
		ctx.strokeStyle="orange";
		ctx.lineWidth="3";
		ctx.arc(150,130,20,0,10*Math.PI);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.moveTo(150,20);
		ctx.lineTo(150,65);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
		ctx.font = "30px Arial";
		ctx.fillText(highShotsMadeT,142,140);
        var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
		ctx.font = "30px Arial";
		ctx.fillText(lowShotsMadeT,142,230);
}
function decreaseLowGoal(){
	lowShotsMadeT = lowShotsMadeT - 1;
	if (lowShotsMadeT < 0){
		lowShotsMadeT = 0;
	}
	var c = document.getElementById("myCanvas");
	var ctx = c.getContext("2d");

	ctx.clearRect(0,0, c.width, c.height);
	var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(100, 100, 100, 150);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(90, 65, 30, 35);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(135, 65, 30, 35);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(180, 65, 30, 35);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.strokeStyle="silver";
		ctx.lineWidth="3";
		ctx.rect(50, 250, 200, 35);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.beginPath();
		ctx.strokeStyle="orange";
		ctx.lineWidth="3";
		ctx.arc(150,220,20,0,10*Math.PI);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.beginPath();
		ctx.strokeStyle="orange";
		ctx.lineWidth="3";
		ctx.arc(150,130,20,0,10*Math.PI);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.moveTo(150,20);
		ctx.lineTo(150,65);
		ctx.stroke();
		var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
		ctx.font = "30px Arial";
		ctx.fillText(highShotsMadeT,142,140);
        var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
		ctx.font = "30px Arial";
		ctx.fillText(lowShotsMadeT,142,230);
}

		</script> 
	</div>
</div>

		<div class="col-md-7">
			<div class="col-md-6">
				<h5><b>Group A: (n)</b></h5>
				<img src="portcullis.png" style="height:100px">
				<img src="cheval.png" style="height:100px"> 
				<br>
				<div style="   width: 50%; margin: 0 auto; ">
				<button type="button" onClick="decreaseGroupA()" class="enlargedtext ">-</button>	
				<a id="DefenseA" class="enlargedtext">0</a>
				<button type="button" onClick="increaseGroupA()" class="enlargedtext">+</button>
				</div>
				<select id="groupA" class="form-control">

					  <option value="Not Attempted">Not Attempted</option>
					  <option value="unsuccessful">Unsuccessful</option>
					  <option value="successful">Successful</option>
					  <option value="extremelysuccessful">Extremely Successful</option>
					  <option value="specialcase">See Comments</option>

				</select>
			</div>
			
			<div class="col-md-6">
				<h5><b>Group B:(j)</b></h5>
				<img src="ramparts.png" style="height:100px">
				<img src="moat.png" style="height:100px">
				<br>
				<div style="   width: 50%; margin: 0 auto; ">
				<button type="button" onClick="decreaseGroupB()" class="enlargedtext ">-</button>	
				<a id="DefenseB" class="enlargedtext">0</a>
				<button type="button" onClick="increaseGroupB()" class="enlargedtext">+</button>
				</div>
				<select id="groupB" class="form-control">

					  <option value="Not Attempted">Not Attempted</option>
					  <option value="unsuccessful">Unsuccessful</option>
					  <option value="successful">Successful</option>
					  <option value="extremelysuccessful">Extremely Successful</option>
					  <option value="specialcase">See Comments</option>

				</select>
	
			</div>
			<div class="col-md-6">
				<h5><b>Group C:(k)</b></h5>
				<img src="drawbridge.png" style="height:100px">
				<img src="sallyport.png" style="height:100px">
				<br>
				<div style="   width: 50%; margin: 0 auto; ">
				<button type="button" onClick="decreaseGroupC()" class="enlargedtext ">-</button>	
				<a id="DefenseC" class="enlargedtext">0</a>
				<button type="button" onClick="increaseGroupC()" class="enlargedtext">+</button>
				</div>
				<select id="groupC" class="form-control">

					  <option value="Not Attempted">Not Attempted</option>
					  <option value="unsuccessful">Unsuccessful</option>
					  <option value="successful">Successful</option>
					  <option value="extremelysuccessful">Extremely Successful</option>
					  <option value="specialcase">See Comments</option>

				</select>
				
			</div>
			<div class="col-md-6">
				<h5><b>Group D:(l)</b></h5>
				<img src="rockwall.png" style="height:100px"> 
				<img src="roughterrain.png" style="height:100px">
				<br>
				<div style="   width: 50%; margin: 0 auto; ">
				<button type="button" onClick="decreaseGroupD()" class="enlargedtext ">-</button>	
				<a id="DefenseD" class="enlargedtext">0</a>
				<button type="button" onClick="increaseGroupD()" class="enlargedtext">+</button>
				</div>
				<select id="groupD" class="form-control">

					  <option value="Not Attempted">Not Attempted</option>
					  <option value="unsuccessful">Unsuccessful</option>
					  <option value="successful">Successful</option>
					  <option value="extremelysuccessful">Extremely Successful</option>
					  <option value="specialcase">See Comments</option>

				</select>
				
			</div>
			
			
			<div class="col-md-6" style="padding-top: 20px">
				Robot Issues&#40;dead/tipped/stopped&#41;: 
				<select class="form-control" placeholder="N/A" id="issues">
					<option value="N/A">N/A</option>
					<option value="Dead">Dead</option>
					<option value="Tipped">Tipped</option>
					<option value="Stopped then Resumed Working">Stopped then Resumed Working</option>
				</select>
			
				<div class="togglebutton">
					<label>
						Low Bar :
						<input id="lowBar" type="checkbox">
					</label>
				</div>
				<div class="togglebutton">
					<label>
						Challenge :
						<input type="checkbox" id="challenge">
					</label>
				</div>
					
			  <div class="togglebutton">
				<label>
					Scale :
					<input id="scales" type="checkbox">
				</label>
				<select class="form-control" placeholder="Not Attempted" id="scalesExtent">
						<option value="Not Attempted">Not Attempted</option>
						<option value="Went up Halfway">Went up Halfway</option>
						<option value="Went up All the Way">Went up All the Way</option>
				</select>
				</div>
				
				
				</div>
		
		
			
			
		</div>
	</div>
	
					<br>
					
				<div style="float:right; text-align: center;" class="col-md-12">
					<br> <br>
					<div style="padding: 5px; padding-bottom: 10;" >
					<u>Comments: </u><br>
					<textarea placeholder="hello friend" rows="9" cols="50" id = "comments"  class="form-control" onclick="commentOn()"> 
					</textarea>
					<br>
					<input type="button" value="Submit Data" class="btn btn-primary" onclick="postwith('');" />
					</div>
				</div>
		
		</div>
	</div>
</div>	
				
	</body>
</html>
