
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
	
function rrmdir($dir) {
  if (is_dir($dir)) {
    $objects = scandir($dir);
    foreach ($objects as $object) {
      if ($object != "." && $object != "..") {
        if (filetype($dir."/".$object) == "dir") 
           rrmdir($dir."/".$object); 
        else unlink   ($dir."/".$object);
      }
    }
    reset($objects);
    rmdir($dir);
  }
 }

if (!file_exists('tairu_database.php'))
 {	
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST))	
	   {
		   


	
	$string = '<?php 
$db["host"] = "'. $_POST["1"]. '";

$db["user"] = "'. $_POST["2"]. '";

$db["password"] = "'. $_POST["3"]. '";

$db["database"] = "'. $_POST["4"]. '";

?>';

$fp = @fopen("tairu_database.php","w");

fwrite($fp, $string);

fclose($fp);

include_once('tairu_database.php');
$mysqli = @new mysqli($db['host'], $db['user'], $db['password'], $db['database']);
if($mysqli -> connect_error) 
{
	
	?>
	 <div class="start">

    <div class="blockOuter">


	  
		<div style="display:table;border-spacing:20px;margin:0 auto;">
	  <div id="loading">	  </div>

	  <div class="statement">Problem z połączeniem z bazą danych. Trwa przekierowanie...</div>



	  </div>

	  </div>
      </div>
		<?php
       // unlink   ('tairu_database.php');
		   header( "Refresh:2; url=tairu_config.php");
	
}


else
{


	$mysqli -> multi_query("DROP TABLE IF EXISTS `user`;
DROP TABLE IF EXISTS `usersetting` ;
DROP TABLE IF EXISTS `photo` ; 

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(200) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `added` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_user`)
  )ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARACTER SET = latin1;
  
CREATE TABLE IF NOT EXISTS `photo` (
  `id_photo` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL,
  `description` VARCHAR(200) NULL,
  `path` VARCHAR(2048) NOT NULL,
  `filename` VARCHAR(45) NOT NULL,
  `tags` VARCHAR(200) NULL,
  PRIMARY KEY (`id_photo`))
ENGINE = InnoDB AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;

CREATE TABLE IF NOT EXISTS `usersetting` (
  `id_usersetting` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `url` VARCHAR(200) NULL,
  PRIMARY KEY (`id_usersetting`))
ENGINE = InnoDB AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;

INSERT INTO `usersetting` (`id_usersetting`, `name`, `url`) VALUES (NULL, 'logo', 'css/images/logo.png');
INSERT INTO `usersetting` (`id_usersetting`, `name`, `url`) VALUES (NULL, 'facebook', NULL);
INSERT INTO `usersetting` (`id_usersetting`, `name`, `url`) VALUES (NULL, 'pdf', NULL);
INSERT INTO `usersetting` (`id_usersetting`, `name`, `url`) VALUES (NULL, 'site', 'madmgroup.github.io/tairu');
INSERT INTO `usersetting` (`id_usersetting`, `name`, `url`) VALUES (NULL, 'mail', '');");

while ($mysqli->next_result()) // flush multi_queries --musi być
{
  if (!$mysqli->more_results()) break;
}

rrmdir('upload/');
	mkdir('upload/', 0777, true);




			$login    = $_POST['5'];
	      $password = $_POST['6'];
	 
	   
		 
        
		 
		 
		 $login     = trim(htmlspecialchars($mysqli -> real_escape_string($login)));
		 $password  = hash('sha256', trim(htmlspecialchars($mysqli -> real_escape_string($password))));
		 $ip        = $_SERVER['REMOTE_ADDR'];
		
		
		 $stmt = $mysqli -> prepare("INSERT INTO `user`(`id_user`, `login`,`password`,`added`,`ip`) VALUES('', ? , ? , now(), ?)");
		  $stmt -> bind_param('sss', $login, $password, $ip);
		 $stmt -> execute();
		 
		    header( "Refresh:0; url=index.php");   
  
}
  	
}

	   	 	
	
	  
	  
 }
		  
else{
	
	?>
	 <div class="start">

    <div class="blockOuter">


	  
		<div style="display:table;border-spacing:20px;margin:0 auto;">
	  <div id="loading">	  </div>

	  <div class="statement">Plik tairu_database.php juz istnieje. Usuń plik aby poprawnie skonfigurować. Trwa przekierowanie...</div>



	  </div>

	  </div>
      </div>
		<?php
		    header( "Refresh:2; url=tairu_config.php");
}
	
	?>

</body>
</html>

