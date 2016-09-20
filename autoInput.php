<html>
<link href="nouislider.min.css" rel="stylesheet">
<body>
<style>
</style>
<?php include("navbar.php");?>
<script src="nouislider.min.js"> </script>
<div class="container row-offcanvas row-offcanvas-left">
	<div class="well column  col-lg-12  col-sm-12 col-xs-12" id="content">
		<div class="row">
        <div id="matchinfo" style="text-align: center;">	
			<div class="col-md-2">
				Match Number:
				<input type="text" name="MatchNumber" id="MatchNumber" size="8">
			</div>
			<div class="col-md-2">
				Team Number:
				<input type= "text" name="TeamNumber"  id="TeamNumber" size="8">
			</div>
			<div class="col-md-2">
			Alliance Color:
			<button id="AllianceColor" value="blue" onclick="toggleColor();">Blue <b>(a)</b></button>
			<!--<select id="AllianceColor">
			<option value="blue">Blue</option>
			<option value="red">Red</option>
			</select> -->
			</div>
			<div class="col-md-2">
				<button id="Switch" onclick="autotele(this);" class="btn btn-primary" >Teleop <br> (Shift)</button>
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
	<br>
	<br>
	<div class="togglebutton">
		<label>
			Reached a defense (k)
			<input type="checkbox"><span class="toggle"></span>
		</label>
	</div>
	<br>
	<br>
	  <div class="togglebutton">
		<label>
			Crossed a Defense (f)
			<input type="checkbox"><span class="toggle"></span>
		</label>
	</div>
	<br>
	<br>
	<div class="togglebutton">
		<label>
			Can Shoot(t)
			<input type="checkbox"><span class="toggle"></span>
		</label>
	</div>
	<br>
	<h5><b>Number of Shots:</b></h5>
	<button type="button" onClick="decDefense()" class="enlargedtext ">-</button>	
	<a id="Defense" class="enlargedtext">0</a>
	<button type="button" onClick="incrDefense()" class="enlargedtext">+</button>
	
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
	" rows="9" cols="50" id = "Comments"  class="form-control" onclick="commentOn()">
	</textarea>
	<br>
	<input type="button" value="Submit Data" class="btn btn-primary" onclick="postwith('');" />
</div>

					