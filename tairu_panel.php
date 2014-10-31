<?php
ob_start();
session_start();
?>

<!doctype html>

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Tairu</title>
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/userpanel.css">


</head>
<body>
<?php
if(empty($_COOKIE['islogged']))
   {
	   			 ?>
<div class="start">
  <div class="blockOuter">
    <div style="display:table;border-spacing:20px;margin:0 auto;">
      <div id="loading"> </div>
      <div class="statement">Czas sesji wygasł. Trwa przekierowanie...</div>
    </div>
  </div>
</div>
<?php header( "Refresh:2; url=tairu_login.php");
   }
   else
   {

   if(isset($_SESSION['nick']) && isset($_SESSION['ip']))
   {
?>
<div class="content">
<div class="fake">
  <div id="menublock">
    <div id="logopa"><img src="css/images/tairu_logo.png"  width="150" height="167"/></div>
    <div class="line"></div>
    <div class="line_2"></div>

    <div id="menu"> <a href="tairu_panel.php" class="icons">Galerry Services</a> </div>
    <div id="menu"> <a href="tairu_panel.php?sub=usersettings" class="icons">User Settings</a> </div>
     <div id="menu"> <a href="tairu_logout.php" class="icons">Logout</a> </div>

  </div>
</div>
<div class="line"></div>
<div class="line_2"></div>



<?php
if(!isset($_GET['sub']))include("tairu_panel_galerryservice.php");
else if ($_GET["sub"] == 'usersettings')include("tairu_panel_usersettings.php");




   }
   else
   {
	      			 ?>
<div class="start">
  <div class="blockOuter">
    <div style="display:table;border-spacing:20px;margin:0 auto;">
      <div id="loading"> </div>
      <div class="statement">Nie jesteś zalogowany. Trwa przekierowanie...</div>
    </div>
  </div>
</div>
<?php header( "Refresh:2; url=tairu_login.php");
   }
   }

?>
</body>



</html><?php
ob_end_flush();
?>