<!DOCTYPE html>

<html>
<?php include("header.php")?>
<body>

<?php include("navbar.php")?>
<div id="content">
	<div class="container row-offcanvas row-offcanvas-left">
		<div class="well column  col-lg-112  col-sm-12 col-xs-12" id="content">
			<?php echo ("<h1>Match Data for Match ". $_GET["match"]."</h1>")?>

			<form action="" method="get">
			Enter Match Number: 
			<input type="text" name="match" id="match" size="8">
			<button id="submit" onclick="" >Display</button>
			<br>
			<br>

			
<?php
include("databaseName16.php");
include("footer.php");
       
$con= mysql_connect($address, $username, $password); 

 if (!$con){
    die('Could not connect: ' . mysql_error());
    }
     
mysql_select_db($database, $con);

$result = mysql_query('select * from '.$headScoutMatchDatabase.'');
$out = '<div ><table class="sortable table table-hover" id="RawData" border="1"></div>';
$w=0;

//start of HS Data Table
echo('<div style="overflow-y:hidden;"><table  class="sortable table table-hover" id="RawData" border="1">');
     while ($row = mysql_fetch_array($result)){
         if($w==0){
			 foreach ($row as $key => $value){
				if($key == "matchNum"){

				}
				else if($key == "redFinal"){
					echo( "<td align='center'>"."Red Alliance Final Score"."</td>");
				}
				else if($key == "blueFinal"){
					echo ("<td align='center'>"."Blue Alliance Final Score"."</td>");
				}
				else if($key == "Strategy"){
					echo("<td align='center'>"."HS Match Notes"."</td>");
				}				
			} 
		 $w++; 
		}
		
		echo("<tr>");        
		foreach ($row as $key => $value){
			if(!is_numeric($key) and $row["matchNum"] == $_GET["match"]){
				if($key == "matchNum"){
					
				}
				else {
				echo("<td align='center'>".$value."</td>");		
				}
		    }	
		}        
	   echo("</tr>");                    
    }
echo("</table>"); //end of HS Data Table
	
mysql_select_db($database, $con);

$result = mysql_query('select * from '.$matchScoutDatabase.'');


if (!$result){
	 die('Query failed: ' . mysql_error());
}

$i=0;

