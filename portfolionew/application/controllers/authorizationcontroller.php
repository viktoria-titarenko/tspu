<?php 
require_once 'application/models/authorization_model.php';
require_once 'application/core/controller.php';
class authorizationcontroller extends Controller {
    public function index_action() {
       $this -> view -> generate('authorization_view.php','template_view.php');
    }

    public function listjson_action() {
        $authorization = new authorization_model();
        $authorization->list();
    }
}