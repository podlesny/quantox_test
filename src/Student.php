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

	public function formattedDataWithBoard(Formatter $formatter){
		return $formatter->format($this);
	}

 }
