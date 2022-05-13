<?php
require_once "application/core/model.php";
class lessons_model extends model
{
    function list(){
        $link = mysqli_connect("88.204.18.157", "test123", "test123","VIKATSPU");
        if(!isset($_POST["semestr"]) || !is_numeric($_POST["semestr"])) {
            echo json_encode((object)["error" => "error! no semestr"]);
            return;
        }
        $userId = $_POST["idstudent"];
        $semestr = $_POST["semestr"];
        $add_new = "select lessons.id,lessons.name from lessons join group_lesson_semestr on lessons.id = group_lesson_semestr.lessonid join students on students.groupId = group_lesson_semestr.studentgroupid where students.id = $userId and group_lesson_semestr.semestr =  $semestr; ";
        $result = mysqli_query($this->link, $add_new);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($rows);
    }
}