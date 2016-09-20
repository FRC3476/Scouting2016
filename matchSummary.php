<html>
<?php include("header.php")?>
<body>
	<?php include("navbar.php")?>

	<div class="container row-offcanvas row-offcanvas-left">
		<div class="well column  col-lg-12  col-sm-12 col-xs-12" id="content">
		
		<form action="matchSummary.php" method="get">
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
		
		$matchNum = array();
		$defense = array("portcullis" => 0, "cheval" => 0, "moat" => 0, "ramparts" => 0, "drawbridge" => 0, "sallyport" => 0, "roughterrain" => 0, "rockwall" => 0, "lowBar"=> 0);
		$tableEcho= $tableEcho."<table  class='sortable table table-hover' id='RawData' border='1'>";
		while ($row = mysql_fetch_array($result)){
			array_push($matchNum, $row["matchNum"]);
			$match = $row["matchNum"];
			$color = $row["allianceColor"];
			$newResult = mysql_query("select * from ".$headScoutDatabase." WHERE matchNum = ".$match);
			$defenseResult = mysql_fetch_array($newResult);;
			if ($color == "blue"){
				$defense[$defenseResult["blueGroupA"]] += $row["DefenseA"];
				$defense[$defenseResult["blueGroupB"]] += $row["DefenseB"];
				$defense[$defenseResult["blueGroupC"]] += $row["DefenseC"];
				$defense[$defenseResult["blueGroupD"]] += $row["DefenseD"];
				$defense["lowBar"] += $row["lowBar"];
			}
			if($color == "red"){
				$defense[$defenseResult["redGroupA"]] += $row["DefenseA"];
				$defense[$defenseResult["redGroupB"]] += $row["DefenseB"];
				$defense[$defenseResult["redGroupC"]] += $row["DefenseC"];
				$defense[$defenseResult["redGroupD"]] += $row["DefenseD"];
				$defense["lowBar"] += $row["lowBar"];
			}

		}
		echo ($tableEcho."
			<tr>
				<td>Team Number</td>
				<td>Portcullis</td>
				<td>Cheval de Frise</td>
				<td>Ramparts</td>
				<td>Moat</td>
				<td>Drawbridge</td>
				<td>Sallyport</td>
				<td>Rock Wall</td>
				<td>Rough Terrain</td>
				<td>Low Bar</td>
			</tr>");
			
		$valueAT1= '<a href="teamData.php?team='.$_GET['AT1'].'">'.$_GET['AT1'].'</a>';
		
		echo ("
			<tr>
				<td>".$valueAT1."</td>
				<td>".$defense['portcullis']."</td>
				<td>".$defense['cheval']."</td>
				<td>".$defense['ramparts']."</td>
				<td>".$defense['moat']."</td>
				<td>".$defense['drawbridge']."</td>
				<td>".$defense['sallyport']."</td>
				<td>".$defense['rockwall']."</td>
				<td>".$defense['roughterrain']."</td>
				<td>".$defense['lowBar']."</td>
			</tr>");
		
			
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
		
		$matchNum = array();
		$defense = array("portcullis" => 0, "cheval" => 0, "moat" => 0, "ramparts" => 0, "drawbridge" => 0, "sallyport" => 0, "roughterrain" => 0, "rockwall" => 0, "lowBar"=> 0);
		$tableEcho= $tableEcho."<table  class='sortable table table-hover' id='RawData' border='1'>";
		while ($row = mysql_fetch_array($result)){
			array_push($matchNum, $row["matchNum"]);
			$match = $row["matchNum"];
			$color = $row["allianceColor"];
			$newResult = mysql_query("select * from ".$headScoutDatabase." WHERE matchNum = ".$match);
			$defenseResult = mysql_fetch_array($newResult);;
			if ($color == "blue"){
				$defense[$defenseResult["blueGroupA"]] += $row["DefenseA"];
				$defense[$defenseResult["blueGroupB"]] += $row["DefenseB"];
				$defense[$defenseResult["blueGroupC"]] += $row["DefenseC"];
				$defense[$defenseResult["blueGroupD"]] += $row["DefenseD"];
				$defense["lowBar"] += $row["lowBar"];
			}
			if($color == "red"){
				$defense[$defenseResult["redGroupA"]] += $row["DefenseA"];
				$defense[$defenseResult["redGroupB"]] += $row["DefenseB"];
				$defense[$defenseResult["redGroupC"]] += $row["DefenseC"];
				$defense[$defenseResult["redGroupD"]] += $row["DefenseD"];
				$defense["lowBar"] += $row["lowBar"];
			}

		}
		
		$valueAT2= '<a href="teamData.php?team='.$_GET['AT2'].'">'.$_GET['AT2'].'</a>';
			
		echo ("
			<tr>
				<td>".$valueAT2."</td>
				<td>".$defense['portcullis']."</td>
				<td>".$defense['cheval']."</td>
				<td>".$defense['ramparts']."</td>
				<td>".$defense['moat']."</td>
				<td>".$defense['drawbridge']."</td>
				<td>".$defense['sallyport']."</td>
				<td>".$defense['rockwall']."</td>
				<td>".$defense['roughterrain']."</td>
				<td>".$defense['lowBar']."</td>
			</tr>");
		
			
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
		
		$matchNum = array();
		$defense = array("portcullis" => 0, "cheval" => 0, "moat" => 0, "ramparts" => 0, "drawbridge" => 0, "sallyport" => 0, "roughterrain" => 0, "rockwall" => 0, "lowBar"=> 0);
		$tableEcho= $tableEcho."<table  class='sortable table table-hover' id='RawData' border='1'>";
		while ($row = mysql_fetch_array($result)){
			array_push($matchNum, $row["matchNum"]);
			$match = $row["matchNum"];
			$color = $row["allianceColor"];
			$newResult = mysql_query("select * from ".$headScoutDatabase." WHERE matchNum = ".$match);
			$defenseResult = mysql_fetch_array($newResult);;
			if ($color == "blue"){
				$defense[$defenseResult["blueGroupA"]] += $row["DefenseA"];
				$defense[$defenseResult["blueGroupB"]] += $row["DefenseB"];
				$defense[$defenseResult["blueGroupC"]] += $row["DefenseC"];
				$defense[$defenseResult["blueGroupD"]] += $row["DefenseD"];
				$defense["lowBar"] += $row["lowBar"];
			}
			if($color == "red"){
				$defense[$defenseResult["redGroupA"]] += $row["DefenseA"];
				$defense[$defenseResult["redGroupB"]] += $row["DefenseB"];
				$defense[$defenseResult["redGroupC"]] += $row["DefenseC"];
				$defense[$defenseResult["redGroupD"]] += $row["DefenseD"];
				$defense["lowBar"] += $row["lowBar"];
			}

		}
		
		$valueAT3= '<a href="teamData.php?team='.$_GET['AT3'].'">'.$_GET['AT3'].'</a>';
		
		echo ("
			<tr>
				<td>".$valueAT3."</td>
				<td>".$defense['portcullis']."</td>
				<td>".$defense['cheval']."</td>
				<td>".$defense['ramparts']."</td>
				<td>".$defense['moat']."</td>
				<td>".$defense['drawbridge']."</td>
				<td>".$defense['sallyport']."</td>
				<td>".$defense['rockwall']."</td>
				<td>".$defense['roughterrain']."</td>
				<td>".$defense['lowBar']."</td>
			</tr>");
		
			
	}

	//End Team 3
	
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
		
		$matchNum = array();
		$defense = array("portcullis" => 0, "cheval" => 0, "moat" => 0, "ramparts" => 0, "drawbridge" => 0, "sallyport" => 0, "roughterrain" => 0, "rockwall" => 0, "lowBar"=> 0);
		$tableEcho= $tableEcho."<table  class='sortable table table-hover' id='RawData' border='1'>";
		while ($row = mysql_fetch_array($result)){
			array_push($matchNum, $row["matchNum"]);
			$match = $row["matchNum"];
			$color = $row["allianceColor"];
			$newResult = mysql_query("select * from ".$headScoutDatabase." WHERE matchNum = ".$match);
			$defenseResult = mysql_fetch_array($newResult);;
			if ($color == "blue"){
				$defense[$defenseResult["blueGroupA"]] += $row["DefenseA"];
				$defense[$defenseResult["blueGroupB"]] += $row["DefenseB"];
				$defense[$defenseResult["blueGroupC"]] += $row["DefenseC"];
				$defense[$defenseResult["blueGroupD"]] += $row["DefenseD"];
				$defense["lowBar"] += $row["lowBar"];
			}
			if($color == "red"){
				$defense[$defenseResult["redGroupA"]] += $row["DefenseA"];
				$defense[$defenseResult["redGroupB"]] += $row["DefenseB"];
				$defense[$defenseResult["redGroupC"]] += $row["DefenseC"];
				$defense[$defenseResult["redGroupD"]] += $row["DefenseD"];
				$defense["lowBar"] += $row["lowBar"];
			}

		}
		echo ($tableEcho."
			<tr>
				<td>Team Number</td>
				<td>Portcullis</td>
				<td>Cheval de Frise</td>
				<td>Ramparts</td>
				<td>Moat</td>
				<td>Drawbridge</td>
				<td>Sallyport</td>
				<td>Rock Wall</td>
				<td>Rough Terrain</td>
				<td>Low Bar</td> 
			</tr>");
			
		$valueBT1= '<a href="teamData.php?team='.$_GET['BT1'].'">'.$_GET['BT1'].'</a>';	
		
		echo ("
			<tr>
				<td>".$valueBT1."</td>
				<td>".$defense['portcullis']."</td>
				<td>".$defense['cheval']."</td>
				<td>".$defense['ramparts']."</td>
				<td>".$defense['moat']."</td>
				<td>".$defense['drawbridge']."</td>
				<td>".$defense['sallyport']."</td>
				<td>".$defense['rockwall']."</td>
				<td>".$defense['roughterrain']."</td>
				<td>".$defense['lowBar']."</td>
			</tr>");
		
			
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
		
		$matchNum = array();
		$defense = array("portcullis" => 0, "cheval" => 0, "moat" => 0, "ramparts" => 0, "drawbridge" => 0, "sallyport" => 0, "roughterrain" => 0, "rockwall" => 0, "lowBar"=> 0);
		$tableEcho= $tableEcho."<table  class='sortable table table-hover' id='RawData' border='1'>";
		while ($row = mysql_fetch_array($result)){
			array_push($matchNum, $row["matchNum"]);
			$match = $row["matchNum"];
			$color = $row["allianceColor"];
			$newResult = mysql_query("select * from ".$headScoutDatabase." WHERE matchNum = ".$match);
			$defenseResult = mysql_fetch_array($newResult);;
			if ($color == "blue"){
				$defense[$defenseResult["blueGroupA"]] += $row["DefenseA"];
				$defense[$defenseResult["blueGroupB"]] += $row["DefenseB"];
				$defense[$defenseResult["blueGroupC"]] += $row["DefenseC"];
				$defense[$defenseResult["blueGroupD"]] += $row["DefenseD"];
				$defense["lowBar"] += $row["lowBar"];
			}
			if($color == "red"){
				$defense[$defenseResult["redGroupA"]] += $row["DefenseA"];
				$defense[$defenseResult["redGroupB"]] += $row["DefenseB"];
				$defense[$defenseResult["redGroupC"]] += $row["DefenseC"];
				$defense[$defenseResult["redGroupD"]] += $row["DefenseD"];
				$defense["lowBar"] += $row["lowBar"];
			}

		}
		
		$valueBT2= '<a href="teamData.php?team='.$_GET['BT2'].'">'.$_GET['BT2'].'</a>';	
		
		echo ("
			<tr>
				<td>".$valueBT2."</td>
				<td>".$defense['portcullis']."</td>
				<td>".$defense['cheval']."</td>
				<td>".$defense['ramparts']."</td>
				<td>".$defense['moat']."</td>
				<td>".$defense['drawbridge']."</td>
				<td>".$defense['sallyport']."</td>
				<td>".$defense['rockwall']."</td>
				<td>".$defense['roughterrain']."</td>
				<td>".$defense['lowBar']."</td>
			</tr>");
		
			
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
		
		$matchNum = array();
		$defense = array("portcullis" => 0, "cheval" => 0, "moat" => 0, "ramparts" => 0, "drawbridge" => 0, "sallyport" => 0, "roughterrain" => 0, "rockwall" => 0, "lowBar"=> 0);
		$tableEcho= $tableEcho."<table  class='sortable table table-hover' id='RawData' border='1'>";
		while ($row = mysql_fetch_array($result)){
			array_push($matchNum, $row["matchNum"]);
			$match = $row["matchNum"];
			$color = $row["allianceColor"];
			$newResult = mysql_query("select * from ".$headScoutDatabase." WHERE matchNum = ".$match);
			$defenseResult = mysql_fetch_array($newResult);;
			if ($color == "blue"){
				$defense[$defenseResult["blueGroupA"]] += $row["DefenseA"];
				$defense[$defenseResult["blueGroupB"]] += $row["DefenseB"];
				$defense[$defenseResult["blueGroupC"]] += $row["DefenseC"];
				$defense[$defenseResult["blueGroupD"]] += $row["DefenseD"];
				$defense["lowBar"] += $row["lowBar"];
			}
			if($color == "red"){
				$defense[$defenseResult["redGroupA"]] += $row["DefenseA"];
				$defense[$defenseResult["redGroupB"]] += $row["DefenseB"];
				$defense[$defenseResult["redGroupC"]] += $row["DefenseC"];
				$defense[$defenseResult["redGroupD"]] += $row["DefenseD"];
				$defense["lowBar"] += $row["lowBar"];
			}

		}
		
			
		$valueBT3= '<a href="teamData.php?team='.$_GET['BT3'].'">'.$_GET['BT3'].'</a>';
		

			
		echo ("
			<tr>
				<td>".$valueBT3."</td>
				<td>".$defense['portcullis']."</td>
				<td>".$defense['cheval']."</td>
				<td>".$defense['ramparts']."</td>
				<td>".$defense['moat']."</td>
				<td>".$defense['drawbridge']."</td>
				<td>".$defense['sallyport']."</td>
				<td>".$defense['rockwall']."</td>
				<td>".$defense['roughterrain']."</td>
				<td>".$defense['lowBar']."</td>
			</tr>");
		
			
	}

	//End Team 3	
?>
			

			
		</div>
	</div>

    <?php include("footer.php") ?>
</body>