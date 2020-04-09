<?php

require_once __DIR__."/../Helpers/helpers.php";

class StudentController{

	public static function getAll(){
		$students = Student::with('grades')->get();
		header(getContentTypeHeader(_CSM));
		echo $students;
	}

	public static function get($params) {
		$validator = new GetValidator($params);
		$result = $validator->validate($params);
		if($result['status'] == 'error'){
			echo json_encode($result);
			return;
		}
		$id = $params['id'];
		$board = getBoardType($params);
		$student = Student::find($id);
		$formatter = FormatterFactory::make($board);
		header(getContentTypeHeader($board));
		echo $student->formattedDataWithBoard($formatter);
	}

	public static function create($params){
		$validator = new CreateValidator($params);
		$result = $validator->validate($params);
		if($result['status'] == 'error'){
			echo json_encode($result);
			return;
		}
		['name' => $name, 'grades' => $grades] = $params;
		$student = Student::create(['name' => $name]);
		foreach($grades as $grade){
			$grade = Grade::create(['value' => $grade, 'student_id' => $student->id]);
		}
		header(getContentTypeHeader(_CSM));
		echo json_encode($student);
	}

}