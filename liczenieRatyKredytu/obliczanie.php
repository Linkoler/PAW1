<?php
require_once dirname(__FILE__).'/config.php';
$lata = $_REQUEST ['liczbaLat'];
$proc = $_REQUEST ['procent'];
$kwota = $_REQUEST ['kwota'];

if(!(isset($lata) && isset($proc) && isset($kwota))){
    $error [] = 'Brak jednego z parammetrów';
}
if(($lata=="" || $proc=="" || $kwota=="") || !(is_numeric($lata)) || !(is_numeric($proc)) || !(is_numeric($kwota))){
    $error [] = 'Upewnij się że wszystkie wartosci są poprawnie uzupełnione';
}
if (empty ( $error )) {
$lata = intval($lata);
$proc = intval($proc);
$kwota = intval($kwota);

$lmiesiecy = $lata * 12;
$procDzies = $proc / 100;
$wynik = ($kwota * $procDzies * pow(1 + $procDzies, $lmiesiecy)) / (pow(1 + $procDzies, $lmiesiecy) - 1);
}
include 'widok.php';
?>
