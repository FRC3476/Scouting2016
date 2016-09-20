<html>
<?php include("header.php")?>
<body>
<script src="Chart.js-master/Chart.js"></script>


<script>
var $ = jQuery.noConflict();
</script> 
	<?php include("navbar.php")?>

	<div class="container row-offcanvas row-offcanvas-left">
		<div class="well column  col-lg-12  col-sm-12 col-xs-12" id="content">
		
		<form action="defenseSelection.php" method="get">
			<div class="col-lg-6  col-sm-6 col-xs-6">
				<h2>Alliance #1</h2>
				<input placeholder="Team 1" class="form-control" type="text" name="AT1"  id="AT1" size="8">
				<br><input placeholder="Team 2" class="form-control" type="text" name="AT2"  id="AT2" size="8">
				<br><input placeholder="Team 3" class="form-control" type="text" name="AT3"  id="AT3" size="8">
	        </div>
			<div class="col-lg-6  col-sm-6 col-xs-6">
				<h2>Alliance #2</h2>
				<input placeholder="Team 1" class="form-control" type="text" name="BT1"  id="BT1" size="8">
				<br><input placeholder="Team 2" class="form-control" type="text" name="BT2"  id="BT2" size="8">
				<br><input placeholder="Team 3" class="form-control" type="text" name="BT3"  id="BT3" size="8">
	        </div>
			<button id="submit" class="btn btn-primary" onclick="">Display</button>
	        </form>
		
			
