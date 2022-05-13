<?php 
require_once 'application/models/support_model.php';
require_once 'application/core/controller.php';
class supportcontroller extends Controller {
    public function index_action() {
       $this -> view -> generate('support_view.php','template_view.php');
    }

    public function listjson_action() {
        $teacher = new support_model();
        $teacher->list();
    }
}