<html>
<body>

<?php

	//echo $_POST["title"]; 
	//echo $_POST["url"]; 
	//echo $_POST["memo"];
	
	if($_POST["title"]=="")
		die("no input!");
	
	$s=$_POST["title"];
	$addr=bin2hex($s);
	$filename=$addr . ".txt";

	$myfile = fopen($filename, "w") or die("Unable to open file!");
	fwrite($myfile, $_POST["title"]."\r\n");
	fwrite($myfile, "0"."\r\n");
	fwrite($myfile, $_POST["url"]."\r\n");
	fwrite($myfile, date("Y/m/d")."\r\n");
	fwrite($myfile, $_POST["memo"]."\r\n");
	fclose($myfile);
	
	echo "Ìí¼Ó³É¹¦£¡"

?>

</body>
</html>