<?php
 if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
 else
  {
	  
		  $myfile=$_FILES["file"];
		  $size = $_FILES['file']['size']; 
          $fp=fopen($myfile['tmp_name'],"r");
          if(!$fp) die("file open error");
		  
          $content = fread($fp, $size); 
          fclose($fp);   
          $file_data = addslashes($content); //string
          date_default_timezone_set("Asia/Shanghai");
          $time=date("Y/m/d");

       

      //move_uploaded_file($_FILES["file"]["tmp_name"],
      //"upload/" . $_FILES["file"]["name"]);
	  
	  //$res = move_uploaded_file($_FILES['file']['tmp_name'], iconv("gb2312", "UTF-8", $newFile));
      //
      //     if (!$res){
      //          echo "<script>alert(".$lang['上传失败'].");history.go(-1);location.reload();</script>";
      //     }else {
      //         echo "<script>alert(".$lang['上传成功'].");history.go(-1);location.reload();</script>";
	  
	  
	  //$file_name = $_FILES["file"]["name"];
	 
	  
require_once("config.php");
require_once("lock.php");

				$sql = 
				"INSERT INTO `source` (`time`, `source`) VALUES ('$time', '$file_data')";
				//"INSERT INTO source ".
				//"(source) ".
				//"VALUES ".
				//"('$file_data')" and "INSERT INTO source ".
				//"(id) ".
				//"VALUES ".
				//"('$time')";
			
				
                $insert = mysqli_query( $conn, $sql );				
                if(! $insert )
					{
						die($lang['无法插入数据: '] . mysqli_error($conn));
					}
					else
					{
						header('location:history.php');
					}
				
				
				mysqli_close($conn);
				
	}    
					

?>