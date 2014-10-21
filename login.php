<?php
ob_start();
session_start();
?>

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

   if(isset($_SESSION['nick']) && isset($_SESSION['ip']) && $_COOKIE['islogged'])
   {
	   header( "Refresh:0; url=userpanel.php", true, 303);
	   
   }
   else
   {
	  ?>

  <div class="start">
    <div class="blockOuter">
      <div class="blockInner">
        <div id="logo"><img src="css/images/logo.png"  /></div>
        
        	<form action="checkuser.php?login=true" method="POST" id="login-form">
  <input type="email" name="login" placeholder="Email"  required/>
  <input  type="password" name="password" placeholder="Password"  required/>
  <input type="submit" name="check" value="Log in" />
</form>
       
    </div>
  </div>
</div>

<?php
}
?>

</body>
</html>
<?php
ob_end_flush();
?>