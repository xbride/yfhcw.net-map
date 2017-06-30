<html>
<body>

<?php date_default_timezone_set('PRC');

if($_GET["name"]=="")
	die("no input!");


$s=$_GET["name"]; echo $s; 



$addr=bin2hex($s);
//echo  $addr; 

$filename=$addr . ".txt";
//echo  $filename;

/*
$myfile = fopen($filename, "r") or die("Unable to open file!");
// 输出单行直到 end-of-file
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
fclose($myfile);
*/

$TITLE=0; 
$COUNT=1;
$URLSTR=2;
$VISIT=3;
$MEMO=4;


//check file exist
if (is_readable($filename) == false) { 
	echo "创建..";
	echo "<script language='javascript' type='text/javascript'>";
	echo "window.location.href='";
	echo "add.php?title=";
	echo $s;
	echo "";
	echo "';";
	echo "</script>";
	//die('文件不存在或者无法读取'); 
} else {
	
	//xxx $myfile = fopen($filename, "a") or die("Unable to open file!");
	
	
	$content = file_get_contents($filename);
	//echo $content;
	$array = explode("\r\n", $content);
	//print_r($array);
	
	/*
	for($i=0; $i<count($array); $i++)
	{
		echo $array[$i];
	}
	*/
	
	
	if($array[$TITLE]=="")
		$array[$TITLE]=$s;
	if($array[$COUNT]=="")
		$array[$COUNT]="0";
	if($array[$URLSTR]=="")
		$array[$URLSTR]="http://yfhcw.net";
	if($array[$MEMO]=="")
		$array[$MEMO]="备注";
	
	
	
	
	
	//logdate $array[$VISIT]
	if($array[$VISIT]=="")
		$array[$VISIT]=date("Y/m/d");
	else{
		$array[$VISIT]=date('Y/m/d',strtotime("$array[$VISIT] +1 day"));
		
	}
	//echo $array[$VISIT];
	
	
	//add count
	if(is_numeric($array[$COUNT]))
		$array[$COUNT]++;
	//echo $array[$COUNT];
	
	//clear file content
	
	//write back content
	
	
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	for($i=0; $i<count($array); $i++)
	{
		fwrite($myfile, $array[$i]."\r\n");
	}
	fclose($myfile);
	
	
	//goto url $array[$URLSTR] 
	$url = $array[$URLSTR]; 
	//echo $url;
	echo "<script language='javascript' type='text/javascript'>";
	echo "window.location.href='$url'";
	echo "</script>";
	
	
	
	
	/*
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	$txt = "Bill Gates\n";
	fwrite($myfile, $txt);
	$txt = "Steve Jobs\n";
	fwrite($myfile, $txt);
	fclose($myfile);
	*/

}

?>




</body>
</html>