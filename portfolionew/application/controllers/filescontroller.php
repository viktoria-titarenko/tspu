<?php 
require_once 'application/core/controller.php';
require_once 'application/models/files_model.php';
class filescontroller extends Controller {
    public function index_action() {
       $this -> view -> generate('files_view.php','template_view.php');
    }

    public function listjson_action() {
        $files = new files_model();
        $files->list();
    }

    public function upload_action() {
        $files = new files_model();
        $files->upload();
    }

    public function download_action() {
        $files = new files_model();
        $files->download();
    }
}