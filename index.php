<html>
	<head>
		<title>FRENCH - ENGLISH - SPANISH TYPING GAME</title>
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
				<div class='col-xs-2 col-xs-offset-2 playzone' id='maindiv'>
					<div class='lane row' id='lane1'></div>
					<div class='lane row' id='lane2'></div>
					<div class='lane row' id='lane3'></div>
					<div class='lane row' id='lane4'></div>
					<h1 class='text-center Beginner'>  Language Barrier Typing Game </h1>
					<div class='text-center'>
						<h4 id="cdown"></h4>
					</div>	
					<!-- main menu box -->
					<div class= 'box box-maingrey text-center' id='main'>
						<br>
						<div class= ' box box-insidegrey text-center French'> 
							<h2 class='text-center French'>  French   </h2>
						</div>
						<div class= ' box box-insidegrey text-center Spanish'> 
							<h2 class='text-center Spanish'>  Spanish  </h2>
						</div> 
							<div class= ' box box-insidegrey text-center English'>
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
						
						<div class= 'box box-insidegrey text-center Beginner' > 
							<h2 class='text-center Beginner'>  Beginner  </h2>
						</div>
						
						<div class= 'box box-insidegrey text-center Intermediate' > 
								<h2 class='text-center Intermediate'>  Intermediate  </h2> 
						</div> 
						<br><br>
						
					</div>

					<div class='text-center' id='timerdiv'>
						<h5 id="scoreH"></h5>
						<h5 id="gameTime"></h5>
					</div>
				</div>
				<div class='col-xs-2 col-xs-offset-2 playzone' id="tablediv">
					<table class='table text-center	table-striped' style='margin-bottom: -15px;border:0px solid black'>
						<tr>
							<td class='tablelink' id='overHOF'>OVERALL</td>
							<td class='tablelink' id='frenHOF'>FRENCH</td>
							<td class='tablelink' id='espHOF'>SPANISH</td>
							<td class='tablelink' id='engHOF'>ENGLISH</td>
						</tr>
					</table>
					<h1 class='text-center' id='tabletitle'><span class='glyphicon glyphicon glyphicon-globe'> Top 10 Leaderboard</span></h1>
					<table class='table text-center	table-striped' id="hoftable">
						
							<tr>
								<th> <span class='glyphicon glyphicon glyphicon-star'> Rank</th> </span>
								<th> <span class='glyphicon glyphicon-user'> Name </th> </span>
								<th> <span class=' glyphicon glyphicon-glass'> SCORE </th></span>
								<th> <span class='glyphicon glyphicon-bookmark'> Language </span></th> 
							</tr>
					</table>					
				</div>
				<div class='row'>

					<button type="button" class='btn btn-success glyphicon glyphicon-volume-off sound' id='musicpause'></button>
					<button type="button" class='btn btn-success glyphicon glyphicon-music sound' id='musicplay'></button>
					<button type="button" class='btn btn-danger btn-md text-center' id='retreat'> BACK </button> 
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
var lang,diff,myAudio,diffSpeed,userWordInput,i,score=0,wid2;
var usedWords = [];
var thread = null;
var gtr =null;
var alldata=[];
var halloffamedata = [];
var currentShips= [];
$(document).ready(function(){
	//hide yo kids hide yo wife
	runAjax();
	$("#retreat").hide();
	$("#difficulty").hide();
	$("#musicplay").hide();
	$("#wordIN").hide();
	$("#tablediv").hide();
	setTimeout(function() {
	
	}, 300);
	turnOnMusic("default");
});

