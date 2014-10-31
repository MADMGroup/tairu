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
  session_start();
  
?>

  <div class="start" style="margin:0 5%;width:90%">
    <div class="blockOuter" style="margin:5%;">
    <h1>PANEL KONFIGURACYJNY</h1>
<div class="line"></div>
<div class="line_2"></div>
<div style="margin:10px">
<?php
if (!isset($_GET['step'])) {
	if(isset($_SESSION)) {
    session_unset();
}
?>
<div>Witaj w panelu konfiguracyjnym. To tutaj skonfigurujesz dostęp do bazy danych oraz zarejestrujesz indywidualne konto dostępu do panelu zarządzania aplikacji. Jeśli istnieje plik <b>tairu_database.php</b> usuń go aby poprawnie przeprowadzić proces konfiguracji. <b>Uwaga!</b> Proces konfiguracji usunie wszelkie dane o ile wcześniej była juz robiona konfiguracja systemu.</div>

<form action="<?=($_SERVER['PHP_SELF'])?>" method="GET" >
<svg  style="margin:20px 0;width:200px;" class="buttons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" onclick="document.getElementById('step').click();"  >
  
  <rect fill='black' x='0' y='0' width='100%' height='100%'/> <text x='50%' y='50%' dy='.3em' font-size='14'  font-family='Segoe UI' text-anchor='middle' fill='white' > Dalej </text>
  
  </svg>
  <input type="submit" style="display:none;" name="step" id="step" value="2" />
  </form>

<?php }
else if ($_GET['step']==2) {
	
	?>
    
    
     <form method="GET" action="tairu_config.php">
  <table  border="0" cellspacing="1" cellpadding="5">
  <tr>
    <td>Host bazy danych</td>
    <td width="200"><input  width="100%"  name="db_host" type="text" value=""></td>

    <td >Użytkownik bazy danych</td>
    <td width="200"><input width="100%" name="db_user" type="text" value=""></td>


    <td>Hasło bazy danych</td>
    <td width="200"><input width="100%"  name="db_password" type="password" value=""></td>
    
        <td>Nazwa bazy danych</td>
    <td width="200"><input width="100%"  name="db_name" type="text" value=""><input name="step" type="submit" style="display:none;" id="step" value="3" /></td>


  </table>
  </form>
  <svg class="buttons" style="margin:20px 0;width:200px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" onclick="document.getElementById('step').click();">
    <rect fill='black' x='0' y='0' width='100%' height='100%'/>
    <text x='50%' y='50%' dy='.3em' font-size='14'  font-family='Segoe UI' text-anchor='middle' fill='white' > Dalej </text>
    </svg>
      <svg class="buttons" style="margin:20px 0;width:200px;float:none;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" onclick="history.go(-1);">
    <rect fill='black' x='0' y='0' width='100%' height='100%'/>
    <text x='50%' y='50%' dy='.3em' font-size='14'  font-family='Segoe UI' text-anchor='middle' fill='white' > Wstecz</text>
    </svg>
 <?php }
else if ($_GET['step']==3) {
	
	  $_SESSION['db_host']   = $_GET['db_host'];
	  $_SESSION['db_user']   = $_GET['db_user'];
	  $_SESSION['db_password']   = $_GET['db_password'];
	  $_SESSION['db_name']   = $_GET['db_name'];
	?>   
    
    
         <form method="GET" action="tairu_config.php">
  <table  border="0" cellspacing="1" cellpadding="5" style="margin: 0 220px 0 0 ">
  <tr>
    <td>Email</td>
    <td width="200"><input  width="100%"  name="login" type="email" value="" onchange=""></td>

    <td>Password</td>
    <td width="200"><input width="100%" name="password" type="password" value=""><input name="step" type="submit" style="display:none;" id="step" value="4" /></td>
  </table>
  </form>
  <svg class="buttons" style="margin:20px 0;width:200px;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" onclick="document.getElementById('step').click();"  width='172' height='40'>
    <rect fill='black' x='0' y='0' width='100%' height='100%'/>
    <text x='50%' y='50%' dy='.3em' font-size='14'  font-family='Segoe UI' text-anchor='middle' fill='white' > Dalej</text>
    </svg>
   <svg class="buttons" style="margin:20px 0;width:200px;float:none;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" onclick="history.go(-1);">
    <rect fill='black' x='0' y='0' width='100%' height='100%'/>
    <text x='50%' y='50%' dy='.3em' font-size='14'  font-family='Segoe UI' text-anchor='middle' fill='white' > Wstecz</text>
    </svg>
   <?php }
else if ($_GET['step']==4) {
		  $_SESSION['login']   = $_GET['login'];
		  $_SESSION['password']   = $_GET['password'];
		  
		  $check=0;
    foreach($_SESSION as $value){
        if($value == ''){
			
			$check=1;		
			
		}
 
    }


if ($check == 0) {
	

	?>   

	
  <form name="final" action="tairu_register.php" method="POST" >
		<?php
		$i=0;
		foreach($_SESSION as $value){
			$i++;
		?>	
			
            <input  width="100%"  name="<?=$i?>" type="text"  value="<?=$value?>">
            
            
            <?php
		}
		 unset($i); session_unset();
?>
<input name="step" type="submit" style="display:none;" id="step" value="4" />

 <script type="text/javascript">
 	document.forms.final.submit();
 </script>   
    </form>

    <?php }else{?>
    
   <div> <b>Błąd</b>. Wypełnij wszystkie pola!</div>
	
	 <svg class="buttons" style="margin:20px 0;width:200px;float:none;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" onclick="history.go(-1);">
    <rect fill='black' x='0' y='0' width='100%' height='100%'/>
    <text x='50%' y='50%' dy='.3em' font-size='14'  font-family='Segoe UI' text-anchor='middle' fill='white' > Wstecz</text>
    </svg>
	<?php
	}}   ?>
    </div>
</div>
</div>
</body>
</html>

