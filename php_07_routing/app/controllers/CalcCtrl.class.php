<?php

namespace app\controllers;

use app\forms\CalcForm;
use app\transfer\CalcResult;

class CalcCtrl{
	private $wynik;
	private $form;
	
	public function __construct(){
		$this->form = new CalcForm();
		$this->wynik = new CalcResult();
	}
	
	public function getParams(){
		$this->form->kw = getFromRequest('kw');
		$this->form->pr = getFromRequest('pr');
		$this->form->lt = getFromRequest('lt');
	}
	
	public function validate(){
		if ( ! (isset($this->form->kw) && isset($this->form->pr) && isset($this->form->lt))) {
			return false;
		}

		if ( $this->form->kw == "") {
			getMessages()->addError('Nie podano kwoty pożyczki');
		}
		if ( $this->form->pr == "") {
			getMessages()->addError('Nie podano oprocentowania');
		}
		if ( $this->form->lt == "") {
			getMessages()->addError('Nie podano okresu pożyczki');
		}
		
		if (! getMessages()->isError()) {
			if (! is_numeric( $this->form->kw )) {
				getMessages()->addError('Kwota pożyczki nie jest liczbą całkowitą');
			}
			if (! is_numeric( $this->form->pr )) {
				getMessages()->addError('Oprocentowanie nie jest liczbą całkowitą');
			}
			if (! is_numeric( $this->form->lt )) {
				getMessages()->addError('Okres pożyczki nie jest liczbą całkowitą');
			}	
		}
			
		return ! getMessages()->isError();
	}
	
	public function action_calcCompute(){

		$this->getParams();
		
		if ($this->validate()) {
			$this->form->kw = intval($this->form->kw);
			$this->form->pr = intval($this->form->pr)/100;
			$this->form->lt = intval($this->form->lt);
			getMessages()->addInfo('Parametry poprawne.');
				
			for($i=0;$i<$this->form->lt;$i++){
				$this->form->kw=$this->form->kw*(1+$this->form->pr);
			}
			$this->form->pr*=100;
			$this->wynik->wynik = $this->form->kw/(12*$this->form->lt);
				
			getMessages()->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
	
	public function action_calcShow(){
		getMessages()->addInfo('Witaj w kalkulatorze');
		$this->generateView();
	}
	
	public function generateView(){
		
		getSmarty()->assign('page_title','Kalkulator');
		getSmarty()->assign('page_description','Policzymy ci oprocentowanie');
		getSmarty()->assign('page_header','Znowu kalkulator?');
					
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('wynik',$this->wynik);
		
		getSmarty()->display('calc.tpl');
	}
}		