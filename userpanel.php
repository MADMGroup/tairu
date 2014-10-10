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
	  <div id="loading">	  </div>

	  <div class="statement">Czas sesji wygasł. Trwa przekierowanie...</div>



	  </div>

	  </div>

	  </div>

          <?php header( "Refresh:2; url=login.php", true, 303);
   }

   if(isset($_SESSION['nick']) && isset($_SESSION['ip']))
   {
	echo '
    <div class="content">
  <div class="fake">
    <div id="pa">
      <div id="logopa"><img src="css/images/logo.png"  width="150" height="167"/></div>
      <div class="line"></div>
      <div class="line_2"></div>
      <div id="menu"> <a href="logout.php" class="icons">Logout</a> </div>
    </div>
  </div>
  <div class="line"></div>
  <div class="line_2"></div>
 
</div>';

   }
   else
   {
	      			 ?>
             
              <div class="start">

    <div class="blockOuter">


	  
		<div style="display:table;border-spacing:20px;margin:0 auto;">
	  <div id="loading">	  </div>

	  <div class="statement">Nie jesteś zalogowany. Trwa przekierowanie...</div>



	  </div>

	  </div>

	  </div>

          <?php header( "Refresh:2; url=login.php", true, 303);
   }

?>

</body>
</html>
<?php
ob_end_flush();
?>