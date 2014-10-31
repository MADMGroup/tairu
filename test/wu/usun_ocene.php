
<?php 
header('Content-Type: text/html; charset=utf-8');
session_start();
include "config.php";
mysql_query("SET NAMES `utf8` COLLATE `utf8_polish_ci`");

$nr_albumu = $_GET['nr_albumu'];
$ocena = $_GET['ocena'];
$nazwa_przedmiotu = $_GET['nazwa_przedmiotu'];
$przedmiot_id = $_GET['przedmiot_id'];

$cos =  mysql_query ("SELECT * FROM PRACOWNICY WHERE prac_login = '".$_SESSION["user_login"]."' ;");
$cos = mysql_fetch_array($cos);

$check = mysql_query ("SELECT * FROM `PRZEDMIOTY` WHERE prowadzacy='".$cos['imie_nazwisko']."' AND przedmiot_id='". $przedmiot_id."' ; ");



if($_SESSION["user_type"]=="prac") {
	if(mysql_num_rows($check)==0) header("Location: widok_wykladowcy.php?przedmiot=".$przedmiot_id);
	else
	{
		$result = mysql_query("UPDATE `{$nazwa_przedmiotu}` SET ocena=NULL WHERE nr_albumu='$nr_albumu'");
		
		header("Location: widok_wykladowcy.php?przedmiot=".$przedmiot_id);
	}	
}
else
header("Location: index.php");
exit;
?>

