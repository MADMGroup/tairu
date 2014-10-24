<?php
ob_start();
session_start();


function is_dir_empty($dir) {
  if (!is_readable($dir)) return NULL; 
  return (count(scandir($dir)) == 2);
}



if (isset($_SESSION['nick']) && isset($_SESSION['ip']) && $_COOKIE['islogged']) {
    
    
    
    include_once('config.php');
    
    
    $mysqli = @new mysqli($db['host'], $db['user'], $db['password'], $db['database']);
    
    if (isset($_POST['del'])) {
        
        
        $id_array = $_POST['checkedItem']; // return array
        $id_count = count($_POST['checkedItem']); // count array
        
        
        
        for ($i = 0; $i < $id_count; $i++) {
            
            $id = $id_array[$i];
            
            $wynik = $mysqli->query("SELECT path, filename FROM `photo` WHERE `id_photo` = '$id'");
            $row   = $wynik->fetch_assoc();
            unlink($row["path"] . 'thumb_' . $row["filename"]);
            unlink($row["path"] . $row["filename"]);
            $wynik = $mysqli->query("DELETE FROM `photo` WHERE `id_photo` = '$id'");
			
			if(is_dir_empty($row["path"])) {
  				rmdir($row["path"]);
			}

            
        }
        
        
    } 
	else 
		{
		

		$uid = uniqid('');

        
        function getExtension($str)
        {
            $i = strrpos($str, ".");
            if (!$i) {
                return "";
            }
            $l   = strlen($str) - $i;
            $ext = substr($str, $i + 1, $l);
            return $ext;
        }
        
        
        if (isset($_FILES['files'])) 
		{
                $file = array();

                foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
                    
                    $file_name = stripslashes($_FILES['files']['name'][$key]);
                    $file_size = $_FILES['files']['size'][$key];
                    $file_tmp  = $_FILES['files']['tmp_name'][$key];
                    $file_type = strtolower(getExtension($file_name));
                    
                    
                    
                    
           
                    
                    
                    if (($file_type != "jpg") && ($file_type != "jpeg") && ($file_type != "png") && ($file_type != "gif")) {
                        
                    } else {
                        
                        
                        
                        
                        if ($file_type == "jpg" || $file_type == "jpeg") {
                            $src = imagecreatefromjpeg($file_tmp);
                            
                        } else if ($file_type == "png") {
                            $src = imagecreatefrompng($file_tmp);
                            
                        } else {
                            $src = imagecreatefromgif($file_tmp);
                        }
                        
                        
                        
                        list($width, $height) = getimagesize($file_tmp);
                        
                        
                        $tmp = imagecreatetruecolor($width, $height);
                        
                        
                        $newwidth1  = 300;
                        $newheight1 = ($height / $width) * $newwidth1;
                        $tmp1       = imagecreatetruecolor($newwidth1, $newheight1);
                        
                        imagecopyresampled($tmp, $src, 0, 0, 0, 0, $width, $height, $width, $height);
                        
                        imagecopyresampled($tmp1, $src, 0, 0, 0, 0, $newwidth1, $newheight1, $width, $height);
                        
                        
                        mkdir('upload/'.$uid, 0777, true);
						
                        imagejpeg($tmp, "upload/".$uid."/" . str_replace(" ", "_",$_FILES['files']['name'][$key]), 100);
                        
                        imagejpeg($tmp1, "upload/".$uid."/thumb_" . str_replace(" ", "_",$_FILES['files']['name'][$key]), 100);
						if(!imagejpeg) echo 'pierdol sie';
                        
                        imagedestroy($src);
                        imagedestroy($tmp);
                        imagedestroy($tmp1);

						
						
						$wynik = $mysqli->query('INSERT INTO `photo` SET path="upload/'.$uid.'/", filename="'.str_replace(" ", "_",$_FILES['files']['name'][$key]).'", user_id_user="1"');

						
						
                    }
					
                }
				
				}
                        $mysqli->close();
            } 
            
            
       
        
        
    }
    
    
    
    

ob_end_flush();
header("Location: userpanel.php");
?>
