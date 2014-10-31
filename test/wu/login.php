<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link href="style.css" rel="stylesheet" type="text/css" />
    <title>Wirtualna Uczelnia</title>
  </head>
  <body>


<?php

header('Content-Type: text/html; charset=utf-8');

    session_start();
    
    include "config.php";
 
    $user_login = $_POST['login'];
    $user_pass  = $_POST['pass'];
	
	$user_login = mysql_real_escape_string($user_login);
	$user_pass = mysql_real_escape_string($user_pass);

	
    
    $sql = "SELECT * FROM UZYTKOWNICY WHERE user_login = '".$user_login."' AND user_pass = '".$user_pass."';";
    $result = mysql_query($sql)
        or die("Podałeś błędny login lub hasło");
        
    $rows = mysql_num_rows($result);
    
    if ($rows == 1) {
		$r = mysql_fetch_assoc($result);
        session_register("user_id");
        session_register("user_login");
        session_register("user_type");

        
        $_SESSION['user_id']     = $r['user_id'];
        $_SESSION['user_login']   = $r['user_login'];
        $_SESSION['user_type']  = $r['user_type'];
		
		if($_SESSION["user_type"]=="prac")
		{
		header("Location: widok_wykladowcy.php");	
		}
		else
		{
		header("Location: widok_studenta.php");
		}
		
        
    }
    else {
        echo '<div id="komunikat"><div id="kom_temp"><h style="font-size:180px;">!</h>
		<p>Podałeś błędny <br>login lub hasło...</p>
		<h>Przekierowanie nastąpi w ciągu 3 sekund</h>
		</div></div> ';
		header("Refresh: 3; url=\"index.php\"");
    }
 
?>


  </body>
</html>

