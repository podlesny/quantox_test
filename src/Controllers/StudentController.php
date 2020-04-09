<?php

// require "../Student.php";
// require "../Grade.php";

class StudentController{

	public static function getAll(){

		echo "All students here";
	}

	public static function get($params) {
		$id = intval($params['id']);
		echo "Student number $id";
	}

	public static function create($params){
		['name' => $name, 'grades' => $grades] = $params;
		$student = Student::Create(['name' => $name]);
		$student->save();
		foreach($grades as $grade){
			$grade = Grade::create(['value' => $grade, 'student_id' => $student->id]);
			// $grade->student_id = $student->id;
			$grade->save();
		}
	}

}