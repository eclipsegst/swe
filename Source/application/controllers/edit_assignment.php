<?php
//Filename/path = Course/section/assn/pawprint/filename-hash_timestamp.extension
//$path='./uploads/' . $course . '/' . $section . '/' . $assn . '/'; + filename goes here
class EditAssignment extends CI_Controller {
//need to take in strings: course?, assn_name, due_date?
//create directories as needed,
// determine if isSplitBySections: create section directory

	function __construct() {
		parent::__construct();
	
	}

	function create() {
		//Do Stuff
	}

//SCHEMA: /course/assignment/section/$pawprint
	function add_course($course_name) {
		//create course directory
	}
	
	//array
	function add_sections($sections) {
		//create section directory
	}
	
	function add_assignment($assn_name) {
		//create addignment directory
	}

?>
