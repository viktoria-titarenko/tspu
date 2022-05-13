<?php 
require_once 'application/core/controller.php';
require_once 'application/models/semestr_model.php';
class semestrcontroller extends Controller {
    public function index_action() {
       $this -> view -> generate('semestr_view.php','template_view.php');
    }

    public function listjson_action() {
        $semestr = new semestr_model();
        $semestr->list();
    } 
}