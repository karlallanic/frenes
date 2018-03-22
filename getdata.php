<?php

$connect = mysqli_connect("localhost","root","");

		mysqli_select_db($connect,"langzeppelin") or die("Database does not exist");
		$userquery = mysqli_query($connect,"SELECT * FROM words ORDER BY RAND()");
		$data = array();
   		while($row = mysqli_fetch_assoc($userquery)) {
			echo $row["word_ID"]." ".$row["category"]." ".$row["english"]." ".$row["french"]." ".$row["spanish"]."</br>";
			$array[]=$row;
		}
		$connect->close();
		print_r($array);
?>