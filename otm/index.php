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
require_once("lock.php");
require_once("config.php");
require_once "baidu_transapi.php";
if(!isset($login_session))
{
header("Location: login.php");
}


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
  <h5><a href="userhome.php">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $lang["用户中心"]; ?></a></h5>
 <?php 	
 @$id = $_GET["id"];


 ?>

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
	echo $row["zh_cn"];
	echo '</td><td>';
	echo $row["en_us"];
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
			<div style="height:230px;overflow-y:auto;" id="tbtable">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th style="width:8%;">
							<?php echo $lang["序号"]; ?>
						</th>
						<th style="width:20%;">
							<?php echo $lang["中文"]; ?>
						</th>
						<th style="width:20%;">
							<?php echo $lang["英文"]; ?>
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
	echo $row["zh_cn"];
	echo '</td><td>';
	echo $row["en_us"];
	echo '</td></tr>';

}
?>					
				</tbody>
			</table></div>
		</div>
	</div>

<section>	
<div class="tabbable" id="tabs-500487" style="width:100%;position:relative;float:left;margin-top:20px;">
				<ul class="nav nav-tabs">
					<li class="active">
						 <a href="#panel-937470" data-toggle="tab"><?php echo $lang["翻译区"]; ?></a>
					</li>
					<li>
						 <a href="#panel-228057" data-toggle="tab" id='translate'><?php echo $lang["预翻译"]; ?></a>
					</li>
					<!--
					<li>
						 <a href="#panel-555555" data-toggle="tab"><?php echo $lang["导入/导出"]; ?></a>
					</li> -->
				</ul>
				
				<div class="tab-content">
					<div class="tab-pane active" id="panel-937470">
			<div style="height:400px;overflow-y:auto;">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th style="width:4%;">
							<?php echo $lang["序号"]; ?>
						</th>
						<th style="width:44%;">
							<?php echo $lang["原文"]; ?>
						</th>
						<th style="width:44%;">
							<?php echo $lang["译文"]; ?>
						</th>
						<th style="width:8%;">
							<?php echo $lang["操作"]; ?>
						</th>
					</tr>
				</thead>
				<tbody>
				
<?php

function cut_str($str,$sign,$number){
	$array=explode($sign, $str);
	$length=count($array);
	if($number<0){
		$new_array=array_reverse($array);
		$abs_number=abs($number);
		if($abs_number>$length){
			return 'error';
		}else{
			return $new_array[$abs_number-1];
		}
	}else{
		if($number>=$length){
			return 'error';
		}else{
			return $array[$number];
		}
	}
}

	
$tm_sql ="SELECT * FROM `source` WHERE `id` LIKE '%$id%'";
$tm_result = mysqli_query($conn,$tm_sql);
$num=1;
$lastcolor=rand(1,5);
$source_id=0;
while ($row = mysqli_fetch_array($tm_result,MYSQLI_ASSOC)){
/*	$nowcolor=rand(1,5);
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
	echo '<tr class="'.$colorclass.'"><td>';*/
//先分割再输出	
	$j=0;
	$source=$row["source"];
//	$source_cut=cut_str($source,'。',$j);
	$source_id=$row["id"];
	while(($source_cut=cut_str($source,'。',$j)) != 'error'&&$source_cut != null){
//	$source_cut=cut_str($source,'。',$j);
	echo '<tr><td class="num">';
	echo $num;
	$num = $num + 1;
	echo '</td><td name="source">';
	//分句 
	echo $source_cut;
	echo '。';
	echo '</td><td name="target"><div>';
	//分句 
	$target=$row["target"];
	if(	$target!= 'null'){
		$target_cut=cut_str($target,'^',$j);
		if($target_cut != 'error'&&$target_cut != 'null'){
			echo $target_cut;
		}
	}
//	echo $target;
	$result = translate($source_cut,"zh","en");
	$source_cut_trans=$result["trans_result"][0]["dst"];
	echo "</div><textarea style='width:98%;display:none;word-break:break-all;resize:none;'>";
	echo $lang["机翻结果为："].$source_cut_trans;
	echo '</textarea>';
	echo '</td><td>';
	echo '<div class="btn-group">
	<a href="######?id='.$row["id"].'"><button class="btn btn-default" type="button" id="'.$source_cut.'" onclick="edit_confirm(this);loadXMLDocTM(this);loadXMLDocTB(this);" name="edit"><em class="glyphicon glyphicon-align-left"></em>'.$lang["编辑"].'</button></a>
	<a href="######?id='.$row["id"].'"><button class="btn btn-default" type="button" onclick="onetranslate(this)"><em class="glyphicon glyphicon-align-left"></em>'.$lang["一键翻译"] .'</button> </a>
	</div>';
	echo '</td></tr>';
	$j = $j+1;
	}
}

