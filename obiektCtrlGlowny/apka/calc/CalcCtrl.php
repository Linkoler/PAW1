<?php
require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/apka/calc/CalcForm.class.php';
require_once $conf->root_path.'/apka/calc/CalcResult.class.php';


class CalcCtrl {

	private $msgs;   
	private $form;   
	private $result; 

	public function __construct(){
		$this->msgs = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	
	public function getParams(){
		$this->form->lata = isset($_REQUEST['liczbaLat']) ? $_REQUEST['liczbaLat'] : null;
		$this->form->proc = isset($_REQUEST['procent']) ? $_REQUEST['procent'] : null;
		$this->form->kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
	}
	
	public function validate() {
		
		if (!(isset($this->form->lata) && isset($this->form->proc) && isset($this->form->kwota))) return false;
		
		if(($this->form->lata=="" || $this->form->proc=="" || $this->form->kwota=="") || !(is_numeric($this->form->lata)) || !(is_numeric($this->form->proc)) || !(is_numeric($this->form->kwota))){
		    $this->msgs->addError('Upewnij się że wszystkie wartosci są poprawnie uzupełnione');
		}
		return ! $this->msgs->isError();
	}
	
	public function process(){

		$this->getParams();
		
		if ($this->validate()) {
				
		    $this->form->lata = intval($this->form->lata);
		    $this->form->proc = intval($this->form->proc);
		    $this->form->kwota = intval($this->form->kwota);
			$this->msgs->addInfo('Parametry poprawne.');
				
			$this->lmiesiecy = $this->form->lata * 12;
			$this->procDzies = $this->form->proc / 100;
			$this->result->result = ($this->form->kwota * $this->procDzies * pow(1 + $this->procDzies, $this->lmiesiecy)) / (pow(1 + $this->procDzies, $this->lmiesiecy) - 1);
			
			$this->msgs->addInfo('Wykonano obliczenia.');
		}

		$this->generateView();
	}
	
	public function generateView(){
		global $conf;
		
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		$smarty->assign('page_title','Kalkulator');
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);
		$smarty->assign('msgs',$this->msgs);
		$smarty->display($conf->root_path.'/apka/calc/calc.html');
	}
}
