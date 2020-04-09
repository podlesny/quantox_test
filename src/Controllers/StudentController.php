<?php

class StudentController{

	public static function getAll(){
		$students = Student::with('grades')->get();
		echo $students;
	}

	public static function getContentTypeHeader($board){
		switch($board){
			case _CSMB:{
				return 'Content-Type: text/xml';
			}
			break;
			case _CSM:{
				return 'Content-Type: application/json';
			}
			break;
			default :{
				return 'Content-Type: text/plain';
			}
		}
	}

	public static function get($params) {
		$id = $params['id'];
		$board = array_key_exists('board', $params) ? $params['board'] : _CSM;
		if($board !== _CSM && $board !== _CSMB){
			echo json_encode(['error_code' => 422, 'error_message' => 'Wrong board parameter']);
			return;
		}
		$student = Student::find($id);
		if(!$student){
			echo json_encode(['error_code' => 422, 'error_message' => 'No student with given id']);
			return;
		}
		header(static::getContentTypeHeader($board));
		echo $student->formattedDataWithBoard($board);
	}

	public static function create($params){
		['name' => $name, 'grades' => $grades] = $params;
		$student = Student::create(['name' => $name]);
		foreach($grades as $grade){
			$grade = Grade::create(['value' => $grade, 'student_id' => $student->id]);
		}
		echo json_encode($student->with('grades'));
	}

}