
<?php
$connect = mysqli_connect("localhost","root","");
		mysqli_select_db($connect,"langzeppelin") or die("Database does not exist");
		$userquery = mysqli_query($connect,"SELECT * FROM words ORDER BY RAND()");
		$data = array();
   		while($row = mysqli_fetch_assoc($userquery)) {
			$array[]=$row;
			
		}
		$connect->close();

		$finale = json_encode($array);
		echo $finale;
?>