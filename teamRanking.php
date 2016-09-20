<html>
<?php include("header.php")?>
<body>
	<?php include("navbar.php")?>

	<div class="container row-offcanvas row-offcanvas-left">
		<div class="well column  col-lg-12  col-sm-12 col-xs-12" id="content">
			<h2>Match Ranking</h2>
			<form action="" method="get">
			Match Number To Look Above: <input class="control-label"type="number" name="match"  id="match"  size="10" height="10" width="40"> 
			<button id="submit" class="btn btn-primary" onclick="">Display</button>
			</form>
			<table  class="sortable table table-hover" id="RawData" border="1">
				<tr>
					<th>Team Number</th>
					<th>Avg. Auto High Goal</th>
					<th>Avg. Auto Low Goal</th>
					<th>Avg. High Goal</th>
					<th>Shot Accuracy </th>
					<th>Avg. Low Goal</th>
					<th>Scale</th>
					<th>Portcullis</th>
					<th>Cheval De Frise</th>
					<th>Moat</th>
					<th>Ramparts</th>
					<th>Drawbridge</th>
					<th>Sally Port</th>
					<th>Rough Terrain</th>
					<th>Rock Wall</th>
					<th>Low Bar</th>
				</tr>
			<?php
				include("databaseName16.php");
				$con= mysql_connect($address, $username, $password); 
			
				if (!$con){
					die('Could not connect: ' . mysql_error());
				}
					
				mysql_select_db($database, $con);
				include('team.php');
				$PitScoutQ = mysql_query("select * from ".$pitDatabase);
				$teamList = array ();
				while($row = mysql_fetch_array($PitScoutQ)){
					array_push($teamList, $row["TeamNumber"] );
				}
				//$TeamDat = array();
				
				foreach($teamList as $TeamNumber){
					$MatchScoutQ = mysql_query("select * from ".$matchScoutDatabase." WHERE teamNum='".$TeamNumber."'");
	
					if (!$MatchScoutQ ){
						die('Query failed: ' . mysql_error());
					}
					
						$i=0;
					   $totalHighGoal = 0;
					   $totalHighGoalMissed = 0;
					   $totalLowGoal = 0;
					   $totalAutoHighGoal = 0;
					   $totalAutoLowGoal = 0;
					   $totalMatches =0;
					   $tableEcho = "";
					   $autoHighGoal = array();
					   $autoLowGoal = array();
					   $highGoal = array();
					   $lowGoal = array();
					   $matchNum = array();			
						$defense = array("portcullis" => 0, "cheval" => 0, "moat" => 0, "ramparts" => 0, "drawbridge" => 0, "sallyport" => 0, "roughterrain" => 0, "rockwall" => 0, "lowBar"=> 0, "scale"=> 0);
					while ($row = mysql_fetch_array($MatchScoutQ )){
						 if($i==0){	
							$tableEcho= $tableEcho."<tr>";
							foreach ($row as $key => $value){
                                    if(!is_numeric($key)){
                                       $tableEcho= $tableEcho."<td>".$key."</td>";
                               }
							}
						$i++;
						 }
						$totalHighGoal = $totalHighGoal + $row["highShotsMadeT"];
						$totalHighGoalMissed = $totalHighGoalMissed + $row["highShotsMissedT"];
						$totalLowGoal = $totalLowGoal + $row["lowShotsMadeT"];
						$totalAutoHighGoal = $totalAutoHighGoal + $row["highShotsMadeA"];
						$totalAutoLowGoal = $totalAutoLowGoal + $row['lowShotsMadeA'];
						$totalMatches = $totalMatches + 1;
						array_push($autoHighGoal, $row["highShotsMadeA"]);
						array_push($autoLowGoal, $row["lowShotsMadeA"]);
						array_push($highGoal, $row["highShotsMadeT"]);
						array_push($lowGoal, $row["lowShotsMadeT"]);
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
							$defense["scale"] += $row["scales"];
						}
						if($color == "red"){
							$defense[$defenseResult["redGroupA"]] += $row["DefenseA"];
							$defense[$defenseResult["redGroupB"]] += $row["DefenseB"];
							$defense[$defenseResult["redGroupC"]] += $row["DefenseC"];
							$defense[$defenseResult["redGroupD"]] += $row["DefenseD"];
							$defense["lowBar"] += $row["lowBar"];
							$defense["scale"] += $row["scales"];
						}
						 $tableEcho= $tableEcho."<tr>";         
					}
					$totalHighGoal /= $i;
					$totalLowGoal /= $i;
					$totalAutoHighGoal /= $i;
					$totalAutoLowGoal /= $i;
					
					//$TeamDat[$TeamNumber] = array($avgAutoStack,$avgStackHeight,$avgStackNumber,$avgBinnedStacks);
					echo("<tr>
							<td><a href='teamData.php?team=".$TeamNumber."'>".$TeamNumber."</a></td>
					<th>".($totalAutoHighGoal/$totalMatches)."</th>
					<th>".($totalAutoLowGoal/$totalMatches)."</th>
					<th>".($totalHighGoal/$totalMatches)."</th>
					<th>".($totalHighGoal/($totalHighGoalMissed + $totalHighGoal))."</th>
					<th>".($totalLowGoal/$totalMatches)."</th>
					<th>".$defense["scale"]."</th>
					<th>".$defense["portcullis"]."</th>
					<th>".$defense["cheval"]."</th>
					<th>".$defense["moat"]."</th>
					<th>".$defense["ramparts"]."</th>
					<th>".$defense["drawbridge"]."</th>
					<th>".$defense["sallyport"]."</th>
					<th>".$defense["roughterrain"]."</th>
					<th>".$defense["rockwall"]."</th>
					<th>".$defense["lowBar"]."</th>
					</tr>");
				}
				
			?>
			</table>
		</div>
	</div
	<?php echo($tableEcho);?>
    <?php include("footer.php") ?>
</body>