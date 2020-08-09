<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $lang["编辑"]; ?></title>
</head>
<body>

<?php
	include("config.php");
	
	$id=$_GET['id'];
	$way=$_GET['way'];
	
	echo '"/><input  name="tid" value="';
	echo $id;
	echo '"/><input  name="tway" value="';
	echo $way;
	echo '" ><button type="submit" class="btn btn-default" name="edit">'.$lang["确认编辑"].'</button>';
	
	
?>
	<a href="administrator.php"><button type="submit" class="btn btn-default"><?php echo $lang["返回"]; ?></button></a>
	</form>

	
</body>
</html>