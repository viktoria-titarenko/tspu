<?php 
require_once 'application/core/controller.php';
require_once 'application/models/lessons_model.php';
class   lessonscontroller extends Controller {
    public function index_action() {
       $this -> view -> generate('lessons_view.php','template_view.php');
    }
    public function listjson_action() {
        $lessons = new lessons_model();
        $lessons->list();
    } 
}