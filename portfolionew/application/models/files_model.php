<?php
require_once "application/core/model.php";

class files_model extends model
{
    function list(){
        if(!isset($_POST["lesson"]) || !is_numeric($_POST["lesson"])) {
            echo json_encode((object)["error" => "error! no lessonid"]);
            return;
        }
        $userId = $_POST["idstudent"];
        $lessonId = $_POST["lesson"];
        $add_new = "select  files.id as 'id', CONCAT(files.name, '.', files.extencion) as 'name', files.date as 'date', marks.description from files
        left join (select Idfile, Idmark from marksandfiles) marks1 on marks1.Idfile = files.id
        left join (select id, description from marks) marks on marks.id = marks1.Idmark
        where files.students_id  =  $userId  and files.lessons_id = $lessonId;" ;
        
        $result = mysqli_query($this->link, $add_new);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($rows);
    }
    function upload(){
        date_default_timezone_set('Asia/Tomsk');
        // проверки
        $fileN = explode('.', $_POST["fileName"]);
        $count_explode = count($fileN);
        $fileExtencion = strtolower($fileN[$count_explode-1]);
        $fileName = $this->removeSymbolsFromString($fileN[0]);
        $filebody = $_POST["filebody"];
        $userId = $_POST["idstudent"];
        $lessonId = $_POST["lesson"];
        $dateNow = date("Y.m.d G:i:s");
        $add_new ="insert into files (name,body,extencion,date, lessons_id, students_id) values ('{$fileName}','{$filebody}', '{$fileExtencion}', '{$dateNow}', {$lessonId}, '{$userId}' );";
        $result = mysqli_query($this->link, $add_new);
        $fileObject = (object)["name"=>$fileName, "extencion"=>$fileExtencion, "data" => $dateNow];
        echo json_encode($fileObject);
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
}