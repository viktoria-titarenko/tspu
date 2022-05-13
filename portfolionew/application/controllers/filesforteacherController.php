<?php 
require_once 'application/core/controller.php';
require_once 'application/models/filesforteacher_model.php';
class   filesforteachercontroller extends Controller {
    public function index_action() {
       $this -> view -> generate('filesforteacher_view.php','template_view.php');
    }

    public function listjson_action() {
        $files = new filesforteacher_model();
        $files->list();
    }

    public function download_action() {
        $files = new filesforteacher_model();
        $files->download();
    }
    public function marks_action() {
        $files = new filesforteacher_model();
        $files->marks();
    }
    public function getmarks_action() {
        $files = new filesforteacher_model();
        $files->getmarks();
    }
    public function sendmarks_action() {
        $files = new filesforteacher_model();
        $files->sendmarks();
    }

}