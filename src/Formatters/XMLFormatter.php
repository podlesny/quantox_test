<?php

class XMLFormatter extends Formatter{

	public function __construct(){
		parent::__construct();
	}

	public function format(Student $student){
		$array = array_flip($student->toArray());
		$root = new SimpleXMLElement('<root/>');
		$root->addChild('student');
		$xml = $root->student;
		array_walk_recursive($array, array ($xml,'addChild'));
		$xml->addChild('grades');
		$grades = $xml->grades;
		foreach($student->grades as $grade){
			$grades->addChild('grade', $grade->value);
		}
		$xml->addChild('result', $student->CSMB() ? "pass" : "fail");
		return $root->asXML();
	}

}