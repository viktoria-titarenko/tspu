<?php 
require_once 'application/models/teacher_model.php';
require_once 'application/core/controller.php';
class teachercontroller extends Controller {
    public function index_action() {
       $this -> view -> generate('teacher_view.php','template_view.php');
    }

    public function listjson_action() {
        $teacher = new teacher_model();
        $teacher->list();
    }
}