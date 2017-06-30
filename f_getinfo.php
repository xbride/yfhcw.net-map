<?php
$TITLE=0; 
$COUNT=1;
$URLSTR=2;
$VISIT=3;
$MEMO=4;

	function getinfo($filename, $index) {			
		$content = file_get_contents($filename);
		$array = explode("\r\n", $content);

		return $array[$index];
	}
	
	function getdatediff($filename, $datestr)
	{
		$content = file_get_contents($filename);
		$array = explode("\r\n", $content);
		
		//今天与2016年10月27日相差多少天
		$Date_1=$datestr;
		$Date_2=$array[3]; //$VISIT
		$d1=strtotime($Date_1);
		$d2=strtotime($Date_2);
		$Days=round(($d1-$d2)/3600/24);
		
		return $Days;
	}
?>