<?php
	//Start Team 1
	if($_GET["AT1"]){
		include("databaseName16.php");
		$con= mysql_connect($address, $username, $password); 

		if (!$con){
			die('Could not connect: ' . mysql_error());
		}
		
		mysql_select_db($database, $con);
			$query = 'select * from '.$matchScoutDatabase.' WHERE teamNum =' .$_GET["AT1"];
			$result = mysql_query($query);
		   
		if (!$result){
			die('Query failed: ' . mysql_error());
		}
		$i=0;
		$totalHighGoalAT1 = 0;
		$totalHighGoalMissedAT1 = 0;
		$totalLowGoalAT1 = 0;
		$totalAutoHighGoalAT1 = 0;
		$totalAutoLowGoalAT1 = 0;
		$totalMatchesAT1 =0;
		$matchNum = array();
		$defenseAT1 = array("portcullis" => 0, "cheval" => 0, "moat" => 0, "ramparts" => 0, "drawbridge" => 0, "sallyport" => 0, "roughterrain" => 0, "rockwall" => 0, "lowBar"=> 0);
		$tableEcho= $tableEcho."<table  class='sortable table table-hover' id='RawData' border='1'>";
		while ($row = mysql_fetch_array($result)){
			$totalHighGoalAT1 = $totalHighGoalAT1 + $row["highShotsMadeT"];
            $totalHighGoalMissedAT1 = $totalHighGoalMissedAT1 + $row["highShotsMissedT"];
			$totalLowGoalAT1 = $totalLowGoalAT1 + $row["lowShotsMadeT"];
			$totalAutoHighGoalAT1 = $totalAutoHighGoalAT1 + $row["highShotsMadeA"];
			$totalAutoLowGoalAT1 = $totalAutoLowGoalAT1 + $row['lowShotsMadeA'];
			$totalMatchesAT1 = $totalMatchesAT1 + 1;
			array_push($matchNum, $row["matchNum"]);
			$match = $row["matchNum"];
			$color = $row["allianceColor"];
			$newResult = mysql_query("select * from ".$headScoutDatabase." WHERE matchNum = ".$match);
			$defenseResultAT1 = mysql_fetch_array($newResult);;
			if ($color == "blue"){
				$defenseAT1[$defenseResultAT1["blueGroupA"]] += $row["DefenseA"];
				$defenseAT1[$defenseResultAT1["blueGroupB"]] += $row["DefenseB"];
				$defenseAT1[$defenseResultAT1["blueGroupC"]] += $row["DefenseC"];
				$defenseAT1[$defenseResultAT1["blueGroupD"]] += $row["DefenseD"];
				$defenseAT1["lowBar"] += $row["lowBar"];
			}
			if($color == "red"){
				$defenseAT1[$defenseResultAT1["redGroupA"]] += $row["DefenseA"];
				$defenseAT1[$defenseResultAT1["redGroupB"]] += $row["DefenseB"];
				$defenseAT1[$defenseResultAT1["redGroupC"]] += $row["DefenseC"];
				$defenseAT1[$defenseResultAT1["redGroupD"]] += $row["DefenseD"];
				$defenseAT1["lowBar"] += $row["lowBar"];
			}

		}
		
			
		$valueAT1= '<a href="teamData.php?team='.$_GET['AT1'].'">'.$_GET['AT1'].'</a>';
		
			
	}

	//End Team 1
		
	//Start Team 2
	if($_GET["AT2"]){
		include("databaseName16.php");
		$con= mysql_connect($address, $username, $password); 

		if (!$con){
			die('Could not connect: ' . mysql_error());
		}
		
		mysql_select_db($database, $con);
			$query = 'select * from '.$matchScoutDatabase.' WHERE teamNum =' .$_GET["AT2"];
			$result = mysql_query($query);
		   
		if (!$result){
			die('Query failed: ' . mysql_error());
		}
		$i=0;
		$totalHighGoalAT2 = 0;
		$totalHighGoalMissedAT2 = 0;
		$totalLowGoalAT2 = 0;
		$totalAutoHighGoalAT2 = 0;
		$totalAutoLowGoalAT2 = 0;
		$totalMatchesAT2 =0;
		$matchNum = array();
		$defenseAT2 = array("portcullis" => 0, "cheval" => 0, "moat" => 0, "ramparts" => 0, "drawbridge" => 0, "sallyport" => 0, "roughterrain" => 0, "rockwall" => 0, "lowBar"=> 0);
		$tableEcho= $tableEcho."<table  class='sortable table table-hover' id='RawData' border='1'>";
		while ($row = mysql_fetch_array($result)){
			$totalHighGoalAT2 = $totalHighGoalAT2 + $row["highShotsMadeT"];
            $totalHighGoalMissedAT2 = $totalHighGoalMissedAT2 + $row["highShotsMissedT"];
			$totalLowGoalAT2 = $totalLowGoalAT2 + $row["lowShotsMadeT"];
			$totalAutoHighGoalAT2 = $totalAutoHighGoalAT2 + $row["highShotsMadeA"];
			$totalAutoLowGoalAT2 = $totalAutoLowGoalAT2 + $row['lowShotsMadeA'];
			$totalMatchesAT2 = $totalMatchesAT2 + 1;
			array_push($matchNum, $row["matchNum"]);
			$match = $row["matchNum"];
			$color = $row["allianceColor"];
			$newResult = mysql_query("select * from ".$headScoutDatabase." WHERE matchNum = ".$match);
			$defenseResultAT2 = mysql_fetch_array($newResult);;
			if ($color == "blue"){
				$defenseAT2[$defenseResultAT2["blueGroupA"]] += $row["DefenseA"];
				$defenseAT2[$defenseResultAT2["blueGroupB"]] += $row["DefenseB"];
				$defenseAT2[$defenseResultAT2["blueGroupC"]] += $row["DefenseC"];
				$defenseAT2[$defenseResultAT2["blueGroupD"]] += $row["DefenseD"];
				$defenseAT2["lowBar"] += $row["lowBar"];
			}
			if($color == "red"){
				$defenseAT2[$defenseResultAT2["redGroupA"]] += $row["DefenseA"];
				$defenseAT2[$defenseResultAT2["redGroupB"]] += $row["DefenseB"];
				$defenseAT2[$defenseResultAT2["redGroupC"]] += $row["DefenseC"];
				$defenseAT2[$defenseResultAT2["redGroupD"]] += $row["DefenseD"];
				$defenseAT2["lowBar"] += $row["lowBar"];
			}

		}
		
		$valueAT2= '<a href="teamData.php?team='.$_GET['AT2'].'">'.$_GET['AT2'].'</a>';
		
			
	}

	//End Team 2
		
	//Start Team 3
	if($_GET["AT3"]){
		include("databaseName16.php");
		$con= mysql_connect($address, $username, $password); 

		if (!$con){
			die('Could not connect: ' . mysql_error());
		}
		
		mysql_select_db($database, $con);
			$query = 'select * from '.$matchScoutDatabase.' WHERE teamNum =' .$_GET["AT3"];
			$result = mysql_query($query);
		   
		if (!$result){
			die('Query failed: ' . mysql_error());
		}
		$i=0;
		$totalHighGoalAT3 = 0;
		$totalHighGoalMissedAT3 = 0;
		$totalLowGoalAT3 = 0;
		$totalAutoHighGoalAT3 = 0;
		$totalAutoLowGoalAT3 = 0;
		$totalMatchesAT3 =0;
		$matchNum = array();
		$defenseAT3 = array("portcullis" => 0, "cheval" => 0, "moat" => 0, "ramparts" => 0, "drawbridge" => 0, "sallyport" => 0, "roughterrain" => 0, "rockwall" => 0, "lowBar"=> 0);
		$tableEcho= $tableEcho."<table  class='sortable table table-hover' id='RawData' border='1'>";
		while ($row = mysql_fetch_array($result)){
			$totalHighGoalAT3 = $totalHighGoalAT3 + $row["highShotsMadeT"];
            $totalHighGoalMissedAT3 = $totalHighGoalMissedAT3 + $row["highShotsMissedT"];
			$totalLowGoalAT3 = $totalLowGoalAT3 + $row["lowShotsMadeT"];
			$totalAutoHighGoalAT3 = $totalAutoHighGoalAT3 + $row["highShotsMadeA"];
			$totalAutoLowGoalAT3 = $totalAutoLowGoalAT3 + $row['lowShotsMadeA'];
			$totalMatchesAT3 = $totalMatchesAT3 + 1;
			array_push($matchNum, $row["matchNum"]);
			$match = $row["matchNum"];
			$color = $row["allianceColor"];
			$newResult = mysql_query("select * from ".$headScoutDatabase." WHERE matchNum = ".$match);
			$defenseResultAT3 = mysql_fetch_array($newResult);;
			if ($color == "blue"){
				$defenseAT3[$defenseResultAT3["blueGroupA"]] += $row["DefenseA"];
				$defenseAT3[$defenseResultAT3["blueGroupB"]] += $row["DefenseB"];
				$defenseAT3[$defenseResultAT3["blueGroupC"]] += $row["DefenseC"];
				$defenseAT3[$defenseResultAT3["blueGroupD"]] += $row["DefenseD"];
				$defenseAT3["lowBar"] += $row["lowBar"];
			}
			if($color == "red"){
				$defenseAT3[$defenseResult["redGroupA"]] += $row["DefenseA"];
				$defenseAT3[$defenseResult["redGroupB"]] += $row["DefenseB"];
				$defenseAT3[$defenseResult["redGroupC"]] += $row["DefenseC"];
				$defenseAT3[$defenseResult["redGroupD"]] += $row["DefenseD"];
				$defenseAT3["lowBar"] += $row["lowBar"];
			}

		}
		
		$valueAT3= '<a href="teamData.php?team='.$_GET['AT3'].'">'.$_GET['AT3'].'</a>';
		
		
			
	}

	//End Team 3
