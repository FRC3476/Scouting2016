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

<div id="content">
<div class="container row-offcanvas row-offcanvas-left">
<div class="well column  col-lg-112  col-sm-12 col-xs-12" id="content">


<h1>Head Scout Raw Data</h1>

<?php
       include("databaseName16.php");
       
       $con= mysql_connect($address, $username, $password); 

       if (!$con){
                  die('Could not connect: ' . mysql_error());
       }


       mysql_select_db($database, $con);

       $result = mysql_query('select * from '.$headScoutDatabase.'');
	   

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
                                    if($key == "redTeam1"){
                                            $value= '<a href="teamData.php?team='.$value.'">'.$value.'</a>';
									}
									if($key == "redTeam2"){
                                            $value= '<a href="teamData.php?team='.$value.'">'.$value.'</a>';
									}
									if($key == "redTeam3"){
                                            $value= '<a href="teamData.php?team='.$value.'">'.$value.'</a>';
									}
									if($key == "blueTeam1"){
                                            $value= '<a href="teamData.php?team='.$value.'">'.$value.'</a>';
									}
									if($key == "blueTeam2"){
                                            $value= '<a href="teamData.php?team='.$value.'">'.$value.'</a>';
									}
									if($key == "blueTeam3"){
                                            $value= '<a href="teamData.php?team='.$value.'">'.$value.'</a>';
									}
                                    if($key == "matchNum"){ 
                                            $value= '<a href="getMatchData.php?match='.$value.'">'.$value.'</a>';
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
