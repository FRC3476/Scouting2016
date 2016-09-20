<!DOCTYPE html>

<html>
<?php include("header.php")?>
<body>

<?php include("navbar.php")?>
<div id="content">
	<div class="container row-offcanvas row-offcanvas-left">
		<div class="well column  col-lg-112  col-sm-12 col-xs-12" id="content">
			<div class="column col-lg-6 col-sm-6">

			
<?php
include("databaseName16.php"); 
include("footer.php"); 
       
$con= mysql_connect($address, $username, $password); 

 if (!$con){
    die('Could not connect: ' . mysql_error());
    }
     
mysql_select_db($database, $con);

$result = mysql_query('(SELECT * FROM '.$headScoutDatabase.' ORDER BY matchNum DESC limit 2 ) ');
if (!$result){
    die('Could not connect: ' . mysql_error());
    }
//('select * from '.$headScoutDatabase.'');


//start of Table
$w=0;
echo ("<h4>Red Alliance Defenses</h4>"); 

echo('<table  class="sortable table table-hover " id="RawData" border="1" >');
     while ($row = mysql_fetch_array($result)){
		 $matchNumPrinted = False;
         if($w==0){
			 foreach ($row as $key => $value){
				if($key == "matchNum" && $matchNumPrinted == False){
					echo( "<td align='center'><b>"."Match Number"."</b></td>");
					$matchNumPrinted = True;
				}
				else if($key == "redGroupA"){
					echo( "<td align='center'><b>"."Group A Defense"."</b></td>");
				}
				else if($key == "redGroupB"){
					echo ("<td align='center'><b>"."Group B Defense"."</b></td>");
				}
				else if($key == "redGroupC"){
					echo("<td align='center'><b>"."Group C Defense"."</b></td>");
				}
				else if($key == "redGroupD"){
					echo("<td align='center'><b>"."Group D Defense"."</b></td>");
				}	
		
								
			} 
		 $w++; 
		}
		
		echo("<tr class='danger'>");  
	       
		foreach ($row as $key => $value){

				if($key == "matchNum" && $matchNumPrinted == False){
					echo( "<td align='center'>".$value."</td>");
					$matchNumPrinted = True;
				}
				else if($key == "redGroupA"){
					echo("<td align='center'>".$value."</td>");		
				}
				else if($key == "redGroupB"){
					echo("<td align='center'>".$value."</td>");		
				}
				else if($key == "redGroupC"){
					echo("<td align='center'>".$value."</td>");		
				}
				else if($key == "redGroupD"){
					echo("<td align='center'>".$value."</td>");		
				}
					    }	
		        
	   echo("</tr>");                    
    }
echo("</table>"); //end of Table

//start of Table
$result = mysql_query('(SELECT * FROM '.$headScoutDatabase.' ORDER BY matchNum DESC limit 2 ) ');

if (!$result){
    die('Could not connect: ' . mysql_error());
    }
	
$i=0;
echo ("<h4>Red Alliance Teams</h4>"); 

echo('<table  class="sortable table table-hover" id="RawData" border="1">');
     while ($row = mysql_fetch_array($result)){
		 $matchNumPrinted = False;
         if($i==0){
			 foreach ($row as $key => $value){
				if($key == "matchNum" && $matchNumPrinted == False){
					echo( "<td align='center'><b>"."Match Number"."</b></td>");
					$matchNumPrinted = True;
				}
				else if($key == "redTeam1"){
					echo( "<td align='center'><b>"."Red Team 1"."</b></td>");
				}
				else if($key == "redTeam2"){
					echo ("<td align='center'><b>"."Red Team 2"."</b></td>");
				}
				else if($key == "redTeam3"){
					echo("<td align='center'><b>"."Red Team 3"."</b></td>");
				}			
			} 
		 $i++; 
		}
		
		echo("<tr class='danger'>");  
	       
		foreach ($row as $key => $value){
			if($key == "matchNum" && $matchNumPrinted == False){
				echo( "<td align='center'>".$value."</td>");
				$matchNumPrinted = True;
			}
			else if($key == "redTeam1"){
				echo("<td align='center'>".$value."</td>");		
			}
			else if($key == "redTeam2"){
				echo("<td align='center'>".$value."</td>");		
			}
			else if($key == "redTeam3"){
				echo("<td align='center'>".$value."</td>");		
			}
		 }	
		        
	   echo("</tr>");                    
    }
