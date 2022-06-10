<?php
require_once "application/core/model.php";
class support_model extends model
{
    function list(){
        $subject = $_POST["subject"];
        $massage = $_POST["text"];
        if ($subject=="" || $subject =='null' ||$massage=="" || $massage=='null'){
            $error = (object)["error" => true, "text" => "Незаполненные поля"];
            echo json_encode($error);
            return;
        }
        else{
        $add_new ="insert into support (title, text) values ('$subject', '$massage');"; 
        $result = mysqli_query($this->link, $add_new);
        mail('89627876028x@gmail.com',$subject, $massage);
        $notification = (object)["notification" => true, "text" => "Успешно отправлено!"];
            echo json_encode($notification);
    }
       
    }
}
