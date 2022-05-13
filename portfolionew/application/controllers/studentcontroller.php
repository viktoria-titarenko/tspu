<?php 
require_once 'application/models/student_model.php';
require_once 'application/core/controller.php';
class studentcontroller extends Controller {
    public function index_action() {
       $this -> view -> generate('student_view.php','template_view.php');
    }

    public function listjson_action() {
        $student = new student_model();
        $student->list();
    }
}