?>
<?php
	
	//Start Alliance #2
	
	//Start Team 1
	if($_GET["BT1"]){
		include("databaseName16.php");
		$con= mysql_connect($address, $username, $password); 

		if (!$con){
			die('Could not connect: ' . mysql_error());
		}
		
		mysql_select_db($database, $con);
			$query = 'select * from '.$matchScoutDatabase.' WHERE teamNum =' .$_GET["BT1"];
			$result = mysql_query($query);
		   
		if (!$result){
			die('Query failed: ' . mysql_error());
		}
		$i=0;
		$totalHighGoalBT1 = 0;
		$totalHighGoalMissedBT1 = 0;
		$totalLowGoalBT1 = 0;
		$totalAutoHighGoalBT1 = 0;
		$totalAutoLowGoalBT1 = 0;
		$totalMatchesBT1 =0;
		$matchNum = array();
		$defenseBT1 = array("portcullis" => 0, "cheval" => 0, "moat" => 0, "ramparts" => 0, "drawbridge" => 0, "sallyport" => 0, "roughterrain" => 0, "rockwall" => 0, "lowBar"=> 0);
		$tableEcho= $tableEcho."<table  class='sortable table table-hover' id='RawData' border='1'>";
		while ($row = mysql_fetch_array($result)){
			$totalHighGoalBT1 = $totalHighGoalBT1 + $row["highShotsMadeT"];
            $totalHighGoalMissedBT1 = $totalHighGoalMissedBT1 + $row["highShotsMissedT"];
			$totalLowGoalBT1 = $totalLowGoalBT1 + $row["lowShotsMadeT"];
			$totalAutoHighGoalBT1 = $totalAutoHighGoalBT1 + $row["highShotsMadeA"];
			$totalAutoLowGoalBT1 = $totalAutoLowGoalBT1 + $row['lowShotsMadeA'];
			$totalMatchesBT1 = $totalMatchesBT1 + 1;
			array_push($matchNum, $row["matchNum"]);
			$match = $row["matchNum"];
			$color = $row["allianceColor"];
			$newResult = mysql_query("select * from ".$headScoutDatabase." WHERE matchNum = ".$match);
			$defenseResultBT1 = mysql_fetch_array($newResult);;
			if ($color == "blue"){
				$defenseBT1[$defenseResultBT1["blueGroupA"]] += $row["DefenseA"];
				$defenseBT1[$defenseResultBT1["blueGroupB"]] += $row["DefenseB"];
				$defenseBT1[$defenseResultBT1["blueGroupC"]] += $row["DefenseC"];
				$defenseBT1[$defenseResultBT1["blueGroupD"]] += $row["DefenseD"];
				$defenseBT1["lowBar"] += $row["lowBar"];
			}
			if($color == "red"){
				$defenseBT1[$defenseResultBT1["redGroupA"]] += $row["DefenseA"];
				$defenseBT1[$defenseResultBT1["redGroupB"]] += $row["DefenseB"];
				$defenseBT1[$defenseResultBT1["redGroupC"]] += $row["DefenseC"];
				$defenseBT1[$defenseResultBT1["redGroupD"]] += $row["DefenseD"];
				$defenseBT1["lowBar"] += $row["lowBar"];
			}

		}
			
		$valueBT1= '<a href="teamData.php?team='.$_GET['BT1'].'">'.$_GET['BT1'].'</a>';	
		
	}

	//End Team 1
		
	//Start Team 2
	if($_GET["BT2"]){
		include("databaseName16.php");
		$con= mysql_connect($address, $username, $password); 

		if (!$con){
			die('Could not connect: ' . mysql_error());
		}
		
		mysql_select_db($database, $con);
			$query = 'select * from '.$matchScoutDatabase.' WHERE teamNum =' .$_GET["BT2"];
			$result = mysql_query($query);
		   
		if (!$result){
			die('Query failed: ' . mysql_error());
		}
		$i=0;
		$totalHighGoalBT2 = 0;
		$totalHighGoalMissedBT2 = 0;
		$totalLowGoalBT2 = 0;
		$totalAutoHighGoalBT2 = 0;
		$totalAutoLowGoalBT2 = 0;
		$totalMatchesBT2 =0;
		$matchNum = array();
		$defenseBT2 = array("portcullis" => 0, "cheval" => 0, "moat" => 0, "ramparts" => 0, "drawbridge" => 0, "sallyport" => 0, "roughterrain" => 0, "rockwall" => 0, "lowBar"=> 0);
		$tableEcho= $tableEcho."<table  class='sortable table table-hover' id='RawData' border='1'>";
		while ($row = mysql_fetch_array($result)){
			$totalHighGoalBT2 = $totalHighGoalBT2 + $row["highShotsMadeT"];
            $totalHighGoalMissedBT2 = $totalHighGoalMissedBT2 + $row["highShotsMissedT"];
			$totalLowGoalBT2 = $totalLowGoalBT2 + $row["lowShotsMadeT"];
			$totalAutoHighGoalBT2 = $totalAutoHighGoalBT2 + $row["highShotsMadeA"];
			$totalAutoLowGoalBT2 = $totalAutoLowGoalBT2 + $row['lowShotsMadeA'];
			$totalMatchesBT2 = $totalMatchesBT2 + 1;
			array_push($matchNum, $row["matchNum"]);
			$match = $row["matchNum"];
			$color = $row["allianceColor"];
			$newResult = mysql_query("select * from ".$headScoutDatabase." WHERE matchNum = ".$match);
			$defenseResultBT2 = mysql_fetch_array($newResult);;
			if ($color == "blue"){
				$defenseBT2[$defenseResultBT2["blueGroupA"]] += $row["DefenseA"];
				$defenseBT2[$defenseResultBT2["blueGroupB"]] += $row["DefenseB"];
				$defenseBT2[$defenseResultBT2["blueGroupC"]] += $row["DefenseC"];
				$defenseBT2[$defenseResultBT2["blueGroupD"]] += $row["DefenseD"];
				$defenseBT2["lowBar"] += $row["lowBar"];
			}
			if($color == "red"){
				$defenseBT2[$defenseResultBT2["redGroupA"]] += $row["DefenseA"];
				$defenseBT2[$defenseResultBT2["redGroupB"]] += $row["DefenseB"];
				$defensBT2e[$defenseResultBT2["redGroupC"]] += $row["DefenseC"];
				$defenseBT2[$defenseResultBT2["redGroupD"]] += $row["DefenseD"];
				$defenseBT2["lowBar"] += $row["lowBar"];
			}

		}
		
		$valueBT2= '<a href="teamData.php?team='.$_GET['BT2'].'">'.$_GET['BT2'].'</a>';	
		
	}

	//End Team 2
		
	//Start Team 3
	if($_GET["BT3"]){
		include("databaseName16.php");
		$con= mysql_connect($address, $username, $password); 

		if (!$con){
			die('Could not connect: ' . mysql_error());
		}
		
		mysql_select_db($database, $con);
			$query = 'select * from '.$matchScoutDatabase.' WHERE teamNum =' .$_GET["BT3"];
			$result = mysql_query($query);
		   
		if (!$result){
			die('Query failed: ' . mysql_error());
		}
				$i=0;
		$totalHighGoalBT3 = 0;
		$totalHighGoalMissedBT3 = 0;
		$totalLowGoalBT3 = 0;
		$totalAutoHighGoalBT3 = 0;
		$totalAutoLowGoalBT3 = 0;
		$totalMatchesBT3 =0;
		$matchNum = array();
		$defenseBT3 = array("portcullis" => 0, "cheval" => 0, "moat" => 0, "ramparts" => 0, "drawbridge" => 0, "sallyport" => 0, "roughterrain" => 0, "rockwall" => 0, "lowBar"=> 0);
		$tableEcho= $tableEcho."<table  class='sortable table table-hover' id='RawData' border='1'>";
		while ($row = mysql_fetch_array($result)){
			$totalHighGoalBT3 = $totalHighGoalBT3 + $row["highShotsMadeT"];
            $totalHighGoalMissedBT3 = $totalHighGoalMissedBT3 + $row["highShotsMissedT"];
			$totalLowGoalBT3 = $totalLowGoalBT3 + $row["lowShotsMadeT"];
			$totalAutoHighGoalBT3 = $totalAutoHighGoalBT3 + $row["highShotsMadeA"];
			$totalAutoLowGoalBT3 = $totalAutoLowGoalBT3 + $row['lowShotsMadeA'];
			$totalMatchesBT3 = $totalMatchesBT3 + 1;
			array_push($matchNum, $row["matchNum"]);
			$match = $row["matchNum"];
			$color = $row["allianceColor"];
			$newResult = mysql_query("select * from ".$headScoutDatabase." WHERE matchNum = ".$match);
			$defenseResultBT3 = mysql_fetch_array($newResult);;
			if ($color == "blue"){
				$defenseBT3[$defenseResultBT3["blueGroupA"]] += $row["DefenseA"];
				$defenseBT3[$defenseResultBT3["blueGroupB"]] += $row["DefenseB"];
				$defenseBT3[$defenseResultBT3["blueGroupC"]] += $row["DefenseC"];
				$defenseBT3[$defenseResultBT3["blueGroupD"]] += $row["DefenseD"];
				$defenseBT3["lowBar"] += $row["lowBar"];
			}
			if($color == "red"){
				$defenseBT3[$defenseResultBT3["redGroupA"]] += $row["DefenseA"];
				$defenseBT3[$defenseResultBT3["redGroupB"]] += $row["DefenseB"];
				$defenseBT3[$defenseResultBT3["redGroupC"]] += $row["DefenseC"];
				$defenseBT3[$defenseResultBT3["redGroupD"]] += $row["DefenseD"];
				$defenseBT3["lowBar"] += $row["lowBar"];
			}

		}
		
			
		$valueBT3= '<a href="teamData.php?team='.$_GET['BT3'].'">'.$_GET['BT3'].'</a>';
		
		
	}

	//End Team 3
	
	//Total all teams' defenses into single array RED 
	$defensesAT=array(); 
	$defensesAT["portcullis"] = $defenseAT1["portcullis"]+$defenseAT2["portcullis"]+ $defenseAT3["portcullis"];
	$defensesAT["cheval"] = $defenseAT1["cheval"]+$defenseAT2["cheval"]+ $defenseAT3["cheval"];
	$defensesAT["moat"] = $defenseAT1["moat"]+$defenseAT2["moat"]+ $defenseAT3["moat"];
	$defensesAT["ramparts"] = $defenseAT1["ramparts"]+$defenseAT2["ramparts"]+ $defenseAT3["ramparts"];
	$defensesAT["drawbrdige"] = $defenseAT1["drawbridge"]+$defenseAT2["drawbridge"]+ $defenseAT3["drawbridge"];
	$defensesAT["sallyport"] = $defenseAT1["sallyport"]+$defenseAT2["sallyport"]+ $defenseAT3["sallyport"];
	$defensesAT["roughterrain"] = $defenseAT1["roughterrain"]+$defenseAT2["roughterrain"]+ $defenseAT3["roughterrain"];
	$defensesAT["rockwall"] = $defenseAT1["rockwall"]+$defenseAT2["rockwall"]+ $defenseAT3["rockwall"];
	$defensesAT["lowBar"] = $defenseAT1["lowBar"]+$defenseAT2["lowBar"]+ $defenseAT3["lowBar"];
	
	//Total all teams' defenses into single array BLUE 
	$defensesBT=array(); 
	$defensesBT["portcullis"] = $defenseBT1["portcullis"]+$defenseBT2["portcullis"]+ $defenseBT3["portcullis"];
	$defensesBT["cheval"] = $defenseBT1["cheval"]+$defenseBT2["cheval"]+ $defenseBT3["cheval"];
	$defensesBT["moat"] = $defenseBT1["moat"]+$defenseBT2["moat"]+ $defenseBT3["moat"];
	$defensesBT["ramparts"] = $defenseBT1["ramparts"]+$defenseBT2["ramparts"]+ $defenseBT3["ramparts"];
	$defensesBT["drawbrdige"] = $defenseBT1["drawbridge"]+$defenseBT2["drawbridge"]+ $defenseBT3["drawbridge"];
	$defensesBT["sallyport"] = $defenseBT1["sallyport"]+$defenseBT2["sallyport"]+ $defenseBT3["sallyport"];
	$defensesBT["roughterrain"] = $defenseBT1["roughterrain"]+$defenseBT2["roughterrain"]+ $defenseBT3["roughterrain"];
	$defensesBT["rockwall"] = $defenseBT1["rockwall"]+$defenseBT2["rockwall"]+ $defenseBT3["rockwall"];
	$defensesBT["lowBar"] = $defenseBT1["lowBar"]+$defenseBT2["lowBar"]+ $defenseBT3["lowBar"];
		
	 
