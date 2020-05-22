# quantox_test
Test task for quantox

API for system that is responsible for the managing the grades for a list of students


Installation

1)Clone a repo

2)run composer install


Methods


<pre>GET http://quantox_test.test/students</pre>

Gets list of all students with their grades


<pre>POST http://quantox_test.test/students</pre>

Creates a student

Query string parameters

name - Student's name

grades[] - Student's grades


<pre>GET http://quantox_test.test/students/{id}</pre>

Gets student with given id and his result in given board

Query string parameters

board(optional, default to CSM) - board, according to which the result is calculated. Two values - CSM and CSMB


