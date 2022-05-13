<?php 
require_once 'application/core/controller.php';
class maincontroller extends Controller {
    public function index_action() {
       $this -> view -> generate('main_view.php','template_view.php');
    }
}