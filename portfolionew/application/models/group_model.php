<?php
require_once "application/core/model.php";
class group_model extends model
{
    function list(){
        $link = mysqli_connect("88.204.18.157", "test123", "test123","VIKATSPU");
        $teacherLessonsId =$this->removeSymbolsFromString($_POST["teacherLessonsId"]);
        $add_new = "select studentgroups.groupnumber, studentgroups.id from studentgroups
        join group_lesson_semestr on studentgroups.id = group_lesson_semestr.studentgroupid
        where group_lesson_semestr.lessonid =  $teacherLessonsId ;";
        $result = mysqli_query($this->link, $add_new);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($rows);
    }
}
