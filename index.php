<!doctype html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Tairu</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<link rel="stylesheet" href="libs/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<!--<link rel="stylesheet" href="libs/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />-->
</head>
<body>
<div id="blur">
  <div class="start">
    <div class="blockOuter">
      <div class="blockInner">
        <div id="logo"><img src="css/images/logo.png"  /></div>
        <div id="logonap"> <a href="https://www.facebook.com/naod3sign" target="_blank" class="icons"></a> <a href="#" target="_blank" class="icons" style="background:url(css/images/icons.png) no-repeat -30px;background-size: 300%;"></a> <a href="login.php" class="icons" style="background:url(css/images/icons.png) no-repeat;background-size: 300%;"></a> </div>
        <div class="desc"><a href="http://madmgroup.github.io/tairu/">madmgroup.github.io/tairu</a><br/>
          <a href="mailto:naod3sign@gmail.com">naod3sign(at)gmail.com</a></div>
      </div>
    </div>
  </div>
</div>
</div>

<div id="main" role="main">
  <ul id="tiles" >

    	<?php
		
		 include_once('config.php');
		 $mysqli = new mysqli($db['host'], $db['user'], $db['password'], $db['database']);
		 
		  if($wynik = $mysqli -> query("SELECT path, filename FROM `photo`"))
		  {
			  
			  
			  while( $photo = $wynik->fetch_assoc())
	{	

			
			echo '<li> <a href="' . $photo['path'] . $photo['filename'] .'"> <img src="' . $photo["path"] .'thumb_'. $photo["filename"] .'" width="100%" height="100%"></a> </li>';  
	}
	
	/* Usuwamy wynik zapytania z pamięci */
	$wynik->close();
}

/* Zamykamy połączenie z bazą */
$mysqli->close();
			  
		  ?>
		  
  </ul>
</div>
<script type="text/javascript" src="libs/jquery-1.8.3.min.js"></script> 
<script src="libs/jquery.imagesloaded.js"></script> 
<script src="libs/jquery.wookmark.js"></script> 
<script type="text/javascript" src="libs/jquery.fancybox.js"></script> 
<!--<script type="text/javascript" src="libs/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>--> 
<script type="text/javascript" src="libs/helpers/jquery.fancybox-media.js?v=1.0.6"></script> 
<script type="text/javascript" src="libs/init.js"></script>
</body>
</html>