<?php
require_once 'init.php';
switch ($action) {
    default : 
        $ctrl = new apka\controllers\CalcCtrl();
        $ctrl->generateView ();
        break;
    case 'calcCompute' :
        $ctrl = new apka\controllers\CalcCtrl();
        $ctrl->process ();
        break;
}
