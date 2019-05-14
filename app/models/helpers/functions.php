<?php

function dd($data){
	echo '<pre>';
	var_dump($data); 
	echo '</pre>';
	die;
}

// проверяет, существует ли изображение (в БД или в форме)
function checkImage($image){
	if($image != null){
		return true;
	} else {
		return false;
	}
}

