<<<<<<< HEAD
<?php
////////////////////////////////////////////////////////////////
// Author: Dominik Ryńko                                      //
// Website: http://www.rynko.pl/                              //
// Version: 1.1                                               //
// Contact: http://www.rynko.pl/kontakt                       //    
// Description: Adding new user to database                   //
//                                        All Rights Reserved //
////////////////////////////////////////////////////////////////
?>
<!DOCTYPE html>
<html lang="pl">
 <head>
  <meta charset="UTF-8">
  <title>System rejestracji i logowania PHP & MySQL - Dominik Ryńko</title>
  <meta name="Author" content="Dominik Ryńko - http://www.rynko.pl/">
  <meta name="Description" content="System rejestracji i logowania na stronę WWW. Napisany w PHP i w oparciu o bazę danych MySQL" >
  <link rel="stylesheet" href="style.css">
 </head>
<body>
 <header>
  <h1><a href="index.php" title="Dominik Ryńko - system rejestracji">System rejestracji i logowania</a></h1>
 </header>
 
 <nav id="menu">
  <ul>
   <li><a href="form.php" title="Formualarz rejestracji">Formularz rejestracji</a></li>
   <li><a href="login.php" title="Formualarz logowania">Formularz logowania</a></li>
   <li><a href="database.php" title="Zrzut bazy danych">Kod bazy danych</a></li>
   <li><a href="userpanel.php" title="Plik dla zalogowanych użytkowników">Panel użytkownika</a></li>
   <li><a href="http://rynko.pl/system-rejestracji-i-logowania/" title="Powrót na bloga "><strong>Powrót na stronę artykułu</strong></a></li>
  </ul>
 </nav>

 <section id="main">
		
	<?php
	  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST))	
	   {
	   	 
	      $login    = $_POST['login'];
	      $password = $_POST['password'];
	 
	    if(empty($login) || empty($password)) // Sprawdzanie czy pola formularza nie są puste
		{
		  die('Wypełnij wszystkie dane.');
		}
		elseif(!filter_var($login, FILTER_VALIDATE_EMAIL)) // Sprawdzanie poprawności adresu Email
		{
		 die('Nie poprawny adres E-mail.');
		}
		else
		{	
		 include_once('config.php');
		 
         $mysqli = new mysqli($db['host'], $db['user'], $db['password'], $db['database']);
		 
		 if($mysqli -> connect_error) 
          die('Problem z połączeniem się z bazą danych:'.$mysqli -> connect_error.'['.$mysqli -> connect_errno.']');
		 
		 
		 $login     = trim(htmlspecialchars($mysqli -> real_escape_string($login)));
		 $password  = hash('sha256', trim(htmlspecialchars($mysqli -> real_escape_string($password))));
		 $ip        = $_SERVER['REMOTE_ADDR'];
		
		
		 $stmt = $mysqli -> prepare("INSERT INTO `user`(`id_user`, `login`,`password`,`added`,`ip`) VALUES('', ? , ? , now(), ?)");
		  $stmt -> bind_param('sss', $login, $password, $ip);
		 $stmt -> execute();
		 
		 if($stmt -> affected_rows == 1)
		 {
		  echo 'Zostałeś pomyślnie zarejestrowany';
		 }
		}
	  }

	
	?>
 </section> 
</body>
</html>

=======
<?php
////////////////////////////////////////////////////////////////
// Author: Dominik Ryńko                                      //
// Website: http://www.rynko.pl/                              //
// Version: 1.1                                               //
// Contact: http://www.rynko.pl/kontakt                       //    
// Description: Adding new user to database                   //
//                                        All Rights Reserved //
////////////////////////////////////////////////////////////////
?>
<!DOCTYPE html>
<html lang="pl">
 <head>
  <meta charset="UTF-8">
  <title>System rejestracji i logowania PHP & MySQL - Dominik Ryńko</title>
  <meta name="Author" content="Dominik Ryńko - http://www.rynko.pl/">
  <meta name="Description" content="System rejestracji i logowania na stronę WWW. Napisany w PHP i w oparciu o bazę danych MySQL" >
  <link rel="stylesheet" href="style.css">
 </head>
<body>
 <header>
  <h1><a href="index.php" title="Dominik Ryńko - system rejestracji">System rejestracji i logowania</a></h1>
 </header>
 
 <nav id="menu">
  <ul>
   <li><a href="form.php" title="Formualarz rejestracji">Formularz rejestracji</a></li>
   <li><a href="login.php" title="Formualarz logowania">Formularz logowania</a></li>
   <li><a href="database.php" title="Zrzut bazy danych">Kod bazy danych</a></li>
   <li><a href="userpanel.php" title="Plik dla zalogowanych użytkowników">Panel użytkownika</a></li>
   <li><a href="http://rynko.pl/system-rejestracji-i-logowania/" title="Powrót na bloga "><strong>Powrót na stronę artykułu</strong></a></li>
  </ul>
 </nav>

 <section id="main">
		
	<?php
	  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST))	
	   {
	   	 
	      $login    = $_POST['login'];
	      $password = $_POST['password'];
	 
	    if(empty($login) || empty($password)) // Sprawdzanie czy pola formularza nie są puste
		{
		  die('Wypełnij wszystkie dane.');
		}
		elseif(!filter_var($login, FILTER_VALIDATE_EMAIL)) // Sprawdzanie poprawności adresu Email
		{
		 die('Nie poprawny adres E-mail.');
		}
		else
		{	
		 include_once('config.php');
		 
         $mysqli = new mysqli($db['host'], $db['user'], $db['password'], $db['database']);
		 
		 if($mysqli -> connect_error) 
          die('Problem z połączeniem się z bazą danych:'.$mysqli -> connect_error.'['.$mysqli -> connect_errno.']');
		 
		 
		 $login     = trim(htmlspecialchars($mysqli -> real_escape_string($login)));
		 $password  = hash('sha256', trim(htmlspecialchars($mysqli -> real_escape_string($password))));
		 $ip        = $_SERVER['REMOTE_ADDR'];
		
		
		 $stmt = $mysqli -> prepare("INSERT INTO `user`(`id_user`, `login`,`password`,`added`,`ip`) VALUES('', ? , ? , now(), ?)");
		  $stmt -> bind_param('sss', $login, $password, $ip);
		 $stmt -> execute();
		 
		 if($stmt -> affected_rows == 1)
		 {
		  echo 'Zostałeś pomyślnie zarejestrowany';
		 }
		}
	  }

	
	?>
 </section> 
</body>
</html>

>>>>>>> origin/test_nao
