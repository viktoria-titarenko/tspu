<?php
require_once "application/core/model.php";
class profilestudent_model extends model
{
    function list(){
        $id = $_POST["idstudent"];
        $add_new ="select foto from students where id = $id;";
        $result = mysqli_query($this->link, $add_new);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($rows);
    }
    function getinformation(){
        $id = $_POST["idstudent"];
        $add_new ="select students.name, students.course, studentgroups.faculty, studentgroups.groupnumber,studentgroups.direction from students join studentgroups on students.groupId =studentgroups.id where students.id = $id;";
        $result = mysqli_query($this->link, $add_new);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($rows);
    }
    
}
