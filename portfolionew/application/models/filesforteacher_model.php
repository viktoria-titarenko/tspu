<?php
require_once "application/core/model.php";

class filesforteacher_model extends model
{
    function list(){
       
        $userId = $_POST["studentId"];
        $lessonId = $_POST["teacherLessonsId"];
        $add_new = "select  files.id as 'id', CONCAT(files.name, '.', files.extencion) as 'name', files.date as 'date', marks.description from files
        left join (select Idfile, Idmark from marksandfiles) marks1 on marks1.Idfile = files.id
        left join (select id, description from marks) marks on marks.id = marks1.Idmark
        where files.students_id  = '". $userId . "' and files.lessons_id = $lessonId;" ;
        $result = mysqli_query($this->link, $add_new);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($rows);
    }
   
    function download(){
        $id =$_GET["id"];
        if ($id==null ) return;
        $add_new =" select name, body, extencion from files where id='{$id}';";
        $result = mysqli_query($this->link, $add_new);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $file = base64_decode(explode(',', $rows[0]["body"])[1]);
        header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
        header('Content-Type: ' . $this->get_mime_type($rows[0]["name"] . "." . $rows[0]["extencion"]));
        header("Cache-Control: public");
        header("Content-Transfer-Encoding: Binary");
        header("Content-Length:" . strlen($file));
        header("Content-Disposition: attachment; filename=" . $rows[0]["name"] . "." . $rows[0]["extencion"]);
        echo $file; 
    }
    function marks(){
        $add_new = "select id, mark from marks;";
        $result = mysqli_query($this->link, $add_new);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($rows);
    }
    function sendmarks(){
        $markId =$_POST["markId"];
        $fileId =$_POST["fileId"];
        $add_new = "select * from marksandfiles where Idfile = $fileId ;"; 
        $result = mysqli_query($this->link, $add_new);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        if (empty($rows)) {
            $add_new = "insert  into marksandfiles (Idmark, Idfile) values($markId, $fileId);";
            $result = mysqli_query($this->link, $add_new);}
        else {
            $add_new = "update marksandfiles set Idmark = $markId where Idfile =$fileId ;";
            $result = mysqli_query($this->link, $add_new);  
        }
       
    }
    function getmarks(){
        $markId =$_POST["markId"];
        $fileId =$_POST["fileId"];
        $add_new = "select marks.description, files.id from marks join marksandfiles on marks.id = marksandfiles.Idmark join files on files.id = marksandfiles.Idfile where marks.id = $markId and files.id = $fileId;";
        $result = mysqli_query($this->link, $add_new);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($rows);

    }
}