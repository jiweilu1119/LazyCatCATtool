<?php
require_once("config.php");
require_once("lock.php");
$id = $_GET["id"];
header('Content-type: text/html; charset=utf-8');
header("Content-Type: application/force-download");
header("Content-Disposition: attachment;filename=翻译文档.txt");

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
$sql = "SELECT * FROM source WHERE `source` LIKE '%$id%'";
$result = mysqli_query($conn,$sql);
//echo "ID号\t中文\t英文\t\n";
while ($row = mysqli_fetch_array($result)){
	$target=$row["target"];
	$j=0;
	while(($target_cut=cut_str($target,'^',$j)) != 'error'){
		echo $target_cut;
		$j= $j+1;
	}
    echo "\t\n";
}
?>