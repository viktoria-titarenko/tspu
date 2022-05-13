<?php
require_once "application/core/model.php";
class teacherLessons_model extends model
{
    function list(){
        $link = mysqli_connect("88.204.18.157", "test123", "test123","VIKATSPU");
        $teacherId =$_POST["idteacher"]   ;
        $add_new = "select lessons.id,lessons.name from lessons
        join teacher on lessons.teacher = teacher.id
        where teacher.id =  $teacherId ;";
        $result = mysqli_query($this->link, $add_new);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($rows);
    }
}
