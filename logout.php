<!doctype html>



<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title>Tairu - Login Panel</title>

<link rel="stylesheet" href="css/reset.css">

<link rel="stylesheet" href="css/userpanel.css">



</head>

<body>



<?php



session_start();



if(isset($_SESSION['nick']) && isset($_SESSION['ip']))

{ session_unset();?>







 <div class="start">

    <div class="blockOuter">


	  
		<div style="display:table;border-spacing:20px;margin:0 auto;">
	  <div id="loading">	  </div>

	  <div class="statement">Wylogowano. Trwa przekierowanie...</div>



	  </div>

	  </div>
      </div>

	  

	  <?php


header( "Refresh:2; url=index.php", true, 303);

}

else

{

header("Location: login.php", true, 303);

}

?>



</body>

</html>