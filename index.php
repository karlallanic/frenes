
<?php

$connect = mysqli_connect("localhost","root","");

		mysqli_select_db($connect,"langzeppelin") or die("Database does not exist");
		$userquery = mysqli_query($connect,"SELECT * FROM words ORDER BY RAND()");
		$data = array();
   		while($row = mysqli_fetch_assoc($userquery)) {
			$array[]=$row;
		}
		$connect->close();
?>


<html>
	<head>
		<title>mainmenu.html</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/frenes.css">
		<style type="text/css">
.playzone{
	background-image:url('images/BG2.jpg');
}
.loons{
	background-image: url("images/airship.png");
}
		</style>
	</head>
	<body>
		<div class='container'>
			<div class='row'>	
				<div class='col-xs-2 col-xs-offset-2 playzone'>
					<div class='loons' id='loon'></div>
					<h1 class='text-center Beginner'>  Language Barrier Typing Game </h1>
					<div class='text-center'>
						<h4 id="cdown"></h4>
					</div>	
					<!-- main menu box -->
					<div class= 'box box-maingrey text-center' id='main'>
						<br>
						<div class= ' box box-insidegrey text-center'> 
							<h2 class='text-center French'>  French   </h2>
						</div>
						<div class= ' box box-insidegrey text-center'> 
							<h2 class='text-center Spanish'>  Spanish  </h2>
						</div> 
							<div class= ' box box-insidegrey text-center'>
								<h2 class='text-center English'>  English  </h2>
							</div>
						<br>
						<button type="button" class='btn btn-warning glyphicon glyphicon-glass text-center' id='hall'> HALL OF FAME</button> 
						<br><br>
						
						<!--
							&nbsp
						<button type="button" class='btn btn-success glyphicon glyphicon-volume-up' id='sfx'></button>
						-->
					</div>
					<!-- difficulty box -->
					<div class= ' box box-maingrey text-center' id='difficulty'> 
						<h3>Choose difficulty</h3>
						<br>
						
						<div class= 'box box-insidegrey text-center' > 
							<h2 class='text-center Beginner'>  Beginner  </h2>
						</div>
						
						<div class= 'box box-insidegrey text-center' > 
								<h2 class='text-center Intermediate'>  Intermediate  </h2> 
						</div> 
						<br><br>
						<button type="button" class='btn btn-danger btn-md text-center' id='retreat'> BACK </button> 
					</div>

					<div class='text-center' id='timerdiv'>
					<h5 id="gameTime"></h5>
					</div>
				</div>
				<div class='row'>
					<button type="button" class='btn btn-success glyphicon glyphicon-volume-off sound' id='musicpause'></button>
					<button type="button" class='btn btn-success glyphicon glyphicon-music sound' id='musicplay'></button>
				</div>
				<div class='ro text-center'>
					<input type="text" id="wordIN">
				</div>
			</div>
				
		</div>

	</body>
</html>


<!--ACCUSED OF SCRIPTING!!!-->


<script src="js/jquery.min.js"></script>
<script>
var lang,diff,myAudio,diffSpeed;
var displayedWords;
var userWordInput;

$(document).ready(function(){
	//hide yo kids hide yo wife
	$("#difficulty").hide();
	$("#musicplay").hide();
	$("#loon").html("Bonjour");
	$("#loon").hide();

//	turnOnMusic();
});

//onclick 'hall of fame'
$("button#hall").on("click",function(){

	 
});
//onclick 'music'
$("button#musicpause").on("click",function(){
	 	myAudio.pause();
		$("button#musicpause").hide();
	 	$("button#musicplay").show();
});
//onclick 'music'
$("button#musicplay").on("click",function(){
	 	turnOnMusic();
	 	$("button#musicplay").hide();
	 	$("button#musicpause").show();
});
//onclick 'french'
$('h2.French').click(function(){
     toggleDiff();
     lang='french';
     changeBG();
});
//onclick 'spanish'
$('h2.Spanish').click(function(){
     toggleDiff();
     lang='spanish';
     changeBG();
});
//onclick 'english'
$('h2.English').click(function(){
     toggleDiff();
     lang='english';
     changeBG();

});
//onclick 'back'
$("button#retreat").click(function(){
     toggleDiff();
});
//onclick 'beginner'
$('h2.Beginner').click(function(){
 	thread=null;
 	$("h1").hide();
 	$("div.box-maingrey").hide();
 	diffSpeed=40;
 	diff='beginner';
	startGame();
});
//onclick 'intermediate'
$('h2.Intermediate').click(function(){
	$("h1").hide();
 	$("div.box-maingrey").hide();
 	diffSpeed=1;
 	diff='intermediate';
	startGame();
});

$("#wordIN").on("keydown",function(e){

		if(e.which == 13) {
        	userWordInput=$("#wordIN").val();
        	if(userWordInput=='hello'){
        		$("#loon").toggle("slow");
        		thread = setTimeout(function(){
        			$("#loon").remove();
        		},1000);    		
        	}
        	$("#wordIN").val("");
    	}
	});


function turnOnMusic(){
	// SOUNDS 
	myAudio = new Audio('sound/limits.mp3'); 
	myAudio.addEventListener('ended', function() {
	    this.currentTime = 0;
	    this.play();
		//// use this ->  method to stop the sound  this.pause();
	}, false);
	 	myAudio.play();

}

function changeBG(){
	$("div.playzone").css("background-image","url('images/BG"+lang+".jpg')");
}

function toggleDiff(){
     $("div#main").toggle("slow", function() {
  });
     $("div#difficulty").toggle("slow", function() {
  });
}
var thread = null;
var threadGame= null;
function moveRight(){
	if (thread!=null){return;}
	thread = setInterval(function(){
		$(".loons").css("left","+=5");
		var myLeft = parseInt($("#loon").css("left"));
		//console.log(myLeft);
		if(myLeft >= 1000){
			clearInterval(thread);
		}
	},diffSpeed);
}

function gameTimerfunc	(){

	var gtr=10
	$("#gameTime").html(gtr);
	
	//start countdown...
	var gameTimer = setInterval(function(){
		
		$("#gameTime").html(gtr);
		if(gtr <=0){
			clearInterval(gameTimer);
			alert('GAME OVER!');
		}else{
			gtr--;
			$("#gameTime").html(gtr);
		}
	},1000);

}
function check(){

}
function startGame(){
	var cd=2;
	$("h4#cdown").html(cd);
	
	//start countdown...
	var cdthread = setInterval(function(){
		
		$("h4#cdown").html(cd);
		if(cd <= 1){
			clearInterval(cdthread);
			$("#loon").html("Bonjour!");
			$("#loon").show();
			moveRight();
			$("h4#cdown").hide()
			gameTimerfunc(); 
			shipGenerator();
		}else{
			cd--;
			$("h4#cdown").html(cd);
		}
	},1000);
}
function shipGenerator(){
$( "<div class='loons' id='loon2'>Regarde</div>" ).insertAfter( "#loon" );
}


//lol ajax i dead





$(function(){


	jQuery.ajax({
                type: "POST",
                data:  $("form#a").serialize(),

                success: function(data){
                    jQuery(".res").html(data);

                    $('#test').html(data);


                }
            });
});
  
</script>