<?php
require_once dirname(__FILE__).'/../config.php';?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
<title>
Liczenie raty kredytu
</title>
</head>
<body>
<div style="width:90%; margin: 2em auto;">
	<a href="<?php print(_APP_ROOT); ?>/apka/ochrona/logout.php" class="pure-button pure-button-active">Wyloguj</a>	
</div>

<div style="width:90%; margin: 2em auto;">
<?php print("uzupełnij wartosci:");?>
<form action="<?php print(_APP_URL);?>/apka/obliczanie.php" method="post" class="pure-form pure-form-stacked">
<fieldset>
	<label for="id_kwota">Kwota: </label>
	<input id="id_kwota" type="text" name="kwota" value="<?php out($kwota); ?>")/>
	<label for="id_liczbaLat">Na ile lat: </label>
	<input id="id_liczbaLat" type="text" name="liczbaLat" value="<?php  out($lata); ?>")/>
	<label for="id_procent">Na ile procent (wpisać samą liczbe bez znaku "%"): </label>
	<input id="id_procent" type="text" name="procent" value="<?php out($proc); ?>")/>
</fieldset>	
	<input type="submit" value="oprocentowanie" class="pure-button pure-button-primary" />
</form>	
<?php 
if(isset($error)){
    if(count($error) > 0){
        echo '<ol style="margin-top: 1em; padding: 1em 1em 1em 2em; border-radius: 0.5em; background-color: #f88; width:25em;">';
        foreach ($error as $i => $j){
			echo '<li>'.$j.'</li>';
		}
		echo '</ol>';
	}
}
if(isset($wynik)){
    print("Miesięczna rata wynosi: ".round($wynik,2)." zł.");
}
?>
</div>
</body>
</html>