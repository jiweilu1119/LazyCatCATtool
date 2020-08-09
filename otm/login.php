<body background="images\background.png"
style=" background-repeat:no-repeat ;
background-size:100% 100%;
background-attachment: fixed;"
>
<?php
include("config.php");

//if(session_start() == False){session_start();}
//$dbhost = 'localhost';  //mysql服务器主机地址
//$dbuser = 'root';      //mysql用户名
//$dbpass = '';//mysql用户名密码
//$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
//	
//	if(! $conn )
//		{
//			die('Could not connect: ' . mysqli_error());
//		}
//
//	mysqli_select_db($conn,"otm");
//	mysqli_query($conn, "set names 'utf8'");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from form 

$myusername=mysqli_real_escape_string($conn,$_POST['username']); 
$mypassword=mysqli_real_escape_string($conn,$_POST['password']); 
//$sql="SELECT * FROM user WHERE username = '小美'";
//$sql="SELECT * FROM user WHERE username = '{$myusername}' AND userpassword = '{$mypassword}'";
$sql="SELECT * FROM user WHERE username='$myusername' and userpassword='$mypassword'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
//$active=$row['active'];
echo $row['username'];
$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{

$_SESSION['login_user']=$myusername;

header("location: userhome.php");
}
else 
{
	
$error=$lang["用户名或密码不正确，请确认后重试。"];
echo "<div class='alert alert-success alert-dismissable'>";						
echo "		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>";
echo "			× ";
echo "		</button>";
echo "		</button>";
echo "		<h4> ";
echo $error;
echo "		</h4>";
echo "	</div>";
}
}
?>


<!DOCTYPE html>
<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $lang["登录"]; ?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>
<div class="container-fluid">
		<div class="col-md" style="margin-left: auto;margin-right: auto">
			<div class="jumbotron">
				<h2>
					<?php echo $lang["欢迎登陆小译通在线翻译网"]; ?>
				</h2>
				<p>
					<li><a href = "?lang=english">English</a></li>
					<li><a href = "?lang=chinese">中文</a></li>					
				</p>
	
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
						
			<form action="" role="form" method="post">
				<div class="form-group">
					 
					<label>
						<?php echo $lang["用户名"]; ?>
					</label>
					<input type="text" name="username" class="form-control" >
				</div>
				<div class="form-group">
					 
					<label >
						<?php echo $lang["密码"]; ?>
					</label>
					<input type="password" name="password" class="form-control">
				</div>
				 
				<button type="submit" class="btn btn-primary">
					<?php echo $lang["登录"]; ?>
				</button>
			</form>
		</div>
		<div class="col-md-3">
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>