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

 }
