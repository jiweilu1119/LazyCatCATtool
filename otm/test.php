<!doctype html>
<html lang="en">
  <head>
    <!-- require_onced meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<?php
require_once("config.php");
require_once("lock.php");
require_once "baidu_transapi.php";
//$dbhost = 'localhost';  //mysql服务器主机地址
//$dbuser = 'root';      //mysql用户名
//$dbpass = '';//mysql用户名密码
//$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
//	
//	if(! $conn )
//		{
//			die('Could not connect: ' . mysqli_error());
//		}
//
//	mysqli_select_db($conn,"otm");
//	mysqli_query($conn, "set names 'utf8'");
 

?>


    <title><?php echo $lang["小译通"]; ?></title>
	
<style type="text/css">
th{
	text-align:center;
	valign:center;
}
.num{
	text-align:center;
}
td{
	vertical-align:middle !important; 
}

</style>
	
  </head>
  <body>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span6" style="width:48%;position:relative;float:left;">
			<h3 class="text-left">
				<?php echo $lang["翻译记忆库"]; ?>
			</h3>
			<div style="height:230px;overflow-y:auto;" id="tmtable">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th style="width:8%;">
							<?php echo $lang["序号"]; ?>
						</th>
						<th style="width:20%;">
							<?php echo $lang["原文"]; ?>
						</th>
						<th style="width:20%;">
							<?php echo $lang["译文"]; ?>
						</th>
					</tr>
				</thead>
				<tbody>
<?php			
$tm_sql ="SELECT * FROM `tm`";
$tm_result = mysqli_query($conn,$tm_sql);
$num=1;
$lastcolor=rand(1,5);
while ($row = mysqli_fetch_array($tm_result,MYSQLI_ASSOC)){
	$nowcolor=rand(1,5);
	while($nowcolor == $lastcolor){
	$nowcolor=rand(1,5);
	}
	$lastcolor=$nowcolor;
	if($lastcolor==1){
		$colorclass="success";
	}
	elseif($lastcolor==2){
		$colorclass="warning";
	}
	elseif($lastcolor==3){
		$colorclass="info";
	}
	elseif($lastcolor==4){
		$colorclass="danger";
	}
	elseif($lastcolor==5){
		$colorclass="active";
	}
	echo '<tr class="'.$colorclass.'"><td class="num">';
	echo $num;
	$num = $num + 1;
	echo '</td><td>';
	echo $row["en_us"];
	echo '</td><td>';
	echo $row["zh_cn"];
	echo '</td></tr>';
}
?>


					


				</tbody>
			</table></div>
		</div>
		<div class="span6" style="width:48%;position:relative;float:right;">
			<h3>
				<?php echo $lang["术语库"]; ?>
			</h3>
			<div style="height:230px;overflow-y:auto;">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th style="width:8%;">
							<?php echo $lang["序号"]; ?>
						</th>
						<th style="width:20%;">
							<?php echo $lang["原文"]; ?>
						</th>
						<th style="width:20%;">
							<?php echo $lang["译文"]; ?>
						</th>
					</tr>
				</thead>
				<tbody>
				
<?php			
$tm_sql ="SELECT * FROM `tb`";
$tm_result = mysqli_query($conn,$tm_sql);
$num=1;
$lastcolor=rand(1,5);
while ($row = mysqli_fetch_array($tm_result,MYSQLI_ASSOC)){
	$nowcolor=rand(1,5);
	while($nowcolor == $lastcolor){
	$nowcolor=rand(1,5);
	}
	$lastcolor=$nowcolor;
	if($lastcolor==1){
		$colorclass="success";
	}
	elseif($lastcolor==2){
		$colorclass="warning";
	}
	elseif($lastcolor==3){
		$colorclass="info";
	}
	elseif($lastcolor==4){
		$colorclass="danger";
	}
	elseif($lastcolor==5){
		$colorclass="active";
	}
	echo '<tr class="'.$colorclass.'"><td>';
	echo $num;
	$num = $num + 1;
	echo '</td><td>';
	echo $row["en_us"];
	echo '</td><td>';
	echo $row["zh_cn"];
	echo '</td></tr>';
}
?>					
				</tbody>
			</table></div>
		</div>
	</div>
</div>


<div>

<input type="button" value="<?php echo $lang["刷新"]; ?>" onclick="loadXMLDoc()"/>

</div>

  
  
  

      <!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
	
	<script type="text/javascript">
	function loadXMLDoc()
{
    var xmlhttp;
    if (window.XMLHttpRequest)
    {
        //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("tmtable").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","testtm.php",true);
    xmlhttp.send();
}
	</script>
  </body>
</html>