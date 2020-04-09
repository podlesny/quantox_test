<?php

abstract class Validator{

	protected $params;

	public function __construct($params){
		$this->params = $params;
	}

	abstract public function validate();
}