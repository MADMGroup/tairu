

<?php
	if(isset($_SESSION['nick']) && isset($_SESSION['ip']) && $_COOKIE['islogged'])
   {
	   

		 include_once('tairu_database.php');
		 $mysqli = @new mysqli($db['host'], $db['user'], $db['password'], $db['database']);
		 
		  if($wynik = $mysqli -> query("SELECT url FROM `usersetting`"))
		  {
			  
			  while($row = $wynik->fetch_array(MYSQLI_NUM))$url[]=$row[0];
		 
?>

<div class="usersetting"> 
    <img src="<?=$url[0]?>" style="border:1px solid #000;">
    <form name="logo_upload_form" action="tairu_services.php" method="post" enctype="multipart/form-data">
    <svg class="buttons" style="margin:10px -50px 0 0;width:100%;float:none;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" onclick="document.getElementById('logo').click();">
    <rect fill='black' x='0' y='0' width='100%' height='100%'/>
    <text x='50%' y='50%' dy='.3em' font-size='14'  font-family='Segoe UI' text-anchor='middle' fill='white' > Upload </text>
    </svg>
    <input name="usersetting" type="file" id="logo" value="Upload"  style="display:none;" onChange="this.form.submit()" />
    <input name="id_usersetting" type="text" value="1"  style="display:none;"  />
  </form>
</div>

<div class="usersetting">
  <form name="text_update_form" method="POST" action="tairu_services.php">
  <table  border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td></td>
  </tr>
  <tr>
    <td width="110">Facebook</td>
    <td width="200"><input  width="100%"  name="siteid" type="url" value="<?=$url[1]?>"></td>
  </tr>
   <tr>
    <td width="110">Adress Site</td>
    <td width="200"><input width="100%" name="siteid2" type="url" value="<?=$url[3]?>"></td>
  </tr>
  <tr>
    <td width="110">Mail</td>
    <td width="200"><input width="100%"  name="mailid" type="email" value="<?=$url[4]?>"></td>
  </tr>
  <tr>
    <td width="110"></td>
    <td width="200"></td>
  </tr>
  <tr>
    <td width="110"></td>
  <td width="200"><svg class="buttons" style="margin:0;width:100%;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" onclick="document.getElementById('text_update').click();"  width='172' height='40'>
    <rect fill='black' x='0' y='0' width='100%' height='100%'/>
    <text x='50%' y='50%' dy='.3em' font-size='14'  font-family='Segoe UI' text-anchor='middle' fill='white' > Update </text>
    </svg>
    <input name="text_update" type="submit" style="display:none;" id="text_update" value="Update" /></td>
  </tr>
  </table>
  </form>

</div>


  
  <div class="usersetting">
  <form name="pdf_upload_form" action="tairu_services.php" method="post" enctype="multipart/form-data">
    <svg class="buttons" style="width:50px;height:127px;margin:0;"xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" onclick="document.getElementById('pdf').click();" >
    <rect fill='black' x='0' y='0' width='100%' height='100%'/>
    <text x='50%' y='50%' dy='.3em' font-size='14'  font-family='Segoe UI' text-anchor='middle' fill='white' > PDF </text>
    </svg>

    <input name="usersetting" type="file" id="pdf" value="PDF"  style="display:none;" onChange="this.form.submit()" />
    <input name="id_usersetting" type="text" value="3"  style="display:none;"  />
  </form>
  </div>
    <div class="usersetting">
  <form name="pdf_delete_form" action="tairu_services.php" method="post" enctype="multipart/form-data">
            <svg class="buttons" style="width:100px;height:127px;margin:0;"xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" onclick="document.getElementById('pdf_delete').click();" >
    <rect fill='black' x='0' y='0' width='100%' height='100%'/>
    <text x='50%' y='50%' dy='.3em' font-size='14'  font-family='Segoe UI' text-anchor='middle' fill='white' > Delete PDF </text>
    </svg>
    
    
    <input name="pdf_delete" type="submit" id="pdf_delete" value="PDF"  style="display:none;" onChange="this.form.submit()" />
    </form>
    </div>
  
  
<?php } 
unset($row);
$wynik->free();

   }
   else     header("Location: tairu_panel.php");




?>
