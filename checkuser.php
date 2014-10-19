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

ob_start();



	  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST)) { // Drobne zapezpieczenie. Sprawdza czy metoda któr¹ wysy³ane jest ¿adanie to POST

	  

         $login    = $_POST['login'];

	     $password = $_POST['password'];

		

		 include_once('config.php');

		

         $mysqli = @new mysqli($db['host'], $db['user'], $db['password'], $db['database']);

	

		
     

    		 header( "Refresh:2; url=login.php", true, 303); }

	  

		  $login     = trim(htmlspecialchars($mysqli -> real_escape_string($login)));

		  $password  = hash('sha256', trim(htmlspecialchars($mysqli -> real_escape_string($password))));

		 

		 $result = $mysqli -> query("SELECT login, password FROM `user` WHERE login = '$login' and password = '$password'");

		 if($result -> num_rows == 1)

		 {

		  session_start(); // Inicjacja sesji

		  $row = $result -> fetch_row();

		  $_SESSION['ip']   = $row[1];

		  $_SESSION['nick'] = $row[0]; 

		  setcookie('islogged', 'islogged', time() + 3600); // czas istenienia ciastka 3600s czyli 1h

		  header('Location: userpanel.php');

		 }

		 else

		 {
			 ?>
             
              <div class="start">

    <div class="blockOuter">


	  
		<div style="display:table;border-spacing:20px;margin:0 auto;">
	  <div id="loading">	  </div>

	  <div class="statement">Nieprawidłowe hasło lub nazwa użytkownika. Trwa przekierowanie...</div>



	  </div>

	  </div>

	  </div>

          <?php header( "Refresh:2; url=login.php", true, 303);

		 }
	   



	  
	

ob_end_flush();

?>

</body>

</html>

