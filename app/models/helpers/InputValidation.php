<?php

class InputValidation {

	public static function checkLength($fields){

		foreach ($fields as $field => $value) {
			if(strlen($value) <= 0){

				$error = 'поле ' . $field . ' обязательно для заполнения';
				return $error;

			} else {
				return true;
			}
		}
	}
}