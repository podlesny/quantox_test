<?php

require_once __DIR__."/../Helpers/helpers.php";

class GetValidator extends Validator{

	protected $params;

	public function __construct($params){
		parent::__construct($params);
	}

	public function validate(){
		$id = $this->params['id'];
		$board = getBoardType($this->params);
		if($board !== _CSM && $board !== _CSMB){
			$result = ['status' => 'error', 'error_code' => 422, 'error_message' => 'Wrong board parameter'];
		}
		else if(!Student::where('id', '=', $id)->count()){
			$result = ['status' => 'error', 'error_code' => 422, 'error_message' => 'No student with given id'];
		}
		else{
			$result = ['status' => 'ok',];
		}
		return $result;
	}
}