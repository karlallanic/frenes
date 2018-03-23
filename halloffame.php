<?php
$connect = mysqli_connect("localhost","root","");
$langgiv = $_POST['lengua'];

		mysqli_select_db($connect,"langzeppelin") or die("Database does not exist");
		if($langgiv!="all"){
			$userquery = mysqli_query($connect,"SELECT * FROM halloffame WHERE language='".$langgiv."' ORDER BY player_score DESC LIMIT 10");
		}else{
			$userquery = mysqli_query($connect,"SELECT * FROM halloffame ORDER BY player_score DESC LIMIT 10");
		}
		$data = array();	
   		while($row = mysqli_fetch_assoc($userquery)) {
			$array[]=$row;
		}
		$connect->close();
		
		$finalhof = json_encode($array);
		echo $finalhof;

	?>
