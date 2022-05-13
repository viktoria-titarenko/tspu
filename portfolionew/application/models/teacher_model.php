<?php
require_once "application/core/model.php";
class teacher_model extends model
{
    function list(){
        $link = mysqli_connect("88.204.18.157", "test123", "test123","VIKATSPU");
        $add_new ="select id, name, position from teacher;";
        $result = mysqli_query($this->link, $add_new);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($rows);
    }
}