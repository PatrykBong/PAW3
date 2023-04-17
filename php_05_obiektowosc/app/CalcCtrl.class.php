<?php
require_once $conf->root_path.'/lib/smarty/libs/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/CalcForm.class.php';
require_once $conf->root_path.'/app/CalcResult.class.php';

class CalcCtrl{
	private $wynik;
	private $messages;
	private $form;
	
	public function __construct(){
		$this->messages = new Messages();
		$this->form = new CalcForm();
		$this->wynik = new CalcResult();
	}
	
	public function getParams(){
		$this->form->kw = isset($_REQUEST['kw']) ? $_REQUEST['kw'] : null;
		$this->form->pr = isset($_REQUEST['pr']) ? $_REQUEST['pr'] : null;
		$this->form->lt = isset($_REQUEST['lt']) ? $_REQUEST['lt'] : null;
	}
	
	public function validate(){
		if ( ! (isset($this->form->kw) && isset($this->form->pr) && isset($this->form->lt))) {
			return false;
		}

		if ( $this->form->kw == "") {
			$this->messages->addError('Nie podano kwoty pożyczki');
		}
		if ( $this->form->pr == "") {
			$this->messages->addError('Nie podano oprocentowania');
		}
		if ( $this->form->lt == "") {
			$this->messages->addError('Nie podano okresu pożyczki');
		}
		
		if (! $this->messages->isError()) {
			if (! is_numeric( $this->form->kw )) {
				$this->messages->addError('Kwota pożyczki nie jest liczbą całkowitą');
			}
			if (! is_numeric( $this->form->pr )) {
				$this->messages->addError('Oprocentowanie nie jest liczbą całkowitą');
			}
			if (! is_numeric( $this->form->lt )) {
				$this->messages->addError('Okres pożyczki nie jest liczbą całkowitą');
			}	
		}
			
		return ! $this->messages->isError();
	}
	
	
	public function process(){
		$this->getparams();
		
		$this->wynik->wynik = 1;
		//global $role;
		if ($this->validate()) {
			$this->wynik->wynik = 99;
			$this->form->kw = intval($this->form->kw);
			$this->form->pr = intval($this->form->pr)/100;
			$this->form->lt = intval($this->form->lt);
			$this->messages->addInfo('Parametry poprawne.');
			
			for($i=0;$i<$lt;$i++){
				$this->form->kw=$this->form->kw*(1+$this->form->pr);
			}
			$this->form->pr*=100;
			$this->wynik->wynik = $this->form->kw/(12*$this->form->lt);
			
			$this->messages->addInfo('Wykonano obliczenia.');
		}
		$this->generateView();
	}
	
	public function generateView(){
		global $conf;
		
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		
		$smarty->assign('page_title','Kalkulator');
		$smarty->assign('page_description','policzy ci oprocentowanie');
		$smarty->assign('page_header','Znowu kalkulator?');
		
		$smarty->assign('messages',$this->messages);
		$smarty->assign('form',$this->form);
		$smarty->assign('wynik',$this->wynik);
		
		$smarty->display($conf->root_path.'/app/calc.html');
	}

	/**$smarty->assign('app_url',_APP_URL);
	$smarty->assign('root_path',_ROOT_PATH);

	$smarty->assign('infos',$infos);**/
}		