<?php
 
    $db_host = "mysql12.000webhost.com";
    $db_user = "a2751338_wu";
    $db_pass = "403bdwwoysy200";
    $db_base = "a2751338_wu";
    
    $db = mysql_connect($db_host, $db_user, $db_pass);
    mysql_select_db($db_base, $db);
    
    if (isset($_SESSION['USER_ID'])) {
        $user_id     = $_SESSION['user_id'];
        $user_login   = $_SESSION['user_login'];
		$user_type  = $_SESSION['user_type'];
        
    }
 
?>