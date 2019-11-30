<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Adam Thiede's Personal Website</title>
	<style>
		html{
			background:#222222;
			color:#eeeeee;
			font-family:Serif;
			text-align:center;
		}
		a {
			color:#eeeeee;
			text-decoration:none;
		}
		.bar {
			font-family:Sans-Serif;
			font-weight:bold;
			display:inline-block;
			padding:5px;
			border-radius:5px;
			background:#414141;
			text-align:center;
			border-style:solid;
			border-width:thin;
			border-color:lightgray;
		}
		.tagline{
			text-align:left;
			max-width:1024px;
			margin:0 auto;
		}
		.blogdiv{
			text-align:left;
			max-width:1024px;
			margin:0 auto;
		}
		.blogdiv a {
			color:#ee00ee;
			text-decoration:underline;
		}
	</style>

	<body>
		<H1><a href="https://adamthiede.com"> Adam Thiede </a></H1>
		<div class="bar"><a href="mailto:me@adamthiede.com">Email</a></div>
		<div class="bar"><a href="./resume.html">Resume</a></div>
		<div class="bar"><a target="_blank" href="https://www.linkedin.com/in/adamthiede">LinkedIn</a></div>
		<div class="bar"><a href="./faq.html">About Me</a></div>
		<br/><br/>
<div class="blogdiv">
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
			echo "$ftime <a href=blog.php?t=$pfname>$pfname</a><br>";
		}
	}		
	?>
</div>
<hr/>	
	</body>
</html>
