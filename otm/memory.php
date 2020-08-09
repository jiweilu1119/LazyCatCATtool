<!DOCTYPE html>
<html lang="zh-CN">
  <head>
  	<?php
require_once("config.php");
require_once("lock.php");
 ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $lang["小译通术语管理"]; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500" rel="stylesheet" />
    <link href="css/website.css" rel="stylesheet" />
    <link href="css/image.css" rel="stylesheet" />
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
  </head>
        <section class="Layout__Sidebar">
        <img class="Logo" src="images/logo.png" alt="Pearsearch logo"/>
        <nav class="Navigation Navigation--Main">
          <li class="Navigation--Selected"><a href="userhome.php"><?php echo $lang["主页"]; ?></a></li>
          <li><a href="history.php"><?php echo $lang["翻译"]; ?></a></li>
          <li><a href="term.php"><?php echo $lang["术语管理"]; ?></a></li>
          <li><a href="memory.php"><?php echo $lang["记忆库管理"]; ?></a></li>
        </nav>
        <hr class="Navigation__Splitter"/>
        <nav class="Navigation Navigation--Secondry">
        </nav>
      </section>
      <section class="Layout__Content">


	<div>
		

    <!-- Bootstrap -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
 
<?php
	
?>
    <div class="container" >
	<div class="row clearfix" style="width: 90%">
		<div class="col-md-12 column">
		
	<div class="row clearfix">
		<div class="col-md-11 column">
			
				</div>
		<div class="col-md-1 column">
				<form method="POST" action="logout.php" role="form">
		<input type="hidden"   value="11"></input>
			 
			 </form><br/>	
			</div>
				
			
		
	</div>
		
		<div class="container " style="width: 100%">
		<div class="row clearfix">
		<p><label for="inputEmail3" class="col-sm-8 control-label"><?php echo $lang["查找记忆"]; ?></label></p>
		</div>
	<div class="row clearfix">
	
	
	<form class="form-horizontal" role="form" action="memory.php" method="POST">
		<div class="col-md-10 column">
			
				<div class="form-group" >
				
					 
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputEmail3" name="searchkey"/>
					</div></div></div>
					<div class="col-md-2 column" >
					<div class="col-sm-offset-2 col-sm-10" style="position:relative; left:-150px">
						 <button type="submit" class="btn" name="searchbut"><?php echo $lang["查询"]; ?></button>
					</div>
					</div>
				
			
		</form>
	</div>
</div>
		
		
		
<!--	old version	
		<div class="container " style="width: 80%">
	<div class="row clearfix"><form class="form-horizontal" role="form" action="memory.php" method="POST">
		<div class="col-md-10 column">
			
				<div class="form-group" >
					 <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $lang["查找记忆"]; ?></label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="inputEmail3" name="searchkey"/>
					</div></div></div>
					<div class="col-md-2 column" >
					<div class="col-sm-offset-2 col-sm-10" >
						 <button type="submit" class="btn" name="searchbut"><?php echo $lang["查询"]; ?></button>
					</div>
					</div>
				
			
		</form>
	</div>
</div>
-->

<table class="table" style="width: 89%">
				<thead>
					<tr>
						<th>
							<?php echo $lang["中文"]; ?>
						</th>
						<th>
							<?php echo $lang["英文"]; ?>
						</th>
						<th>
							<?php echo $lang["操作"]; ?>
						</th>
						
					</tr>
				</thead>
				<tbody>
<?php
if(isset($_POST['searchbut'])){
$searchkey=$_POST['searchkey'];
$searchterm_sql ="SELECT * FROM `tm` WHERE `en_us` LIKE '%$searchkey%' OR `zh_cn` LIKE '%$searchkey%'";
$searchterm_result = mysqli_query($conn,$searchterm_sql);

while ($row = mysqli_fetch_array($searchterm_result,MYSQLI_ASSOC)){

echo "<tr><td>";
echo $row['zh_cn'];
echo "</td><td>";
echo $row['en_us'];
echo "</td><td>";
echo '<div class="btn-group">
	
	<a href="delete.php?id='.$row["en_us"].'&way=memory"><button class="btn btn-default" type="button"><em class="glyphicon glyphicon-align-right"></em> '.$lang["删除"].'</button> </a>
	</div>';
echo "</td></tr>";

}}
else{
	$searchterm_sql ="SELECT * FROM `tm` ";
$searchterm_result = mysqli_query($conn,$searchterm_sql);

while ($row = mysqli_fetch_array($searchterm_result,MYSQLI_ASSOC)){

echo "<tr><td>";
echo $row['zh_cn'];
echo "</td><td>";
echo $row['en_us'];
echo "</td><td>";
echo '<div class="btn-group">
	<a href="edit.php?id=';
	echo $row["zh_cn"];
	echo '&way=terms';
	echo '">
	<a href="delete.php?id='.$row["en_us"].'&way=memory"><button class="btn btn-default" type="button"><em class="glyphicon glyphicon-align-right"></em> '.$lang["删除"].'</button> </a>
	</div>';
echo "</td></tr>";}


}
?>	
<tr>
<?php
	if(isset($_POST['memoryadd'])){
		$newch = $_POST['newch'];
		$newen = $_POST['newen'];
		$termadd_sql="INSERT INTO `tm` (`zh_cn`, `en_us`) VALUES ('{$newch}', '{$newen}')";
		$termadd_result=mysqli_query($conn,$termadd_sql);
		if($termadd_result){
			echo "<script> alert('".$lang['添加成功']."'); </script>"; 
			echo "<meta http-equiv='Refresh' content='0;URL=memory.php'>"; 
		}
	}
?>
<form method="POST" action="memory.php" role="form">
<td>
<input class="form-control" id="inputEmail3" name="newch"/>
</td>
<td>
<input  class="form-control" id="inputPassword3" name="newen"/>
</td>
<td>
<button type="submit" class="btn btn-default" name="memoryadd"><?php echo $lang["添加"]; ?></button>
</td>
</form>
</tr>


			</tbody>
			</table>

			

	
		</div>
	</div>
</div>
	</div>
	</section>

    <!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  </body>
</html>
