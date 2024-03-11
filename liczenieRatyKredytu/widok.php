<?php
require_once dirname(__FILE__).'/config.php';?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<style>
body {
  background-color: lightblue;
}
</style>
<title>
Liczenie raty kredytu
</title>
</head>
<body>
<?php print("uzupełnij wartosci:");?>
<form action="<?php print(_APP_URL);?>/obliczanie.php" method="post">
	<label for="id_kwota">Kwota: </label>
	<input id="id_kwota" type="text" name="kwota" if(isset(value="<?php  print($kwota); ?>")) /><br />
	<label for="id_liczbaLat">Na ile lat: </label>
	<input id="id_liczbaLat" type="text" name="liczbaLat" if(isset(value="<?php  print($lata); ?>")) /><br />
	<label for="id_procent">Na ile procent (wpisać samą liczbe bez znaku "%"): </label>
	<input id="id_procent" type="text" name="procent" if(isset(value="<?php print($proc); ?>")) /><br />
	<input type="submit" value="oprocentowanie" />
</form>	
<?php 
if (isset($error)) {
    if (count ( $error ) > 0) {
        foreach ( $error as $i => $j ) {
			echo '<li>'.$j.'</li>';
		}
	}
}
if(isset($wynik)){
    print("Miesięczna rata wynosi: ".round($wynik,2)." zł.");
}
?>
</body>
</html>