<!DOCTYPE html>
<html lang="en">
<?php include("config.php");
include("lock.php") 
?>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title><?php echo $lang["小译通"]; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500" rel="stylesheet" />
    <link href="css/website.css" rel="stylesheet" />
    <link href="css/image.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="navigation.css"> 
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
  </head>
  <body>

      <section class="Layout__Sidebar">
        
        <img class="Logo" src="images/logo.png" alt="Pearsearch logo"/>
        
        <nav class="Navigation Navigation--Main">
          <li class="Navigation--Selected"><a href="userhome.php"><?php echo $lang["主页"]; ?></a></li>
          <li><a href="history.php"><?php echo $lang["翻译"]; ?></a></li>
          <li><a href="term.php"><?php echo $lang["术语管理"]; ?></a></li>
          <li><a href="memory.php"><?php echo $lang["记忆库管理"]; ?></a></li>

          
          
          </nav>
          
        <hr class="Navigation__Splitter"/>
        <nav class="Navigation Navigation--Secondry">
        </nav>
        <a href = "?lang=english">English</a>
        <a href = "?lang=chinese">中文</a>
      </section>
      <form method="POST" action="logout.php" role="form"><div align="right">
      <button type="submit" class="btn btn-default" name="logout" ><?php echo $lang["登出"]; ?></button></div></form>
      <section class="Layout__Content">
        <h1 class="PageTitle"><?php echo $user_check.$lang["的小译通"]; ?></h1> 
        <p style="font-size:35px"><?php echo $lang["开始管理你的翻译库吧"]; ?></p>


        <section>
        <div><img src="images/logo.png" width="600px"/></div><br><br>
        
        </section>



            
          </a>
          

  </body>
</html>