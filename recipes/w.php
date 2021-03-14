<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<title>Elagost</title>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<link rel="stylesheet" href="style.css" />
	<script src=js.js></script>
</head>
	<h1 class="header">writing</h1>
<div class="navul">
	<div class="navli"><a href="index.php">Home</a></div>
	<div class="navli on"><a href="w.php">Writing</a></div>
	<div class="navli"><a href="l.html">Links</a></div>
	<div class="navli"><a href="c.html">Contact</a></div>
	<div class="navli navlir" onclick="switchMode()"><a>Theme</a></div>
</div>
<body id="body" style="background-color:#79d">
	<h2 class="header" onclick="scrollToBottom()"><input value="scroll to bottom" type=button></input></h2>
	<div class="linklist">
	<?php
	
	function fileLoader($file){
		$fname=$_GET['t'];
		$file="t/".$fname;
		
    	if(is_file($file)){
    		$content = file_get_contents($file);
			$handle=fopen($file,"r");
			$pfname=substr($file,2);
			$ftime=date("Y-m-d",filemtime($file));
			$fctime=date("Y-m-d",filectime($file));
			#echo "<h3 id=$pfname>File: $pfname, $ftime</h3>";
			echo "<h3 id=wheader>File: $pfname, $ftime</h3>";
			echo "<div id=wcontent>";
			while(($line=fgets($handle))!=false){
				echo "$line<br>";
			}
			echo "</div>";
			fclose($file);
			echo "<br>";
			echo "<a href=$file>raw</a><br><hr>";
    	}
		return 0;
	}

	$filearray=glob(t.'/*.txt');
	usort($filearray,function($b,$a){
		return filemtime($a) - filemtime($b);
	});
	
	$fileToLoad=$filearray[0];
	fileLoader("$fileToLoad");
	foreach($filearray as $item){
		if(file_exists($item)){
			$pfname=substr($item,2);
			$ftime=date("Y-m-d",filemtime($item));
			#echo "<a href=&num;$pfname>$pfname</a><br>";
			echo "$ftime <a href=w.php?t=$pfname>$pfname</a><br>";
		}
	}		
	?>
	</div>
	<h2 class="header" onclick="scrollToTop()"><input value="scroll to top" type=button></input></h2>
</body>
</html>
