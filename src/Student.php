<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Student extends Eloquent

{

  	protected $fillable = [
		'name',
	];

	public $timestamps = false;

	public function grades() {
		return $this->hasMany('Grade');
	}

	public function CSM() {
		$average = $this->grades->avg('value');
		return $average > 7;
	}

	public function CSMB(){
		$max = $this->grades->max('value');
		return $max > 8;
	}

	public function xml_encode(){
		$array = array_flip($this->toArray());
		$root = new SimpleXMLElement('<root/>');
		$root->addChild('student');
		$xml = $root->student;
		array_walk_recursive($array, array ($xml,'addChild'));
		$xml->addChild('grades');
		$grades = $xml->grades;
		foreach($this->grades as $grade){
			$grades->addChild('grade', $grade->value);
		}
		$xml->addChild('result', $this->CSMB() ? "pass" : "fail");
		return $root->asXML();
	}

	public function json_encode(){
		$this['result'] = $this->CSM() ? "pass" : "fail";
		return json_encode($this);
	}

	public function formattedDataWithBoard($board){
		switch($board){
			case _CSM: {
				return $this->json_encode();
			}
			case _CSMB: {
				return $this->xml_encode();
			}
		}
	}

 }
