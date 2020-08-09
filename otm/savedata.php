<?php

require_once("config.php");
require_once("lock.php");
$id=$_GET['id'];
$target=$_GET['target'];

$sql= "UPDATE `source` SET `target`= '{$target}' WHERE `id`= '{$id}' ";
$result = mysqli_query($conn,$sql);

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


$tm_sql ="SELECT * FROM `source` WHERE `id`= '{$id}'";
$tm_result = mysqli_query($conn,$tm_sql);
while ($row = mysqli_fetch_array($tm_result,MYSQLI_ASSOC)){
	$j=0;
	$source=$row["source"];
	$target=$row["target"];
	
	while(($source_cut=cut_str($source,'。',$j)) != 'error'&&$source_cut != null){
		if(($target_cut=cut_str($target,'^',$j)) != 'error'&&$target_cut != null){
		//$target_cut=cut_str($target,'^',$j);
		echo $source_cut.$target_cut."<br/>";
		$insert_sql= "INSERT INTO `tm`(`en_us`, `zh_cn`) VALUES ('{$target_cut}','{$source_cut}')";
		$insert_result = mysqli_query($conn,$insert_sql);
		}
		$j= $j+1;
	}
}
?>