echo("</table></div><div class='column col-lg-6 col-sm-6'>"); //end of Table
	
//BLUE NOW

$result = mysql_query('(SELECT * FROM '.$headScoutDatabase.' ORDER BY matchNum DESC limit 2 ) ');
if (!$result){
    die('Could not connect: ' . mysql_error());
    }
//('select * from '.$headScoutDatabase.'');


//start of Table
$a=0;
echo ("<h4>Blue Alliance Defenses</h4>"); 

echo('<table  class="sortable table table-hover" id="RawData" border="1">');
     while ($row = mysql_fetch_array($result)){
		 $matchNumPrinted = False;
         if($a==0){
			 foreach ($row as $key => $value){
				if($key == "matchNum" && $matchNumPrinted == False){
					echo( "<td align='center'><b>"."Match Number"."</td>");
					$matchNumPrinted = True;
				}
				else if($key == "blueGroupA"){
					echo( "<td align='center'><b>"."Group A Defense"."</b></td>");
				}
				else if($key == "blueGroupB"){
					echo ("<td align='center'><b>"."Group B Defense"."</b></td>");
				}
				else if($key == "blueGroupC"){
					echo("<td align='center'><b>"."Group C Defense"."</b></td>");
				}
				else if($key == "blueGroupD"){
					echo("<td align='center'><b>"."Group D Defense"."</b></td>");
				}	
		
								
			} 
		 $a++; 
		}
		
		echo("<tr class='info'>");  
	       
		foreach ($row as $key => $value){

				if($key == "matchNum" && $matchNumPrinted == False){
					echo( "<td align='center'>".$value."</td>");
					$matchNumPrinted = True;
				}
				else if($key == "blueGroupA"){
					echo("<td align='center'>".$value."</td>");		
				}
				else if($key == "blueGroupB"){
					echo("<td align='center'>".$value."</td>");		
				}
				else if($key == "blueGroupC"){
					echo("<td align='center'>".$value."</td>");		
				}
				else if($key == "blueGroupD"){
					echo("<td align='center'>".$value."</td>");		
				}
					    }	
		        
	   echo("</tr>");                    
    }
echo("</table>"); //end of Table

//start of Table
$result = mysql_query('(SELECT * FROM '.$headScoutDatabase.' ORDER BY matchNum DESC limit 2 ) ');

if (!$result){
    die('Could not connect: ' . mysql_error());
    }
	
$b=0;
echo ("<h4>Blue Alliance Teams</h4>"); 

echo('<table  class="sortable table table-hover" id="RawData" border="1">');
     while ($row = mysql_fetch_array($result)){
		 $matchNumPrinted = False;
         if($b==0){
			 foreach ($row as $key => $value){
				if($key == "matchNum" && $matchNumPrinted == False){
					echo( "<td align='center'><b>"."Match Number"."</b></td>");
					$matchNumPrinted = True;
				}
				else if($key == "blueTeam1"){
					echo( "<td align='center'><b>"."Blue Team 1"."</b></td>");
				}
				else if($key == "blueTeam2"){
					echo ("<td align='center'><b>"."Blue Team 2"."</b></td>");
				}
				else if($key == "blueTeam3"){
					echo("<td align='center'><b>"."Blue Team 3"."</b></td>");
				}			
			} 
		 $b++; 
		}
		
		echo("<tr class='info'>");  
	       
		foreach ($row as $key => $value){
			if($key == "matchNum" && $matchNumPrinted == False){
				echo( "<td align='center'>".$value."</td>");
				$matchNumPrinted = True;
			}
			else if($key == "blueTeam1"){
				echo("<td align='center'>".$value."</td>");		
			}
			else if($key == "blueTeam2"){
				echo("<td align='center'>".$value."</td>");		
			}
			else if($key == "blueTeam3"){
				echo("<td align='center'>".$value."</td>");		
			}
		 }	
		        
	   echo("</tr>");                    
    }
echo("</table></div>"); //end of Table 



?>





		</div>
	</div>
</div>


</body>
</html>

<?php include("footer.php") ?>