echo('<div><table  class="table table-hover" id="RawData" border="1"></div>');
	while ($row = mysql_fetch_array($result)){
	     if($i==0){
		     echo("<tr>");
			 foreach ($row as $key => $value){
				if(!is_numeric($key)){
					/*if($key == "user"){
						
					}
					else if ($key == "ID"){
						
					}
					else if ($key == "matchNum"){
						
					}*/
					if($key == "user"){
						echo ("<td align='center'>"."Scout"."</td>");
					}
					else if($key == "teamNum"){
						echo ("<td align='center'>"."Team"."</td>");
					}
					else if($key == "allianceColor"){
						echo ("<td align='center'>"."Alliance"."</td>");
					}
					else if($key == "defenseReach"){
						echo ("<td align='center'>"."Reached Defense? (Auto)"."</td>");
					}
					else if($key == "crossDefense"){
						echo ("<td align='center'>"."Defense Crossed (Auto)"."</td>");
					}
					else if($key == "highShotsMadeA"){
						echo ("<td align='center'>"."High Shots Made(Auto)"."</td>");
					}
					else if($key == "lowShotsMadeA"){
						echo ("<td align='center'>"."Low Shots Made(Auto)"."</td>");
					}
					else if($key == "highShotsMadeT"){
						echo ("<td align='center'>"."High Shots Made (Teleop)"."</td>");
					}
					else if($key == "lowShotsMadeT"){
						echo ("<td align='center'>"."Low Shots Made (Teleop)"."</td>");
					}
					else if($key == "groupA"){
						echo ("<td align='center'>"."Success on Group A"."</td>");
					}
					else if($key == "groupB"){
						echo ("<td align='center'>"."Success on Group B"."</td>");
					}
					else if($key == "groupC"){
						echo ("<td align='center'>"."Success on Group C"."</td>");
					}
					else if($key == "groupD"){
						echo ("<td align='center'>"."Success on Group D"."</td>");
					}
					else if($key == "lowBar"){
						echo ("<td align='center'>"."Lowbar?"."</td>");
					}
					else if($key == "scalesExtent"){
						echo ("<td align='center'>"."Scaling Performance"."</td>");
					}
					else if($key == "challenge"){
						echo ("<td align='center'>"."Challenge"."</td>");
					}
					else if($key == "issues"){
						echo ("<td align='center'>"."Issues"."</td>");
					}
					else if($key == "comments"){
						echo ("<td align='center'>"."Comments"."</td>");
					}
				}
			}
			 $i++;
			 echo("</tr>");                
		}
		 echo("<tr>");        
		 foreach ($row as $key => $value){
			if(!is_numeric($key) and $row["matchNum"] == $_GET["match"]){
				if ($key == "user"){
					echo("<td align='center'>".$value."</td>");
				}
				else if ($key == "teamNum"){
					$value= '<a href="teamData.php?team='.$value.'">'.$value.'</a>';
					echo("<td align='center'>".$value."</td>");
				//AND ALSO ALLIANCE COLOR
				}
				if ($key == "allianceColor"){
					echo("<td align='center'>".$value."</td>");
				}
				else if ($key == "defenseReach"){
					if ($value==0){
						echo("<td align='center'>"."No"."</td>");
					}
					else {
						echo("<td align='center'>"."Yes"."</td>");
					}
				}
				else if ($key == "crossDefense"){
					echo("<td align='center'>".$value."</td>");
				}
				else if ($key == "highShotsMadeA"){
					echo("<td align='center'>".$value."</td>");
					
					//AND ALSO DIVIDED BY HIGH SHOTS ATTEMPTED
				}
				else if ($key == "lowShotsMadeA"){
					echo("<td align='center'>".$value."</td>");
					//AND ALSO DIVIDED BY LOW SHOTS ATTEMTPED
				}
				else if ($key == "highShotsMadeT"){
					echo("<td align='center'>".$value."</td>");
				}
				else if ($key == "lowShotsMadeT"){
					echo("<td align='center'>".$value."</td>");
				}
				else if ($key == "groupA"){
					echo("<td align='center'>".$value."</td>");
					//AND ALSO NUMBER OF TIMES CROSSED
				}
				else if ($key == "groupB"){
					echo("<td align='center'>".$value."</td>");
					//AND ALSO NUMBER OF TIMES CROSSED
				}
				else if ($key == "groupC"){
					echo("<td align='center'>".$value."</td>");
					//AND ALSO NUMBER OF TIMES CROSSED
				}
				else if ($key == "groupD"){
					echo("<td align='center'>".$value."</td>");
					//AND ALSO NUMBER OF TIMES CROSSED
				}
				else if ($key == "lowBar"){
					if ($value==0){
						echo("<td align='center'>"."No"."</td>");
					}
					else {
						echo("<td align='center'>"."Yes"."</td>");
					}
				}
				else if ($key == "scalesExtent"){
					//YES OR NO FROM "SCALES"
					echo("<td align='center'>".$value."</td>");
					/*if ($value==0){
						echo("<td align='center'>"."No"."<br>");
						echo($value."</td>");
					}
					else {
						echo("<td align='center'>"."Yes"."<br>");
						echo($value."</td>");
					}
					*/
				}
				else if ($key == "challenge"){
					if ($value==0){
						echo("<td align='center'>"."No"."</td>");
					}
					else {
						echo("<td align='center'>"."Yes"."</td>");
					}
				}
				else if ($key == "issues"){
					echo("<td align='center'>".$value."</td>");
				}
				else if ($key == "comments"){
					echo("<td align='center'>".$value."</td>");
				}
			}
		}        
		echo("</tr>");                
	}
echo("</table>");


?>





		</div>
	</div>
</div>


</body>
</html>

<?php include("footer.php") ?>