//onclick 'hall of fame'
$("button#hall").on("click",function(){
	$("#maindiv").hide();
	$("#tablediv").show();
	$("#retreat").show();
});
//onclick 'music'
$("button#musicpause").on("click",function(){
	myAudio.pause();
	$("button#musicpause").hide();
	$("button#musicplay").show();
	$("#retreat").show();
});
//onclick 'music'
$("button#musicplay").on("click",function(){
	 turnOnMusic();
	 $("button#musicplay").hide();
	 $("button#musicpause").show();
	 $("#retreat").show();
});
//onclick 'french'
$('div.French').click(function(){
	toggleDiff();
	lang='french';
	myAudio.pause();
	turnOnMusic(lang);
	changeBG();
	$("#retreat").show();
});
//onclick 'spanish'
$('div.Spanish').click(function(){
    toggleDiff();
    lang='spanish';
    myAudio.pause();
	turnOnMusic(lang);
    changeBG();
    $("#retreat").show();
});
//onclick 'english'
$('div.English').click(function(){
    toggleDiff();
    lang='english';
    myAudio.pause();
	turnOnMusic(lang);
    changeBG();
    $("#retreat").show();

});
//onclick 'back'
$("button#retreat").click(function(){
    toggleDiff();
    $("#maindiv").show();
	$("#tablediv").hide();
});
//onclick 'beginner'
$('div.Beginner').click(function(){
 	thread=null;
 	$("h1").hide();
 	$("div.box-maingrey").hide();
 	diffSpeed=100;
 	diff='beginner';
	startGame();
});
//onclick 'intermediate'
$('div.Intermediate').click(function(){
	$("h1").hide();
 	$("div.box-maingrey").hide();
 	diffSpeed=19;
 	diff='intermediate';
	startGame();
});
// SOUNDS 
function turnOnMusic(lang){
	
	myAudio = new Audio('sound/'+lang+'.mp3'); 
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


function gameTimerfunc(){

	gtr=60;
	$("#gameTime").html(gtr);
//start countdown...
	var gameTimer = setInterval(function(){
		
		$("#gameTime").html(gtr);
		if(gtr <=0){
			clearInterval(gameTimer);
			$('.loons').remove();
			alert('Game over! Your Score is: '+score);
			var pname = prompt("Enter name for hall of fame :", "");
			addajax(pname);
			usedWords=null;
			$("#wordIN").hide();
			location.reload();
		}else{
			gtr--;
			$("#gameTime").html(gtr);
		}
	},1000);
}


//GAMEU STARTOO!!!
var stopme;
var shipNo=0;
function startGame(){
	var cd=5;
	$("h4#cdown").html(cd);
	$("#wordIN").show();
	$("#wordIN").focus();
	var cdthread = setInterval(function(){
		$("h4#cdown").html(cd);
		if(cd <= 1){
			clearInterval(cdthread);

			stopme = shipGenerator(lang);
			shipNo++;
			usedWords.push(stopme);
			var threadShipSail = null;
			var randTime = Math.floor((Math.random()*1200)+1000)
			$("#scoreH").html(score);
			threadShipSail = setInterval(function(){
			if(gtr <=0){
				clearInterval(threadShipSail);
			}else{
				stopme = shipGenerator(lang);
				shipNo++;
				usedWords.push(stopme);
				// stopperthread = setTimeout(function(){
				// 	$("#loon"+stopme).remove();
				// 	//console.log(stopme);
				// },5000);
			}
			},randTime);
			
			$("h4#cdown").hide()
			gameTimerfunc();
		}else{
			cd--;
			$("h4#cdown").html(cd);
		}
	},1000);
}
function shipGenerator(lang){

	var randIndex = Math.floor((Math.random()*4)+1);
	var randWord = Math.floor((Math.random()*(alldata.length-1))+1);
	var rzi = Math.floor((Math.random()*200)+1);
	wid = "loon"+alldata[randWord].word_ID;
	wid2 = alldata[randWord].word_ID;
	if (lang=='french') {
		$("#lane"+randIndex).prepend('<div class="loons col-xs-1" id="'+wid+'" style="z-index:'+rzi+';">'+alldata[randWord].french+'</div>');
	}
	if (lang=='spanish') {
		$("#lane"+randIndex).prepend("<div class='loons col-xs-1' id='"+wid+"' style='z-index:"+rzi+";'>"+alldata[randWord].spanish+"</div>");
	}
		if (lang=='english') {
	$("#lane"+randIndex).prepend("<div class='loons col-xs-1' id='"+wid+"' style='z-index:"+rzi+";'>"+alldata[randWord].english+"</div>");
	}
	moveRight(wid2);
	return wid2;
}

function moveRight(lid){
	thread=null;
	if (thread!=null){return;}
	thread = setInterval(function(){
		$("#loon"+lid).css("left","+=5");
		var myLeft = parseInt($("#loon"+lid).css("left"));
		if(myLeft >= 1000){
			clearInterval(thread);
			$("#loon"+lid).remove();
		}
	},diffSpeed);
}

//right stopper aura
// function rightStopper(){
// 	var indexes = alldata.length;
// 	for(var j=0;j<indexes;j++){

// 	}
// }

//ON PRESS ENTER
$("#wordIN").on("keydown",function(e){
		var b;
		if(e.which == 13) {
        	userWordInput=$("#wordIN").val();
        	var x;
        	if(lang=='french'||lang=='spanish'){
	        	for(x=0;x<=alldata.length-1;x++){
	        		if(alldata[x]['english']==userWordInput){
        				for(b=0;b<usedWords.length;b++){
        					if(usedWords[b]==alldata[x]['word_ID']){
			        			score+=10;
		        				$('#scoreH').html(score);
		        				 $("#loon"+usedWords[b]).toggle("slow");
		        				 console.log("toggle worked");
			        			thread = setTimeout(function(){
			        				console.log("remove worked");
			        				$("#loon"+usedWords[b]).remove();
			        				usedWords[b]=null;
			        			},1000);
		        			}
	        			}
	        		}
	        	}
        	}
        	var y;
        	if(lang=='english'){
	        	for(y=0;y<=usedWords.length-1;y++){
	        		if(alldata[y]['french']==userWordInput||alldata[y]['spanish']==userWordInput){
	        			console.log("fres+ok");
        				for(b=0;b<usedWords.length;b++){
        					console.log("forloop");
        					if(usedWords[b]==alldata[y]['word_ID']){
			        			score+=10;
		        				$('#scoreH').html(score);
		        				 $("#loon"+usedWords[b]).toggle("slow");
		        				 console.log("toggle worked");
			        			thread = setTimeout(function(){
			        				console.log("remove worked");
			        				$("#loon"+usedWords[b]).remove();
			        				usedWords[b]=null;
			        			},1000);
		        			}
	        			}
	        		}
	        	}
        	}
        	$("#wordIN").val("");
    	}
	});

//lol ajax i die
function runAjax(){
	$.ajax({
		url:"getData.php", 
		method:"GET",
		success: function(retval){
			alldata = JSON.parse(retval);
			//console.log(alldata);
		}
 	});
 
}
function addajax(pname){
	$.ajax(
	{
		url:"posthof.php", 
		method:"POST",
		data: {player_name:pname,player_score:score,language:lang},
		success: function(hofval){
			alert('Back to main');
		}
 	});
}

function hofajax(lengua){
	$.ajax(
	{
		url:"halloffame.php", 
		method:"POST",
		data:{lengua},
		success: function(hofval){
			halloffamedata = JSON.parse(hofval);

		}
 	});
}
$("#overHOF").on("click",function(){
	hofajax("all");
	$("#hoftable tr").remove();
	jsontotable("#hoftable");
});
$("#frenHOF").on("click",function(){
	hofajax("french");
	$("#hoftable tr").remove();
	jsontotable("#hoftable");
});
$("#espHOF").on("click",function(){
	hofajax("spanish");
	$("#hoftable tr").remove();
	jsontotable("#hoftable");
});
$("#engHOF").on("click",function(){
	hofajax("english");
	$("#hoftable tr").remove();
	jsontotable("#hoftable");
});
var hlen;

function jsontotable(selector){
	var rank=1;
	hlen = halloffamedata.length;
	for(var gg=0;gg<hlen;gg++){
		$("#hoftable").append("<tr><td>"+rank+"</td>"+"<td>"+halloffamedata[gg].player_name+"</td>"+"<td>"+halloffamedata[gg].player_score+"</td>"+"<td>"+halloffamedata[gg].language+"</td></tr>");
		rank++;
	}
}
</script>




























































































































































































































































<!-- TO GOD BE THE GLORY! -->