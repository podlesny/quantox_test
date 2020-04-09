<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Grade extends Eloquent

{

  	protected $fillable = [
		  'value', 'student_id'
  	];

	public $timestamps = false;


 }
