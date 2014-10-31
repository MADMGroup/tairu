<?php header('Content-Type: text/html; charset=utf-8');session_start();?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Wirtualna Uczelnia</title>
</head>
<body>
<?php
//inicjacja
include "config.php";
mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`");

$cos =  mysql_query ("SELECT * FROM STUDENCI WHERE student_login = '".$_SESSION["user_login"]."' ;");
$cos = mysql_fetch_array($cos);

//sprawdza poprawność danych do logowania
if($_SESSION["user_type"]=="student") {
	echo "<div id='calosc'><div id='userinfo'><div id=logo><p>Twoja<br>Wirtualna<br>uczelnia</p></div>Witaj <b>".$cos['imie_nazwisko']."</b><br><div class='link'><a href='logout.php'>Logout</a></div></div>";
	

	

	//tabela
	$r = mysql_list_tables("a2751338_wu");
	echo '<div id="tabela"><table class="tab"><tr><th align="left">Nazwa przedmiotu</th><th>Forma zajęć</th><th>Ocena</th></tr>';
	for ($i = 0; $i < mysql_num_rows ($r); $i++)
	{
		$tab_name = mysql_tablename ($r, $i);
		if(strstr($tab_name, "PRZEDMIOT_")==TRUE)
		{
		$rr = mysql_query ("SELECT * FROM `{$tab_name}` WHERE nr_albumu='".$cos['nr_albumu']."'");
		$rr = mysql_fetch_array($rr);
		$tab_name2 = preg_match('/(ĆWICZENIA|WYKŁAD|KONSERWATORIUM)/', $tab_name, $match);
		
		$tab_name = preg_replace('/(_(ĆWICZENIA|WYKŁAD|KONSERWATORIUM)|PRZEDMIOT_)/', '', $tab_name);
		$tab_name = mb_convert_case(str_replace('_', ' ', $tab_name) , MB_CASE_TITLE, "UTF-8");
		
		echo '<tr>';
		echo '<td style="text-align:left;">'.$tab_name.'</td>';
		echo '<td>'.mb_convert_case($match[0], MB_CASE_TITLE, "UTF-8").'</td>';
		echo '<td>'.$rr['ocena'].'</td>';
		echo '</tr>';
		}
		
	}
		echo '</table></div></div>';
	?>
	
	
	
	<?php
}
else
header("Location: index.php");
exit;
?>


</body>
</html>