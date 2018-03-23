<?php
$connect = mysqli_connect("localhost","root","");
$langgiv="french";
		mysqli_select_db($connect,"langzeppelin") or die("Database does not exist");
		$userquery = mysqli_query($connect,"SELECT * FROM halloffame WHERE language='".$langgiv."' ORDER BY player_score DESC LIMIT 10");
		$data = array();
		$rank=1; ?>

<!DOCTYPE html>
<html>
	<head>
		<title>mainmenu.html</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/frenes.css">
		<style type="text/css">
body{
	color:GhostWhite  ;
}
.playzone{
background-image:url('images/BGfame.jpg');
}

.tablelink:hover{
	cursor:pointer;
	background-color: rgb(120,120,120);
}
		</style>
	</head>
	<body>
		<div class='container'>
			<div class='row'>	
				<div class='col-xs-2 col-xs-offset-2 playzone'>
						<table class='table text-center' style='margin-bottom: -37px;border:0px solid black'>
							<tr>
								<td class='tablelink' id='overHOF'>OVERALL</td>
								<td class='tablelink' id='frenHOF'>FRENCH</td>
								<td class='tablelink' id='espHOF'>SPANISH</td>
								<td class='tablelink' id='engHOF'>ENGLISH</td>
							</tr>
						</table>
						<table class='table'>	<br>
							<h1 class='text-center' id='tabletitle'><span class='glyphicon glyphicon glyphicon-globe'> Top 10 Leaderboard</span></h1>
							<tr>
								<th> <span class='glyphicon glyphicon glyphicon-star'> Rank</th> </span>
								<th> <span class='glyphicon glyphicon-user'> Name </th> </span>
								<th> <span class=' glyphicon glyphicon-glass'> SCORE </th></span>
								<th> <span class='glyphicon glyphicon-bookmark'> Language </span></th> 
							</tr>
						</div>
	  
	 <?php 
   		while($row = mysqli_fetch_assoc($userquery)) {
			echo "<tr><td>".$rank++."</td>"."<td>".$row["player_name"]."</td>"."<td>".$row["player_score"]."</td>"."<td>".$row["language"]."</td></tr>";
		
		}
		$connect->close();
	?>




      			</div>
					</div>
				</div>
		</div>

	</body>
</html>
