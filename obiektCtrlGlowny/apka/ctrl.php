<?php
require_once dirname (__FILE__).'/../config.php';
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
switch ($action) {
	default : // 'calcView'
		include_once $conf->root_path.'/apka/calc/CalcCtrl.php';
		$ctrl = new CalcCtrl ();
		$ctrl->generateView ();
	break;
	case 'calcCompute' :
		// załaduj definicję kontrolera
		include_once $conf->root_path.'/apka/calc/CalcCtrl.php';
		// utwórz obiekt i uzyj
		$ctrl = new CalcCtrl ();
		$ctrl->process ();
	break;
}
