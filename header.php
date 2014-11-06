<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <link href="css/main.css" rel="stylesheet" type="text/css"/>
   <link href="css/chairmember.css" rel="stylesheet" type="text/css"/>
   <script src="js/inputValidate.js"></script>
   <script>
function stop(audioFile)
  {
    var audie = document.getElementById("myAudio");
	var audio = document.getElementById("myAudio2");
	var audii = document.getElementById("myAudio3");
	var audiu = document.getElementById("myAudio4");
	var audik = document.getElementById("myAudio5");
    audie.pause();
	audii.pause();
	audio.pause();
	audiu.pause();
	audik.pause();	
  }
</script>
<title>UTS Travel Lodging System</title>
<?php if (isset($_SESSION['user_id'])) { ?>
<p class="spooky" id="right">You are currently logged in as Mr Noscope<br>
This is not me?<form action="index.php" method="post">
<a href="index.php"><input type="button" value="Log out" class="spookybutton" /></a></p>
</form>
<?php } ?>
<audio id="myAudio"> 
	<source src="spooky.mp3">	
</audio>
<audio id="myAudio2"> 
<source src="spooky2.mp3">
</audio>
<audio id="myAudio3"> 
	<source src="SongName.mp3">
</audio>
<audio id="myAudio4"> 
	<source src="hype.mp3">
</audio>
<audio id="myAudio5"> 
	<source src="boo.mp3">
</audio>
<button onclick="document.getElementById('myAudio').play()">Play spooky song</button>
<button onclick="document.getElementById('myAudio2').play()">Play rolls</button>
<button onclick="document.getElementById('myAudio3').play()">Play Song Name?</button>
<button onclick="document.getElementById('myAudio4').play()">Play HYPE!!</button>
<button onclick="document.getElementById('myAudio5').play()">Play the best song ever!</button>
<button onclick="stop()">Stop</button>
</head>
<body>
