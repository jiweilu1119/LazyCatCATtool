<?php
require_once('config.php');
require_once("lock.php");

$user_check=$_SESSION['login_user'];

$ses_sql=mysqli_query($conn,"SELECT * FROM user WHERE username='$user_check' ");

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session=$row['username'];

//在访问网页时，我们一般需要添加一个认证，我们可以尝试在认证功能页加入语言切换功能

//$languages = array("english","chinese");
//
//if (isset($_GET["lang"]) === true && in_array($_GET["lang"],$languages)=== true){
//	$_SESSION["lang"] = $_GET["lang"];
//}
////如果用户访问主页时没有指定默认语言，那么会默认显示中文
//elseif (isset($_GET["lang"]) === false){
//	$_SESSION["lang"] = "chinese";
//}
//
//require_once "lang/".$_SESSION["lang"].".php";

if(!isset($login_session))
{
header("Location: login.php");
}
?>