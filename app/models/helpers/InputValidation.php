<?php

// класс для валидации формы

class InputValidation {
	private $error;
	private $required;
	private $valid = false;

	public function __construct(array $required){
		$this->required = $required;
	}

	// проверяет заполненность обязательных полей
	public function checkRequired(){

		foreach ($this->required as $field => $value) {
			if(strlen($value) <= 0){

				$this->error = 'поле ' . $field . ' обязательно для заполнения';
				$this->valid = false;
			} else {
				$this->valid = true;
			}
		}
	}

	// показывает, валидна ли проверяемая форма
	public function isValid(){
		return $this->valid;
	}

	// выводит ошибки
	public function ShowError(){
		echo $this->error;
	}
}