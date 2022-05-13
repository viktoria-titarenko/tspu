<?php 
require_once 'application/models/group_model.php';
require_once 'application/core/controller.php';
class groupcontroller extends Controller {
    public function index_action() {
       $this -> view -> generate('group_view.php','template_view.php');
    }

    public function listjson_action() {
        $group = new group_model();
        $group->list();
    }
}