<?php header('Content-Type: text/html; charset=utf-8');   session_start();?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link href="login.css" rel="stylesheet" type="text/css" />
    <title>Wirtualna Uczelnia</title>
  </head>
  <body>

<?php
    include "config.php";
	
    if (isset($_SESSION['user_id'])) {
        
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
        
        echo '<div id=logo><p>Twoja<br>Wirtualna<br>uczelnia</p></div><div id="login">
        
        <form method="POST" action="login.php">
            
            <fieldset class="clearfix">
                
                <p><span id="login_user"></span><input type="text" name="login" value="" onBlur="if(this.value == "") this.value = "Username"" onFocus="if(this.value == "Username") this.value = """ required> </p> 
                <p><span id="login_password"></span><input type="password"  name="pass" value="" onBlur="if(this.value == "") this.value = "Password"" onFocus="if(this.value == "Password") this.value = """ required> </p>
				
		
             
                <p><input type="submit" value="Login"></p>

            </fieldset>

        </form>
        
       
    </div> ';
            
    }
	
?>



  </body>
</html>

