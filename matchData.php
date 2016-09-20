<!DOCTYPE html>

<html>
<?php include("header.php")?>
<body>

<?php include("navbar.php")?>
<div id="content">
<div class="container row-offcanvas row-offcanvas-left">
<div class="well column  col-lg-112  col-sm-12 col-xs-12" id="content">


<h1>Match Data</h1>

	<form action="" method="get">
	Enter Match Number: 
	<input type="text" name="match" id="match" size="8">
	<button id="submit" onclick="" >Display</button>
	<br>
	<br>
<?php
       include("databaseName.php");

	include("footer.php");
       
       $con= mysql_connect($address, $username, $password); 

       if (!$con){
                  die('Could not connect: ' . mysql_error());
       }
     
	 
	 //New Stuff that could potentially destroy everything 3-20-15
mysql_select_db($database, $con);
$result = mysql_query('select * from '.$headScoutDatabase.'');
  $w=0;
       
       echo('<div style="overflow-y:hidden;"><table  class="sortable table table-hover" id="RawData" border="1">');
       while ($row = mysql_fetch_array($result)){
               if($w==0){
                       echo("<tr>");
                       foreach ($row as $key => $value){
                                    if(!is_numeric($key)){
                                       echo("<td>".$key."</td>");
                               }
                       }
                       $w++;
                       echo("</tr>");                
               }
					echo("<tr>");        
                    foreach ($row as $key => $value){
                            if(!is_numeric($key) and $row["MatchNumber"] == $_GET["match"]){

                                    if($key == "MatchNumber"){
                                         $value= '<a href="headScoutForm.php?match='.$value.'">'.$value.'</a>';
										
                                    }
									echo("<td align='center'>".$value."</td>");
									
                       }
               }        
               echo("</tr>");                    
            }
            echo("</table>");
	 //end of new stuff
	 
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
                                       echo("<td>".$key."</td>");
									}
                               }
                       $i++;
                       echo("</tr>");                
               }
               echo("<tr>");        
                    foreach ($row as $key => $value){
                            if(!is_numeric($key) and $row["MatchNumber"] == $_GET["match"]){

                                    if($key == "MatchNumber"){
                                         $value= '<a href="matchData.php?match='.$value.'">'.$value.'</a>';
										
                                    }
									echo("<td align='center'>".$value."</td>");
									
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