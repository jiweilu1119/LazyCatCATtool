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
	  $id = $_GET["id"];
$way = $_GET["way"];
	
	//术语
	
	if($way=="terms"){
		$sql="DELETE FROM `tb` WHERE `zh_cn`='{$id}'";
		$delete = mysqli_query( $conn, $sql );
		if(! $delete )
	{
		echo "<script> alert('".$lang['删除失败，请重试！']."'); </script>"; 
		echo "<meta http-equiv='Refresh' content='0;URL=term.php'>"; 
	}
	else
	{
		echo "<script> alert('".$lang['删除成功！']."'); </script>"; 
		echo "<meta http-equiv='Refresh' content='0;URL=term.php'>"; 
	}
	}
	elseif ($way=='passage') {
		$sql="DELETE FROM `source` WHERE `source`='{$id}'";
		$delete = mysqli_query( $conn, $sql );
		if(! $delete )
	{
		echo "<script> alert('".$lang['删除失败，请重试！']."'); </script>"; 
		echo "<meta http-equiv='Refresh' content='0;URL=history.php'>"; 
	}
	else
	{
		echo "<script> alert('".$lang['删除成功！']."'); </script>"; 
		echo "<meta http-equiv='Refresh' content='0;URL=history.php'>"; 
	}
	}
	
	//句对
	else {
		$sql="DELETE FROM `tm` WHERE `en_us` like '{$id}'";
		$delete = mysqli_query( $conn, $sql );
		if(! $delete )
	{
		echo "<script> alert('".$lang['删除失败，请重试！']."'); </script>"; 
		echo "<meta http-equiv='Refresh' content='0;URL=memory.php'>"; 
	}
	else
	{
		echo "<script> alert('".$lang['删除成功！']."'); </script>"; 
		echo "<meta http-equiv='Refresh' content='0;URL=memory.php'>"; 
	}
	}



?>
	
</body>
</html>