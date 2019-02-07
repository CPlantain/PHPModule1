<?php

function dd($data){
	echo '<pre>';
	var_dump($data); 
	echo '</pre>';
	die;
}

function checkImage($image){
	if($image != null){
		return true;
	} else {
		return false;
	}
}

