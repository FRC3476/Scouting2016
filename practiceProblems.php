<?php
	echo("Practice Problems<br><br><br>");
	
	echo("Problem One: Take arrays and turn them into SQL Queries<br><br>");
	
	$a = "asd";
	echo($a." WHOO");
	
	$sqlArr1 = array('table' => "tb1" , 'r1' => "Name" , 'data1' => "Stan");
	print_r($sqlArr1);
	echo("<br>");
	
    $sql1 =  "INSERT INTO ".$sqlArr1[table]."('".$sqlArr1[r1]."')"." VALUES ". "('".$sqlArr1[data1]."')"; //
	
	echo("USER: ".$sql1."<br>");
	echo("EXPECTED: INSERT INTO tb1('Name') VALUES ('Stan')<br>");
	echo("<br>");
	

	
	
	
	$sqlArr2 = array('table' => "tb2" , 'r1' => "Name" , 'r2' => "Date",  'data1' => "Stan" , 'data2' => "2000 BC");
	print_r($sqlArr2);
	echo("<br>");
	
	$sql2 = "INSERT INTO ".$sqlArr2[table]."('".$sqlArr2[r1]."', '".$sqlArr2[r2]."') ".  VALUES . "('".$sqlArr2[data1]."', '". $sqlArr2[data2]."')"; 
	
	echo("USER: ".$sql2."<br>");
	echo("EXPECTED: INSERT INTO tb2('Name' , 'Date') VALUES ('Stan' , '2000 BC')<br>");
	
	
	
	echo("<br><br>Problem Two: Modify function exclaim to replace a . with an !. Only use a loop to do this.<br>");
	
	function exclaim($in){
		$stringLength = strlen($in);
		$out = "";
		for ($x=0; $x<=$stringLength; $x++){
           
            if ($in[$x]=="."){
                $in[$x]="!";
                
            }
        $out=$in;
        }
		return($out);
	}
	
	echo("<br>");
	
	echo("USER: ".exclaim("asd.s!ad")."<br>");
	echo("EXPECTED: asd!s!ad<br><br>");
	
	
	echo("USER: ".exclaim("Stan the Dino was the most majestic Dino in the universe. He was so cool.")."<br>");
	echo("EXPECTED: Stan the Dino was the most majestic Dino in the universe! He was so cool!<br><br>");
	
	
	echo("USER: ".exclaim("Woah Dude!")."<br>");
	echo("EXPECTED: Woah Dude!<br><br>");
	
	
	echo("<br><br>Problem Three: Use a loop to print array sorted from lowest to highest.<br>");
	
	$sortThis = array("a" => 3 , "b" => 2 , "c" => 9 , "d" => 1 , "e" => 6);
	
	//Feel free to modify this loop or put this loop within another loop. 
	if (sizeof($sortThis)==0){
		echo ("AYYYYY SWAG");
	}
	else{
		for ($x=0; $x<=sizeof($sortThis); $x++){
			$small=0;
			$b=10000; 
			foreach (array_expression as $key => $value) {
				
			     if ($value<$b){
				$b=$value; 
				}
				else {
					array_splice($sortThis,$value,1);
				}
			}	
		
		echo ($b);
		echo("<br>");
		}
	}
	
	echo("EXPECTED:<br>1<br>2<br>3<br>6<br>9<br>");
	
	
	
	

?>