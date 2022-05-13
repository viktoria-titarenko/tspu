<?php 
require_once 'application/core/controller.php';
require_once 'application/models/profileteacher_model.php';
class profileteachercontroller extends Controller {
    public function index_action() {
       $this -> view -> generate('profileteacher_view.php','template_view.php');
    }
    public function listjson_action() {
        $files = new profileteacher_model();
        $files->list();
    }
    public function getinformation_action() {
        $files = new profileteacher_model();
        $files->getinformation();
    }
    
}