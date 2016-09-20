<html>
<?php include("navbar.php");?>
<body>

<script src="Chart.js-master/Chart.js"></script>


<script>
var $ = jQuery.noConflict();
</script>

	<div class="container row-offcanvas row-offcanvas-left">
		<div class="well column  col-lg-112  col-sm-12 col-xs-12" id="content">
		<?php
		if($_GET["team"]){
			
			include("databaseName16.php");
       
			$con= mysql_connect($address, $username, $password); 

			if (!$con){
				die('Could not connect: ' . mysql_error());
			}


			mysql_select_db($database, $con);
			$query = 'select * from '.$matchScoutDatabase.' WHERE teamNum =' .$_GET["team"];
			$result = mysql_query($query);
			$queryOne = 'select * from '.$pitDatabase.' WHERE TeamNumber =' .$_GET["team"];
			$pitResult = mysql_query($queryOne);

			if (!$result){
				die('Query failed: ' . mysql_error());
			}
			if (!$pitResult){
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
			$weightRobot = 0;
			$numberBatteries = 0;
			$chargedBatteries = 0;
			$defense = array("portcullis" => 0, "cheval" => 0, "moat" => 0, "ramparts" => 0, "drawbridge" => 0, "sallyport" => 0, "roughterrain" => 0, "rockwall" => 0, "lowBar"=> 0);
			$tableEcho= $tableEcho.'<div style="border:1px solid black;overflow-y:hidden;overflow-x:scroll;"><table  class="sortable table table-hover" id="RawData" border="1">';
       while ($row = mysql_fetch_array($pitResult)){
			$weightRobot = $row['RobotWeight']; 
			$numberBatteries = $row['NumBatteries'];
			$chargedBatteries = $row['BatteriesCharged'];
	   }
	   while ($row = mysql_fetch_array($result)){
               if($i==0){	
                       $tableEcho= $tableEcho."<tr>";
                       foreach ($row as $key => $value){
                                    if(!is_numeric($key)){
                                       $tableEcho= $tableEcho."<td>".$key."</td>";
                               }
                       }
                       $i++;
                       $tableEcho= $tableEcho."</tr>"; 
					
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
			$defenseResult = mysql_fetch_array($newResult);
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
               $tableEcho= $tableEcho."<tr>";        
                    foreach ($row as $key => $value){
                            if(!is_numeric($key)){
                                    if($key == "TeamNumber"){
                                            $value= '<a href="teamData.php?team='.$value.'">'.$value.'</a>';
 }
                                    if($key == "MatchNumber"){
                                            $value= '<a href="matchData.php?match='.$value.'">'.$value.'</a>';
                                    }
                               $tableEcho= $tableEcho."<td align='center'>".$value."</td>";
                       }
               }        
               $tableEcho= $tableEcho."</tr>";                
            }
            $tableEcho= $tableEcho."</table>";
		}
?>
<style>
.rotate090 {
	
    -webkit-transform: rotate(90deg);
    -moz-transform: rotate(90deg);
    -o-transform: rotate(90deg);
    -ms-transform: rotate(90deg);
    transform: rotate(90deg);
}
</style>
		
			<form action="" method="get">
			Enter Team Number: <input class="control-label"type="number" name="team"  id="team"  size="10" height="10" width="40"> 
			<button id="submit" class="btn btn-primary" onclick="">Display</button>
			<div class="row">
			<div class = "col-md-4">
			<h1> Team <?php echo($_GET["team"]);?></h1>	
<div class="box">			
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
			  <ol class="carousel-indicators">
				<?php 
				$index = 0;
				while(file_exists("uploads/".$_GET["team"]."-".$index.".jpg")==1){
						if($index == 0){	
							echo('<li data-target="#myCarousel" data-slide-to="'.$index.'" class="active"></li>');
						}
						else{
							echo('<li data-target="#myCarousel" data-slide-to="'.$index.'"></li>');
						}
						$index++;
				}
					?>
			  </ol>
			  <div class="carousel-inner" role="listbox">
				<?php 
				$index = 0;
				while(file_exists("uploads/".$_GET["team"]."-".$index.".jpg")==1){
						if($index == 0){	
							echo('<div class="item active">
									<img class="img-responsive" id="'.$_GET["team"].'-'.$index.'" src="uploads/'.$_GET["team"].'-'.$index.'.jpg">
								 </div>');
						}
						else{
							echo('<div class="item">
									<img class="img-responsive" id="'.$_GET["team"].'-'.$index.'" src="uploads/'.$_GET["team"].'-'.$index.'.jpg">
								 </div>');
						}
						$index++;
				}
				?>
			  </div>
			  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
			</div>
		</div>
	</div>
			<div class = "col-md-4">
			<div class="col-lg-7 col-sm-12 col-xs-12" >	
				<button class=" btn btn-material-blue">Auto High Goal</button>
				<button class=" btn btn-material-green">Auto Low Goal</button>
				<button class=" btn btn-material-purple">High Goal</button>
				<button class=" btn btn-material-red">Low Goal</button>
			
<canvas id="myChart" width="300" height="250">	</canvas>
<script>
var ctx = document.getElementById("myChart").getContext("2d");
var data = {
    labels: <?php echo(json_encode($matchNum));?>,
    datasets: [
        {
            label: "Auto High Goal",
            fillColor : "rgba(220,220,220,0.1)",
					strokeColor : "#03a9f4",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#03a9f4",
            data: <?php echo(json_encode($autoHighGoal)); ?>
        },
        {
            label: "Auto Low Goal",
            fillColor : "rgba(220,220,220,0.1)",
					strokeColor : "#0f9d58",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#0f9d58",
            data: <?php echo(json_encode($autoLowGoal)); ?>
        },
		 {
            label: "High Goal",
            fillColor : "rgba(220,220,220,0.1)",
					strokeColor : "#9c27b0",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#9c27b0",
            data: <?php echo(json_encode($highGoal)); ?>
        },
		 {
            label: "Low Goal",
           fillColor : "rgba(220,220,220,0.1)",
					strokeColor : "#f44336",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#f44336",
            data: <?php echo(json_encode($lowGoal)); ?>
        }
    ]
};
var myLineChart = new Chart(ctx).Line(data, {scaleShowGridLines : true});
</script>
</div>
			</div>
			<div class = "col-md-4">
			<div class="table-responsive">
			<table class="table">
			<tbody>
                <tr class="info">
                <td>Average Shot Percentage</td>
				<td><?php ;if($totalHighGoal + $totalHighGoalMissed != 0){echo($totalHighGoal/($totalHighGoalMissed + $totalHighGoal));}?></td>
			  </tr>
			  <tr class="success">
				<td>Average Auto High Goal</td>
				<td><?php echo($totalAutoHighGoal/$totalMatches);?></td>
			  </tr>
			  <tr class="danger">
				<td>Average Auto Low Goal</td>
				<td><?php echo($totalAutoLowGoal/$totalMatches);?></td>
			  </tr> 
			  <tr class="info">
				<td>Average High Goal</td>
				<td><?php echo($totalHighGoal/$totalMatches);?></td>
			  </tr>
			   <tr class="success">
				<td>Average Low Goal</td>
				<td><?php echo($totalLowGoal/$totalMatches);?></td>
			  </tr>
			   <tr class="danger">
				<td>Weight of Robot</td>
				<td><?php echo($weightRobot);?></td>
			  </tr>
			   <tr class="info">
				<td>No. of Batteries</td>
				<td><?php echo($numberBatteries);?></td>
			  </tr>
			   <tr class="success">
				<td>Batteries Charged Simultaneously</td>
				<td><?php echo($chargedBatteries);?></td>
			  </tr>
			</tbody>
		  </table>
		</div>
		<div>
		<canvas id="yourChart" width="300" height="250"></canvas>
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
            data: <?php echo(json_encode($defense)); ?>
        },
    ]
};
var myBarChart = new Chart(ctx).Bar(data, {scaleShowGridLines : true});
</script>


<script type="text/javascript">

$(document).ready(function() {
 $('#myCarousel').carousel({
       interval: 5000,
          cycle: false
 });
});

</script>

</div>
		</div>
		</div>
			<?php echo($tableEcho);?>

</div>
</div>
</div>
</body>
</html>