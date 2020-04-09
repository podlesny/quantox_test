<?php

abstract class Formatter{

	public function __construct(){
	}

	abstract public function format(Student $student);
}