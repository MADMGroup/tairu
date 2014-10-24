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
<?php header( "Refresh:2; url=login.php", true, 303);
   }
   else
   {

   if(isset($_SESSION['nick']) && isset($_SESSION['ip']))
   {
?>
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
<form name="galery_list" action="services.php" method="POST">
  <?php
		
		 include_once('config.php');
		 $mysqli = @new mysqli($db['host'], $db['user'], $db['password'], $db['database']);
		 
		  if($wynik = $mysqli -> query("SELECT id_photo, path, filename FROM `photo`"))
		  {
			  
			  
			  while( $photo = $wynik->fetch_assoc())
	{	
			?>
  <div class="image_block">
  <div class="image_block_inner">
  <div class="checkbox">
  <?php
		echo '<input type="checkbox" id="'. $photo["id_photo"].'" name="checkedItem[]" value="'. $photo["id_photo"].'" /> <label for="'. $photo["id_photo"].'"></label></div>';
        echo ' <span class="helper"></span><img class="image" src="' . $photo["path"] .'thumb_'. $photo["filename"] .'"/> </div></div>';

	}
	
	/* Usuwamy wynik zapytania z pamięci */
	$wynik->close();
}

/* Zamykamy połączenie z bazą */
$mysqli->close();
			  
		  ?><input type="submit" style="display:none;" name="del" value="Delete" />
          
          </form>
   <form>

  <svg class="buttons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" onclick="document.galery_list.del.click()"  width='172' height='40'>
  
  <rect fill='black' x='0' y='0' width='100%' height='100%'/> <text x='50%' y='50%' dy='.3em' font-size='14'  font-family='Segoe UI' text-anchor='middle' fill='white' > Delete </text>
  
  </svg>
</form>

<form name="upload_form" action="services.php" method="post" enctype="multipart/form-data">
  <svg class="buttons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" onclick="document.getElementById('upl').click();"  width='172' height='40'>
  
  <rect fill='black' x='0' y='0' width='100%' height='100%'/> <text x='50%' y='50%' dy='.3em' font-size='14'  font-family='Segoe UI' text-anchor='middle' fill='white' > Upload </text>
  
  </svg>
       <input name="files[]" type="file" multiple name="upl" id="upl" value="Upload"  style="display:none;" onChange="this.form.submit()" />
</form>



  </form>
<?php

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
<?php header( "Refresh:2; url=login.php", true, 303);
   }
   }

?>
</body>



</html><?php
ob_end_flush();
?>