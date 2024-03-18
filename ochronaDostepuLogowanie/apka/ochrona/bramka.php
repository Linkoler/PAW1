<?php
require_once dirname(__FILE__).'/../../config.php';
session_start();
$rola = isset($_SESSION['rola']) ? $_SESSION['rola'] : '';
if(empty($rola)){
    include _ROOT_PATH.'/apka/ochrona/login.php';
    exit();
}
