<?php

class JSONFormatter extends Formatter{

	public function __construct(){
		parent::__construct();
	}

	public function format(Student $student){
		$array = $student->toArray();
		$array['result'] = $student->CSM() ? "pass" : "fail";
		return json_encode($array);
	}

}