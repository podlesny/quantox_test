<?php

require __DIR__."/../Helpers/helpers.php";

class StudentController{

	public static function getAll(){
		$students = Student::with('grades')->get();
		echo $students;
	}

	public static function validate($params){
		$id = $params['id'];
		$board = array_key_exists('board', $params) ? $params['board'] : _CSM;
		if($board !== _CSM && $board !== _CSMB){
			$result = ['status' => 'error', 'error_code' => 422, 'error_message' => 'Wrong board parameter'];
		}
		$student = Student::find($id);
		if(!$student){
			$result = ['status' => 'error', 'error_code' => 422, 'error_message' => 'No student with given id'];
		}
		else{
			$result = ['status' => 'ok', 'data' => [
				'student' => $student,
				'board' => $board
			]];
		}
		return $result;
	}

	public static function get($params) {
		$result = static::validate($params);
		if($result['status'] == 'error'){
			echo json_encode($result);
			return;
		}
		['student' => $student, 'board' => $board] = $result['data'];
		$formatter = FormatterFactory::make($board);
		header(getContentTypeHeader($board));
		echo $student->formattedDataWithBoard($formatter);
	}

	public static function create($params){
		['name' => $name, 'grades' => $grades] = $params;
		$student = Student::create(['name' => $name]);
		foreach($grades as $grade){
			$grade = Grade::create(['value' => $grade, 'student_id' => $student->id]);
		}
		echo json_encode($student);
	}

}