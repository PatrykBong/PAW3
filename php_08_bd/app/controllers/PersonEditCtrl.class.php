<?php

namespace app\controllers;

use app\forms\PersonEditForm;
use DateTime;
use PDOException;

class PersonEditCtrl {

	private $form;

	public function __construct(){
		$this->form = new PersonEditForm();
	}

	public function validateSave() {
		$this->form->kw = getFromRequest('kwota',true,'Błędne wywołanie aplikacji');
		$this->form->op = getFromRequest('oprocentowanie',true,'Błędne wywołanie aplikacji');
		$this->form->lt = getFromRequest('lata',true,'Błędne wywołanie aplikacji');

		if ( getMessages()->isError() ) return false;

		if (empty(trim($this->form->kw))) {
			getMessages()->addError('Wprowadź imię');
		}
		if (empty(trim($this->form->op))) {
			getMessages()->addError('Wprowadź nazwisko');
		}
		if (empty(trim($this->form->lt))) {
			getMessages()->addError('Wprowadź datę urodzenia');
		}

		if ( getMessages()->isError() ) return false;
		$date = date('m-d-Y h:i:s', time());
		if ( $date === false ){
			getMessages()->addError('Zły format daty. Przykład: 2015-12-20');
		}
		
		return ! getMessages()->isError();
	}
	
	public function action_personNew(){
		$this->generateView();
	}
	
	public function action_personEdit(){
			try {
				// 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
				$record = getDB()->get("person", "*",[
					"idperson" => $this->form->id
				]);
				// 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
				$this->form->id = $record['idperson'];
				$this->form->name = $record['name'];
				$this->form->surname = $record['surname'];
				$this->form->birthdate = $record['birthdate'];
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas odczytu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	

		$this->generateView();		
	}

	public function action_personDelete(){		
		// 1. walidacja id osoby do usuniecia
		if ( $this->validateEdit() ){
			
			try{
				// 2. usunięcie rekordu
				getDB()->delete("person",[
					"idperson" => $this->form->id
				]);
				getMessages()->addInfo('Pomyślnie usunięto rekord');
			} catch (PDOException $e){
				getMessages()->addError('Wystąpił błąd podczas usuwania rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}	
		}
		
		// 3. Przekierowanie na stronę listy osób
		forwardTo('personList');		
	}

	public function action_personSave(){
			
		// 1. Walidacja danych formularza (z pobraniem)
		if ($this->validateSave()) {
			// 2. Zapis danych w bazie
			try {
				
				//2.1 Nowy rekord
				if ($this->form->id == '') {
					//sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
					$count = getDB()->count("person");
					if ($count <= 20) {
						getDB()->insert("person", [
							"name" => $this->form->name,
							"surname" => $this->form->surname,
							"birthdate" => $this->form->birthdate
						]);
					} else { //za dużo rekordów
						// Gdy za dużo rekordów to pozostań na stronie
						getMessages()->addInfo('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
						$this->generateView(); //pozostań na stronie edycji
						exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
					}
				} else { 
				//2.2 Edycja rekordu o danym ID
					getDB()->update("person", [
						"name" => $this->form->name,
						"surname" => $this->form->surname,
						"birthdate" => $this->form->birthdate
					], [ 
						"idperson" => $this->form->id
					]);
				}
				getMessages()->addInfo('Pomyślnie zapisano rekord');

			} catch (PDOException $e){
				getMessages()->addError('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
				if (getConf()->debug) getMessages()->addError($e->getMessage());			
			}
			
			// 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
			forwardTo('personList');

		} else {
			// 3c. Gdy błąd walidacji to pozostań na stronie
			$this->generateView();
		}		
	}
	
	public function generateView(){
		getSmarty()->assign('form',$this->form); // dane formularza dla widoku
		getSmarty()->display('PersonEdit.tpl');
	}
}
 