?>
<div class="row">
<div class="col-lg-6  col-sm-6 col-xs-6">
<canvas id="yourChart" width="500" height="250"></canvas>
<script>
var ctx = document.getElementById("yourChart").getContext("2d");
var data = {
    labels: ["Portcullis", "Cheval De Frise", "Moat", "Ramparts", "Drawbridge", "Sally Port", "Rough Terrain", "Rock Wall", "Low Bar"],
    datasets: [
        {
            label: "Total Crosses",
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
            data: <?php echo(json_encode($defensesAT)); ?>
        }, 
    ]
};
var myBarChart = new Chart(ctx).Bar(data, {scaleShowGridLines : true}); 
</script>
</div>
<div class="col-lg-6  col-sm-6 col-xs-6">
<canvas id="yourChart2" width="500" height="250"></canvas>
<script> 
var ctx = document.getElementById("yourChart2").getContext("2d");
var data = {
    labels: ["Portcullis", "Cheval De Frise", "Moat", "Ramparts", "Drawbridge", "Sally Port", "Rough Terrain", "Rock Wall", "Low Bar"],
    datasets: [
        {
            label: "Total Crosses",
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,0.8)",
            highlightFill: "rgba(220,220,220,0.75)",
            highlightStroke: "rgba(220,220,220,1)",
            data: <?php echo(json_encode($defensesBT)); ?>
        }, 
    ]
};
var myBarChart = new Chart(ctx).Bar(data, {scaleShowGridLines : true});
</script>
</div>
</div>
<div class="row">
<div class="col-lg-6  col-sm-6 col-xs-6">
<div class="table-responsive">
			<table class="table">
			<tbody>
				<tr class="success">
				<th>Team</th>
				<th>Average Shot Percentage</th>
				<th>Average Auto High Goal</th>
				<th>Average Auto Low Goal</th>
				<th>Average High Goal</th>
				<th>Average Low Goal</th>
				</tr>
                <tr class="info">
                <td><?php echo($valueAT1);?></td>
				<td><?php ;if($totalHighGoalAT1 + $totalHighGoalMissedAT1 != 0){echo($totalHighGoalAT1/($totalHighGoalMissedAT1 + $totalHighGoalAT1));}?></td>
				<td><?php echo($totalAutoHighGoalAT1/$totalMatchesAT1);?></td>
				<td><?php echo($totalAutoLowGoalAT1/$totalMatchesAT1);?></td>
				<td><?php echo($totalHighGoalAT1/$totalMatchesAT1);?></td>
				<td><?php echo($totalLowGoalAT1/$totalMatchesAT1);?></td>
			  </tr>
			  <tr class="info">
				<td><?php echo($valueAT2);?></td>
				<td><?php ;if($totalHighGoalAT2 + $totalHighGoalMissedAT2 != 0){echo($totalHighGoalAT2/($totalHighGoalMissedAT2 + $totalHighGoalAT2));}?></td>
				<td><?php echo($totalAutoHighGoalAT2/$totalMatchesAT2);?></td>
				<td><?php echo($totalAutoLowGoalAT2/$totalMatchesAT2);?></td>
				<td><?php echo($totalHighGoalAT2/$totalMatchesAT2);?></td>
				<td><?php echo($totalLowGoalAT2/$totalMatchesAT2);?></td>
			  </tr>
			  <tr class="info">
				<td><?php echo($valueAT3);?></td>
				<td><?php ;if($totalHighGoalAT3 + $totalHighGoalMissedAT3 != 0){echo($totalHighGoalAT3/($totalHighGoalMissedAT3 + $totalHighGoalAT3));}?></td>
				<td><?php echo($totalAutoHighGoalAT3/$totalMatchesAT3);?></td>
				<td><?php echo($totalAutoLowGoalAT3/$totalMatchesAT3);?></td>
				<td><?php echo($totalHighGoalAT3/$totalMatchesAT3);?></td>
				<td><?php echo($totalLowGoalAT3/$totalMatchesAT3);?></td>
			  </tr> 
			</tbody>
		  </table>
		</div>
	</div>	
	<div class="col-lg-6  col-sm-6 col-xs-6">
