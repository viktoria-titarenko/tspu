<?php
require_once "application/core/model.php";
class authorization_model extends model
{
    function list(){
        $login =$this->removeSymbolsFromString($_POST["login"]);
        $password =$this->removeSymbolsFromString($_POST["password"]);
        $add_new = "select id_student from passwords_students
        where login = SHA2('$login',256) and password = SHA2('$password',256);";
        $result = mysqli_query($this->link, $add_new);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        if (empty($rows)){
            $add_new = "select id_teacher from passwords_teachers
        where login = SHA2('$login',256) and password = SHA2('$password',256);";
        $result = mysqli_query($this->link, $add_new);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        if (empty($rows)){
            $error = (object)["error" => true, "text" => "Неверный логин или пароль"];
            echo json_encode($error);
            return;
        }
        else{
        echo json_encode($rows);
        }
        }
        else{
            echo json_encode($rows);
        }
    }
}