<?php 
require_once 'application/core/controller.php';
require_once 'application/models/profilestudent_model.php';
class profilestudentcontroller extends Controller {
    public function index_action() {
       $this -> view -> generate('profilestudent_view.php','template_view.php');
    }
    public function listjson_action() {
        $files = new profilestudent_model();
        $files->list();
    }
    public function getinformation_action() {
        $files = new profilestudent_model();
        $files->getinformation();
    }
    
}