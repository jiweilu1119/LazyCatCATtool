<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset="utf8" />
<title>登出</title>
</head>
<body>
<?php
include('config.php');
include("lock.php");
if(isset($login_session))
{
	$login_session='logout';
	header("Location: login.php");
}


?>
</body>