<?php header('Content-Type: text/html; charset=utf-8');session_start();?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Wirtualna Uczelnia</title>
<script type="text/javascript">

function Sprawdz(formularz) {
	var formatLiczby = /(2|2.5|3|3.5|4|4.5|5|5.5)/;
	if(formatLiczby.test(formularz.ocena.value)) 
	{
		formularz.submit();
		return true;
	}
	else 
	{
		formularz.ocena.value="";
		alert('Ocena musi być przedziale od 2 do 5.5');
		return false;
	}
}
</script>
</head>
<body>
<?php
//inicjacja
include "config.php";
mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`");


$choose = $_GET['przedmiot'];

$cos =  mysql_query ("SELECT * FROM PRACOWNICY WHERE prac_login = '".$_SESSION["user_login"]."' ;");
$cos = mysql_fetch_array($cos);


//sprawdza poprawność danych do logowania
if($_SESSION["user_type"]=="prac") {
	echo "<div id='calosc'><div id='userinfo'><div id=logo><p>Twoja<br>Wirtualna<br>uczelnia</p></div>Witaj <b>".$cos['imie_nazwisko']."</b>";
	
	
	//combobox
	$flaga=false;
	
	$zapytanie = mysql_query ("SELECT * FROM PRZEDMIOTY WHERE prowadzacy='".$cos['imie_nazwisko']."' ; ")or die(mysql_error());
	$wiersz = mysql_fetch_array($zapytanie);

	if(!isset($choose))$choose=$wiersz['przedmiot_id'];

	
	$zapytanie = mysql_query ("SELECT * FROM PRZEDMIOTY WHERE prowadzacy='".$cos['imie_nazwisko']."' ; ")or die(mysql_error());
	echo '<form action="widok_wykladowcy.php" method="GET"><label><select name="przedmiot">';
	while($selected = mysql_fetch_assoc($zapytanie)) {
		
		if ($choose != $selected['przedmiot_id']) {
			echo '<option value="' . $selected['przedmiot_id'] .'">'.mb_convert_case(str_replace('_', ' ', $selected['nazwa_przedmiotu']), MB_CASE_TITLE, "UTF-8").'('.mb_convert_case(str_replace('_', ' ', $selected['forma_zajec']), MB_CASE_TITLE, "UTF-8").')</option>';
		}else{
			$flaga=true;
			echo '<option selected="selected" value="' . $selected['przedmiot_id'] .'">'.mb_convert_case(str_replace('_', ' ', $selected['nazwa_przedmiotu']), MB_CASE_TITLE, "UTF-8").'('.mb_convert_case(str_replace('_', ' ', $selected['forma_zajec']), MB_CASE_TITLE, "UTF-8").')</option>';
		}
		
	}
	if($flaga==false)$choose=$wiersz['przedmiot_id'];
	echo '</select></label><input type="submit">
	</form><div class="link"><a href="logout.php">Logout</a></div></div>';
	
	?>

	
	
	



	<?php
	//tabela
	

	
	
	$findprzedmiot = mysql_query ("SELECT * FROM PRZEDMIOTY WHERE przedmiot_id='".$choose."' ; ")or die(mysql_error());
	$findprzedmiot = mysql_fetch_array($findprzedmiot);

	$findprzedmiot="PRZEDMIOT_".$findprzedmiot['nazwa_przedmiotu']."_".$findprzedmiot['forma_zajec'];
	
	$zapytanie_tabela = mysql_query ("SELECT * FROM `{$findprzedmiot}` ORDER BY nr_albumu; ")or die(mysql_error());
	echo '<div id="tabela"><table class="tab"><tr><th><center>Nr albumu</center></th><th>Ocena</th><th align="left">Modyfikuj</th></tr>';
	while($r=mysql_fetch_array($zapytanie_tabela)){
		echo '<tr>';
		echo '<td>'.$r['nr_albumu'].'</td>';
		echo '<td>'.$r['ocena'].'</td>';
		echo '<td><form id="edycja_oceny_'.$r['nr_albumu'].'" action="edycja_oceny.php" onsubmit="return Sprawdz(this)" method="GET">';
		echo '<input id="ocena" type="text" name="ocena">';
		echo '<input type="hidden" name="nr_albumu" value="'.$r['nr_albumu'].'">';
		echo '<input type="hidden" name="nazwa_przedmiotu" value="'.$findprzedmiot.'">';
		echo '<input type="hidden" name="przedmiot_id" value="'.$choose.'">';
		echo '<input type="submit" value="Edytuj"></form>';
		echo '<form action="usun_ocene.php" method="GET">';
		echo '<input type="hidden" name="nr_albumu" value="'.$r['nr_albumu'].'">';
		echo '<input type="hidden" name="nazwa_przedmiotu" value="'.$findprzedmiot.'">';
		echo '<input type="hidden" name="przedmiot_id" value="'.$choose.'">';
		echo '<input type="submit" value="Usuń"></form></td>';
		echo '</tr>';
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