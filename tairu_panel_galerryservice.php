
<form name="galery_list" action="tairu_services.php" method="POST">
  <?php
  if (isset($_SESSION['nick']) && isset($_SESSION['ip']) && $_COOKIE['islogged']) {
    
    
		
		 include_once('tairu_database.php');
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

<form name="upload_form" action="tairu_services.php" method="post" enctype="multipart/form-data">
  <svg class="buttons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" onclick="document.getElementById('upl').click();"  width='172' height='40'>
  
  <rect fill='black' x='0' y='0' width='100%' height='100%'/> <text x='50%' y='50%' dy='.3em' font-size='14'  font-family='Segoe UI' text-anchor='middle' fill='white' > Upload </text>
  
  </svg>
       <input name="files[]" type="file" multiple id="upl" value="Upload"  style="display:none;" onChange="this.form.submit()" />
</form>
<?php
}
   else  header("Location: tairu_panel.php");?>
