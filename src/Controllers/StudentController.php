<?php


class StudentController{

	public static function getAll(){
		echo "All students here";
	}

	public static function get($params) {
		$id = intval($params['id']);
		echo "Student number $id";
	}

	public static function create(){

	}

}