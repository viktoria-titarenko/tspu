<?php 
require_once 'application/core/controller.php';
require_once 'application/models/progress_model.php';
class progresscontroller extends Controller {
    public function index_action() {
       $this -> view -> generate('progress_view.php','template_view.php');
    }
    public function getlesson_action() {
        $semestr = new progress_model();
        $semestr->getlesson();
    } 
    
}