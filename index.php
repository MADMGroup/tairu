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
      <div class="blockInner" >
      <?php
      	 @include_once('tairu_database.php');
		 $mysqli = @new mysqli($db['host'], $db['user'], $db['password'], $db['database']);
		 
		 
		  if(!$mysqli -> connect_error)
		  {
			  $wynik = $mysqli -> query("SELECT url FROM `usersetting`");
			  while( $row = $wynik->fetch_array(MYSQLI_NUM))
			  
			  {
				
				  $url[]=$row[0];
			  }
			  
		  
         ?>

<img id="logo" src="<?=$url[0]?>"  />
        <div id="logonap"> 
         <?php if(!empty($url[1])){?><a href="<?=$url[1]?>" target="_blank" class="icons"></a>  
		<?php }if(!empty($url[2])){?><a href="<?=$url[2]?>" target="_blank" class="icons" style="background:url(css/images/icons.png) no-repeat -30px;background-size: 300%;"></a><?php } ?> 
        <a href="tairu_login.php" class="icons" style="background:url(css/images/icons.png) no-repeat;background-size: 300%;"></a> </div>
         <div class="desc"><a href="<?=$url[3]?>"><?php $url[3]=str_replace(array('http://', 'https://'), '', $url[3]); echo $url[3];?></a><br/>
      
          <?php  if(!empty($url[4])){?><a href="mailto:<?=$url[4]?>"><?php 
		  $url[4]=str_replace("@", '(at)', $url[4]); echo $url[4];?></a></div><?php }
          
         ?>
      </div>
    </div>
  </div>
</div>

<div id="main" role="main">
  <ul id="tiles" >

    	<?php
		
		$wynik->free();
		 
		  if($wynik = $mysqli -> query("SELECT path, filename FROM `photo`"))
		  {
			  
			  
			  while( $photo = $wynik->fetch_assoc())
	{	

			
			echo '<li> <a href="' . $photo['path'] . $photo['filename'] .'"> <img src="' . $photo["path"] .'thumb_'. $photo["filename"] .'" width="100%" height="100%"></a> </li>';  
	}
	
	/* Usuwamy wynik zapytania z pamięci */
	$wynik->free();
}

/* Zamykamy połączenie z bazą */
$mysqli->close();
			  
		  ?>
		  
  </ul>
</div>
<?php }else echo '<div style="	width: 44px;
	height: 44px;
	background: url(\'css/images/loading@2x.GIF\') center center no-repeat;display:inline-block;float:left">	  </div><div style="margin:15px;display:inline-block;">System nieskonfigurowany lub błąd bazy danych. Aby skonfigurować przejdź do <a style="color:#000" href="tairu_config.php"><b>tairu_config.php</b> </a>. </div></div></div></div>'; ?>
<script type="text/javascript" src="libs/jquery-1.8.3.min.js"></script> 
<script src="libs/jquery.imagesloaded.js"></script> 
<script src="libs/jquery.wookmark.js"></script> 
<script type="text/javascript" src="libs/jquery.fancybox.js"></script> 
<!--<script type="text/javascript" src="libs/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>--> 
<script type="text/javascript" src="libs/helpers/jquery.fancybox-media.js?v=1.0.6"></script> 
<script type="text/javascript" src="libs/init.js"></script>
</body>
</html>