?>
<tr>
<td colspan="4" style="text-align:center">
<button class="btn btn-default" type="button" onclick="savedata(this)" style="position:relative;right:2%" id="<?php echo $num-1; ?>" name="<?php 
echo $source_id; ?>"><em class="glyphicon glyphicon-align-center"></em>&nbsp;&nbsp;<?php echo $lang["保存"]; ?>&nbsp;&nbsp;</button>	
</td>
</tr>
				</tbody>
			</table></div>

	
</div>
					
					
					
				<div class="tab-pane" id="panel-228057">
							<div style="height:400px;overflow-y:auto;">
						<table class="table table-bordered">
				<thead>
					<tr>
						<th style="width:50%;">
							<?php echo $lang["原文"]; ?>
						</th>
						<th style="width:50%;">
							<?php echo $lang["翻译"]; ?>
						</th>
					</tr>
				</thead>
				<tbody>
<?php
$info_sql ="SELECT * FROM `source` WHERE `id`='{$id}'";;
$info_result = mysqli_query($conn,$info_sql);

while ($row = mysqli_fetch_array($info_result,MYSQLI_ASSOC)){
echo "<tr><td>";
echo $row['source'];
echo "</td><td>";
$result = translate($row['source'],"zh","en");
echo $result["trans_result"][0]["dst"];
//echo "此处是机器翻译";
echo "</td></tr>";
}
?>	
			</tbody>
			</table></div>				
					</div>
					
	<!--			
					<div class="tab-pane" id="panel-555555">
			
			<form role="form" action="upload.php" method="POST" enctype="multipart/form-data" style="width:20%;position:relative;float:left;">
				<div class="form-group">
					 <label for="exampleInputFile">上传文件</label><input type="file" id="exampleInputFile" name="file" />
					<p class="help-block">
						支持.txt格式文件
					</p>
				</div>
				<button type="submit" class="btn btn-default" name="submit"><?php echo $lang["上传"]; ?></button>
			</form>
			
			<form role="form" action="#####" method="POST" enctype="multipart/form-data" style="width:20%;position:relative;float:left;">
				<div class="form-group">
					 <label for="exampleInputFile">导出文件</label>
					<p class="help-block">
						支持.txt格式文件
					</p>
				</div>
				<button type="submit" class="btn btn-default" name="submit">导出</button>
			</form>
					</div>
			-->		
							
				</div>
			</div>
				
	
	
	
	
	
	

