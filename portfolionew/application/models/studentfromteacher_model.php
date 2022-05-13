<?php
require_once "application/core/model.php";
class studentfromteacher_model extends model
{
    function list(){
        $link = mysqli_connect("88.204.18.157", "test123", "test123","VIKATSPU");
        $groupId =$this->removeSymbolsFromString($_POST["groupId"])   ;
        $add_new = "select id, name from students
        where groupId =  $groupId ;";
        $result = mysqli_query($this->link, $add_new);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($rows);
    }
}
