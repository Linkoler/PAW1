<?php
require_once dirname(__FILE__).'/../config.php';
require_once _ROOT_PATH.'../lib/smarty/Smarty.class.php';
function getParams(&$form){
    $form['lata'] = isset($_REQUEST['liczbaLat']) ? $_REQUEST['liczbaLat'] : null;
    $form['proc'] = isset($_REQUEST['procent']) ? $_REQUEST['procent'] : null;
    $form['kwota'] = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
}
function validate(&$form,&$infos,&$error){
    if (!(isset($form['lata']) && isset($form['proc']) && isset($form['kwota']))) return false;	
    $infos[] = 'Przekazano parametry.';
    
    if(($form['lata']=="" || $form['proc']=="" || $form['kwota']=="") || !(is_numeric($form['lata'])) || !(is_numeric($form['proc'])) || !(is_numeric($form['kwota']))){
        $error[] = 'Upewnij się że wszystkie wartosci są poprawnie uzupełnione';
    }
    if (count($error) != 0) return false;
    else return true;
}
function licz(&$form,&$infos,&$error,&$wynik){
    $infos [] = 'Parametry poprawne. Wykonuję obliczenia.';
    $form['lata'] = floatval($form['lata']);
    $form['proc'] = floatval($form['proc']);
    $form['kwota'] = floatval($form['kwota']);
    $lmiesiecy = $form['lata'] * 12;
    $procDzies = $form['proc'] / 100;
    $wynik = ($form['kwota'] * $procDzies * pow(1 + $procDzies, $lmiesiecy)) / (pow(1 + $procDzies, $lmiesiecy) - 1);
}
$form = null;
$infos = array();
$wynik = null;
$error = array();
getParams($form);
if(validate($form,$infos,$error)) {
    licz($form,$infos,$error,$wynik);
}
$smarty = new Smarty();
$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Kalkulator');
$smarty->assign('form',$form);
$smarty->assign('wynik',$wynik);
$smarty->assign('error',$error);
$smarty->assign('infos',$infos);
$smarty->display(_ROOT_PATH.'/apka/calc.html');
?>