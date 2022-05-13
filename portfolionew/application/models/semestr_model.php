<?php
require_once "application/core/model.php";
class semestr_model extends model
{
    function list(){
        $link = mysqli_connect("88.204.18.157", "test123", "test123","VIKATSPU");
        $userId = ($_POST["idstudent"]);
        $add_new = "select semestrquantity from students
        join studentgroups on students.groupId = students.groupId
        where students.id =  $userId 
        and studentgroups.id = students.groupId";
                $result = mysqli_query($this->link, $add_new);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($rows);
    }
   
}
