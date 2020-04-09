# quantox_test
Test taask for quantox

API for system that is responsible for the managing the grades for a list of students

Methods

GET http://quantox_test.test/students
Gets list of all students with their grades

POST http://quantox_test.test/students
Creates a student
Query string parameters
name - Student's name
grades[] - Student's grades

GET http://quantox_test.test/students/{id}
Gets student with given id and his result in given board
Query string parameters
board(optional, default to CSM) - board, according to which the result is calculated. Two values - CSM and CSMB


