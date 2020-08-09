<?php
require_once("config.php");
require_once("lock.php");
$txt=$_GET['txt'];


?>


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
//$tm_sql ="SELECT * FROM `tm`";
//$tm_result = mysqli_query($conn,$tm_sql);
$tm_sql ="SELECT * FROM `tm`";
$tm_result = mysqli_query($conn,$tm_sql);
$num=1;
$lastcolor=rand(1,5);
$line=0;
while ($row = mysqli_fetch_array($tm_result,MYSQLI_ASSOC)){
	similar_text($txt,$row['zh_cn'],$percent);
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
	if($percent>60){
	echo '<tr class="'.$colorclass.'"><td class="num">';
	echo $num;
	$num = $num + 1;
	echo '</td><td>';
	echo $row["zh_cn"];
	echo '</td><td>';
	echo $row["en_us"];
	echo '</td></tr>';
	$line=$line+1;
}
}
if($line==0){
	echo '<tr><td colspan="3" style="text-align:center">'.$lang["翻译记忆库中暂无匹配数据"].'</td></tr>';
}
?>

                  </tbody>
                  			</table>

