<html>
<head>
		<!--begin of autoreload 1of2 -->
		<script src="ifvisible.js"></script>
 		<script type="text/javascript">
            function d(el){
                return document.getElementById(el);
            }
            ifvisible.setIdleDuration(60);
            ifvisible.idle(function(){  
                document.body.style.opacity = 0.5;
            });
            ifvisible.wakeup(function(){
                document.body.style.opacity = 1;
				window.location.reload(); 
            });
            setInterval(function(){
                var info = ifvisible.getIdleInfo();
                // Give 3% margin to stabilaze user output
                if(info.timeLeftPer < 3){
                    info.timeLeftPer = 0;
                    info.timeLeft = ifvisible.getIdleDuration();
                }
                d("seconds").innerHTML = parseInt(info.timeLeft / 1000), 10;
            }, 100);
        </script>
		<!--end of autoreload 1of2 -->


</head>

<body>

<script language="JavaScript">
function cheak(){
	var i=headerForm.site.value;
	window.location='site.php?name='+i;
}
</script>

<script language="JavaScript">
function gotosite(name){
	window.location='site.php?name='+name;
}
</script>


<form name="headerForm" action="site.php" method="post">
	<div >
		<input name="site" type="text" value="输入要访问(qiandao)的地址" size="50" />
		<a onClick="cheak()" href="#">提交</a>
	</div>
</form>

<?php 
			include 'f_getinfo.php';
			
?>


<?php  			date_default_timezone_set('PRC');
				
				
				
				$content = file_get_contents("txt.reg");
				$array = explode("\r\n", $content);
				
				$dir = $_SERVER['DOCUMENT_ROOT']."/map";  
				chdir ($dir);  
				$pages = glob("*.{txt}", GLOB_BRACE);  
				
				echo date("Y/m/d") . "<br>";
				$arrlength=count($pages);
				for($x=0;$x<$arrlength;$x++) {
					$fn=basename($pages[$x], ".txt");
					$fname=pack('N',hexdec($fn));
					if(in_array($fname,$array)){
						//echo $fname . "<br>";
						/*
						echo '<a href="site.php?name='; 
						echo $fname;
						echo '">';
						echo $fname;
						echo '<a><br>';
						*/
						$dist = getdatediff($pages[$x],date("Y/m/d"));
						if($dist<0)
							continue;
							
						for($i=0; $i<$dist; $i++){
							echo '- ';
						}
						
						echo getinfo($pages[$x],$VISIT);						
						echo ' <a onClick=\'gotosite("';
						echo $fname;
						echo '")\' href="#">';
						echo $fname;
						echo '</a> ';
						
						echo '<a href="'; 
						echo $pages[$x];
						echo '">';
						echo getinfo($pages[$x],$MEMO);
						echo '<a> ';
						
						echo '<br> ';			
					}
				}
				
				

?> 
			
		<!--begin of autoreload 2of2 -->
		<span id="idleTime" class="label label-warning">00 seconds</span>
		<span class="label label-warning" id="seconds">00</span>。
                      
              
		<script type="text/javascript">
		var dur = (ifvisible.getIdleDuration() / 1000);
		d('idleTime').innerHTML = dur + " seconds";
		</script> 
		<!--begin of autoreload 2of2 -->
				

</body>
</html>