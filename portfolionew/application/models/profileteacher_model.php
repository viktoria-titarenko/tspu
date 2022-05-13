<?php
require_once "application/core/model.php";
class profileteacher_model extends model
{
    function list(){
        $id = $_POST["idteacher"];
        $add_new ="select foto from teacher where id = $id;";
        $result = mysqli_query($this->link, $add_new);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($rows);
    }
    function getinformation(){
        $id = $_POST["idteacher"];
        $add_new ="select name, position from teacher where id = $id;";
        $result = mysqli_query($this->link, $add_new);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($rows);
    }
    
}