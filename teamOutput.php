<html>
<head>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap-material-design-master/dist/css/ripples.min.css" rel="stylesheet">
    <link href="bootstrap-material-design-master/dist/css/material-wfont.min.css" rel="stylesheet">	
	<script src="jquery-1.11.2.min.js"></script>
	<script src="sorttable.js"></script>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	

</head>
<?php include("navbar.php");?>
<body>

<script src="Chart.js"></script>
<script src="jquery.js"></script>




	<div class="container row-offcanvas row-offcanvas-left">
		<div class="well column  col-lg-112  col-sm-12 col-xs-12" id="content">
		
			<form action="" method="get">
			Enter Team Number: <input class="control-label"type="number" name="team"  id="team"  size="10" height="10" width="40"> 
			<button id="submit" class="btn btn-primary" onclick="">Display</button>
		
			<h1> Team </h1>		    <img class="col-lg-5 col-sm-12 col-xs-12" style="border: none;" src="teamPics/.jpg"></img>			
		
			
			<div class="col-lg-7 col-sm-12 col-xs-12" >	
				<button class=" btn btn-material-green">Auto High Goal</button>
				<button class=" btn btn-material-blue">Auto Low Goal</button>
				<button class=" btn btn-material-orange">High Goal</button>
				<button class=" btn btn-material-purple">Low Goal</button>
				
				<canvas style="display: inline; margin: 0 auto; " id="match" height="250" width="500" ></canvas>
				
			</div>
<?php
       include("databaseName16.php");
       
       $con= mysql_connect($address, $username, $password); 

       if (!$con){
                  die('Could not connect: ' . mysql_error());
       }


       mysql_select_db($database, $con);

       $result = mysql_query('select * from '.$matchScoutDatabase.' WHERE $team == $_GET(team)');
	   

       if (!$result){
                   die('Query failed: ' . mysql_error());
       }
        $i=0;
       
       echo('<div style="border:1px solid black;overflow-y:hidden;overflow-x:scroll;"><table  class="sortable table table-hover" id="RawData" border="1">');
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
                            if(!is_numeric($key)){
                                    if($key == "TeamNumber"){
                                            $value= '<a href="teamData.php?team='.$value.'">'.$value.'</a>';
 }
                                    if($key == "MatchNumber"){
                                            $value= '<a href="matchData.php?match='.$value.'">'.$value.'</a>';
                                    }
                               echo("<td align='center'>".$value."</td>");
                       }
               }        
               echo("</tr>");                
            }
            echo("</table>");
			echo ('$sql');

?>
</div>
</div>
</div>

</body>
</html>