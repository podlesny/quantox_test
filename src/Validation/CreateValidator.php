<?php

class CreateValidator extends Validator{

	protected $params;

	public function __construct($params){
		parent::__construct($params);
	}

	public function validate(){
		if(!array_key_exists('name', $this->params)){
			$result = ['status' => 'error', 'error_code' => 422, 'error_message' => 'Missing name parameter'];
		}
		else{
			$result = ['status' => 'ok',];
		}
		return $result;
	}
}