<?php 
require_once 'application/models/studentfromteacher_model.php';
require_once 'application/core/controller.php';
class studentfromteachercontroller extends Controller {
    public function index_action() {
       $this -> view -> generate('studentfromteacher_view.php','template_view.php');
    }
    public function listjson_action() {
        $teacher = new Studentfromteacher_model();
        $teacher->list();
    }
}