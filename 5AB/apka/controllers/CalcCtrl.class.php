<?php namespace apka\controllers;
use apka\forms\CalcForm;
use apka\transfer\CalcResult;

class CalcCtrl {
    
    private $form;   
    private $result; 
   
    public function __construct(){
        $this->form = new CalcForm();
        $this->result = new CalcResult();
    }
	
	public function getParams(){
		$this->form->lata = getFromRequest('liczbaLat');
		$this->form->proc = getFromRequest('procent');
		$this->form->kwota = getFromRequest('kwota');
	}
	
	public function validate() {
		
		if (!(isset($this->form->lata) && isset($this->form->proc) && isset($this->form->kwota))) return false;
		
		if(($this->form->lata=="" || $this->form->proc=="" || $this->form->kwota=="") || !(is_numeric($this->form->lata)) || !(is_numeric($this->form->proc)) || !(is_numeric($this->form->kwota))){
		    getMessages()->addError('Upewnij się że wszystkie wartosci są poprawnie uzupełnione');
		}
		return ! getMessages()->isError();
	}
	
	public function process(){

		$this->getParams();
		
		if ($this->validate()) {
				
		    $this->form->lata = intval($this->form->lata);
		    $this->form->proc = intval($this->form->proc);
		    $this->form->kwota = intval($this->form->kwota);
		    getMessages()->addInfo('Parametry poprawne.');
				
			$this->lmiesiecy = $this->form->lata * 12;
			$this->procDzies = $this->form->proc / 100;
			$this->result->result = ($this->form->kwota * $this->procDzies * pow(1 + $this->procDzies, $this->lmiesiecy)) / (pow(1 + $this->procDzies, $this->lmiesiecy) - 1);
			
			getMessages()->addInfo('Wykonano obliczenia.');
		}

		$this->generateView();
	}
	
	public function generateView(){
	    getSmarty()->assign('page_title','Kalkulator');
	    getSmarty()->assign('form',$this->form);
	    getSmarty()->assign('res',$this->result);
	    getSmarty()->display('calc.html');
	}
}
