
<?php

$player_name=$_POST['player_name'];
$player_score=$_POST['player_score'];
$language=$_POST['language'];

$connect = mysqli_connect("localhost","root","");
		mysqli_select_db($connect,"langzeppelin") or die("Database does not exist");
		mysqli_query($connect,"INSERT INTO halloffame (player_name, player_score, language) VALUES('$player_name', '$player_score', '$language')");

		$connect->close();
?>