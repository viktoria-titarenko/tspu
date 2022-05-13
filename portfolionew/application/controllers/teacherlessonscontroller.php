<?php 
require_once 'application/models/teacherLessons_model.php';
require_once 'application/core/controller.php';
class teacherlessonscontroller extends Controller {
    public function index_action() {
       $this -> view -> generate('teacherLessons_view.php','template_view.php');
    }

    public function listjson_action() {
        $teacher = new teacherLessons_model();
        $teacher->list();
    }
}