</div>
  </section>
  
  
  

      <!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
	
	<script type="text/javascript">
	//编辑按钮转换
	function edit_confirm(element) {
		var target_text=element.parentNode.parentNode.parentNode.parentNode.childNodes[2].childNodes[0].innerHTML
		
        if(element.innerHTML == '<em class="glyphicon glyphicon-align-left"></em>编辑'){
			element.innerHTML = '<em class="glyphicon glyphicon-align-right"></em>确认'
			element.name="save"
			element.parentNode.parentNode.parentNode.parentNode.childNodes[2].childNodes[0].innerHTML='<textarea type="text" style="width:98%;word-break:break-all;resize:none;">'+target_text+'</textarea>'
		}
		else if(element.innerHTML == '<em class="glyphicon glyphicon-align-left"></em>Edit'){
			element.innerHTML = '<em class="glyphicon glyphicon-align-right"></em>Confirm'
			element.name="save"
			element.parentNode.parentNode.parentNode.parentNode.childNodes[2].childNodes[0].innerHTML='<textarea type="text" style="width:98%;word-break:break-all;resize:none;">'+target_text+'</textarea>'
		}
		else if(element.innerHTML == '<em class="glyphicon glyphicon-align-right"></em>Confirm'){
			element.innerHTML = '<em class="glyphicon glyphicon-align-left"></em>Edit'
			target_text=element.parentNode.parentNode.parentNode.parentNode.childNodes[2].childNodes[0].childNodes[0].value
			element.name="edit"
			element.parentNode.parentNode.parentNode.parentNode.childNodes[2].childNodes[0].innerHTML=target_text
		}
		else{
			element.innerHTML = '<em class="glyphicon glyphicon-align-left"></em>编辑'
			target_text=element.parentNode.parentNode.parentNode.parentNode.childNodes[2].childNodes[0].childNodes[0].value
			element.name="edit"
			element.parentNode.parentNode.parentNode.parentNode.childNodes[2].childNodes[0].innerHTML=target_text
		}

				};
	//一键翻译转换
	function onetranslate(element) {
		if(element.parentNode.parentNode.parentNode.parentNode.childNodes[2].childNodes[1].style.display=="none"){
			element.parentNode.parentNode.parentNode.parentNode.childNodes[2].childNodes[1].style.display="block"
			
			if(element.innerHTML == '<em class="glyphicon glyphicon-align-left"></em>一键翻译'){
				
				element.innerHTML='<em class="glyphicon glyphicon-align-right"></em>隐藏翻译'
			}
			else{
				element.innerHTML='<em class="glyphicon glyphicon-align-right"></em>Hide MT'
			}
		}
		else{
			if(element.innerHTML == '<em class="glyphicon glyphicon-align-right"></em>隐藏翻译'){
				element.innerHTML='<em class="glyphicon glyphicon-align-left"></em>一键翻译'
			}
			else{
				element.innerHTML='<em class="glyphicon glyphicon-align-left"></em>Show MT'
			}
			element.parentNode.parentNode.parentNode.parentNode.childNodes[2].childNodes[1].style.display="none"
		}
				};
				
	//textarea自动调整行高			
	$(document).ready(function () {
        $("textarea").each(function (i, e) {
            var td = e.parentNode;
            var heght = $(td).height();
            $(e).height(heght);
        });
    });
	
	//ajax刷新tm
	function loadXMLDocTM(element)
{
	var txt=element.id;
    var xmlhttp;
    if (window.XMLHttpRequest)
    {
        //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码s
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("tmtable").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","memorymatch.php?txt="+txt,true);
    xmlhttp.send();
};

	//ajax刷新tb
	function loadXMLDocTB(element)
{
	var txt=element.id;
    var xmlhttp;
    if (window.XMLHttpRequest)
    {
        //  IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        // IE6, IE5 浏览器执行代码s
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("tbtable").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","termmatch.php?txt="+txt,true);
    xmlhttp.send();
};

	//AJAX保存数据到记忆库
	function savedata(element)
{	
	if(document.getElementsByName("save").length){
		alert("保存失败。存在未确认译文，请确认后重试")
	}
	else{
	var line=parseInt(element.id)
	var source_id=element.name
	var i=0
	var targettext=""
	while(i<line){
		var targetarray=document.getElementsByName("target")[i].childNodes[0].innerHTML
		i=i+1
		targettext=targettext+targetarray+"^"
	}

	$.ajax({
            type : 'GET', //提交方式
            url : "savedata.php", //路径
            //参数
            data :{
				id:source_id,
				target:targettext
			},
            cache : false,
            //返回普通的字符流不要写 dataType : "json" 
            success : function() {
                alert("保存成功");
            }
        })
	}
	
};	



	</script>
  </body>
</html>