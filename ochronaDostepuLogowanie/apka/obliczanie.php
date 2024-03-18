<?php
require_once dirname(__FILE__).'/../config.php';
include _ROOT_PATH.'/apka/ochrona/bramka.php';
function getParams(&$lata,&$proc,&$kwota){
    $lata = isset($_REQUEST['liczbaLat']) ? $_REQUEST['liczbaLat'] : null;
    $proc = isset($_REQUEST['procent']) ? $_REQUEST['procent'] : null;
    $kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
}
function sprawdz(&$lata,&$proc,&$kwota,&$error){
    if(!(isset($lata) && isset($proc) && isset($kwota))) {
        return false;
    }
    if(($lata=="" || $proc=="" || $kwota=="") || !(is_numeric($lata)) || !(is_numeric($proc)) || !(is_numeric($kwota))){
        $error[] = 'Upewnij się że wszystkie wartosci są poprawnie uzupełnione';
    }
    if (count($error) != 0) return false;
    else return true;
}
function licz(&$lata,&$proc,&$kwota,&$error,&$wynik){
    global $rola;
    $lata = intval($lata);
    $proc = intval($proc);
    $kwota = intval($kwota);
    $lmiesiecy = $lata * 12;
    $procDzies = $proc / 100;
    if($rola == 'admin' || ($rola != 'admin' && $kwota < 10000)) {
        $wynik = ($kwota * $procDzies * pow(1 + $procDzies, $lmiesiecy)) / (pow(1 + $procDzies, $lmiesiecy) - 1);
    }else{
        $error[] = 'Tylko administrator może podawać kwoty powyżej 9999!';
    }
}
$lata = null;
$proc = null;
$kwota = null;
$wynik = null;
$error = array();
getParams($lata,$proc,$kwota);
if(sprawdz($lata,$proc,$kwota,$error)) {
        licz($lata,$proc,$kwota,$error,$wynik);
}
include 'widok.php';
?>