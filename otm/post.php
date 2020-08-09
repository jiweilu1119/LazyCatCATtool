<?php
require_once "baidu_transapi.php";
require_once("lock.php");
$zh_CN = isset($_POST['zh_CN']) ? htmlspecialchars($_POST['zh_CN']) : '';

//print_r(translate($zh_CN,"zh","en"));
$result = translate($zh_CN,"zh","en");
echo $result["trans_result"][0]["dst"];
?>