<div class="table-responsive">
			<table class="table">
			<tbody>
				<tr class="success">
				<th>Team</th>
				<th>Average Shot Percentage</th>
				<th>Average Auto High Goal</th>
				<th>Average Auto Low Goal</th>
				<th>Average High Goal</th>
				<th>Average Low Goal</th>
				</tr>
               <tr class="danger">
                <td><?php echo($valueBT1);?></td>
				<td><?php ;if($totalHighGoalBT1 + $totalHighGoalMissedBT1 != 0){echo($totalHighGoalBT1/($totalHighGoalMissedBT1 + $totalHighGoalBT1));}?></td>
				<td><?php echo($totalAutoHighGoalBT1/$totalMatchesBT1);?></td>
				<td><?php echo($totalAutoLowGoalBT1/$totalMatchesBT1);?></td>
				<td><?php echo($totalHighGoalBT1/$totalMatchesBT1);?></td>
				<td><?php echo($totalLowGoalBT1/$totalMatchesBT1);?></td>
			  </tr>
			  <tr class="danger">
				<td><?php echo($valueBT2);?></td>
				<td><?php ;if($totalHighGoalBT2 + $totalHighGoalMissedBT2 != 0){echo($totalHighGoalBT2/($totalHighGoalMissedBT2 + $totalHighGoalBT2));}?></td>
				<td><?php echo($totalAutoHighGoalBT2/$totalMatchesBT2);?></td>
				<td><?php echo($totalAutoLowGoalBT2/$totalMatchesBT2);?></td>
				<td><?php echo($totalHighGoalBT2/$totalMatchesBT2);?></td>
				<td><?php echo($totalLowGoalBT2/$totalMatchesBT2);?></td>
			  </tr>
			  <tr class="danger">
				<td><?php echo($valueBT3);?></td>
				<td><?php ;if($totalHighGoalBT3 + $totalHighGoalMissedBT3 != 0){echo($totalHighGoalBT3/($totalHighGoalMissedBT3 + $totalHighGoalBT3));}?></td>
				<td><?php echo($totalAutoHighGoalBT3/$totalMatchesBT3);?></td>
				<td><?php echo($totalAutoLowGoalBT3/$totalMatchesBT3);?></td>
				<td><?php echo($totalHighGoalBT3/$totalMatchesBT3);?></td>
				<td><?php echo($totalLowGoalBT3/$totalMatchesBT3);?></td>
			  </tr> 
			</tbody>
		  </table>
		</div>
	</div>	
</div>	
		</div>
	</div>

    <?php include("footer.php") ?>
</body>