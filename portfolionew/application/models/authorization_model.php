<?php
require_once "application/core/model.php";
class authorization_model extends model
{
    function getstudent(){
        $this->link = mysqli_connect("88.204.18.157", "test123", "test123","vikaedecanat");
        $login =$this->removeSymbolsFromString($_POST["login"]);
        $password =$this->removeSymbolsFromString($_POST["password"]);
        $add_new = "select FIO,KodST,act from student where loginST = '$login' and pasST = $password;";
        $result = mysqli_query($this->link, $add_new);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        if (empty($rows)){
            $add_new = "select last_name,first_name,middle_name,id,act from teacher where loginst = '$login' and passt = '$password';";
             $result = mysqli_query($this->link, $add_new);
            $rows = $result->fetch_all(MYSQLI_ASSOC);  
            if (empty($rows)){
            $error = (object)["error" => true, "text" => "Неверный логин или пароль"];
            echo json_encode($error);
            return;}
            else {
                $last_name = $rows[0]["last_name"];
                $first_name = $rows[0]["first_name"];
                $middle_name = $rows[0]["middle_name"];
                $id =$rows[0]["id"]; 
                $act = $rows[0]["act"];
                $link1 = mysqli_connect("88.204.18.157", "test123", "test123","VIKATSPU");
                $add_new ="select * from users where edecanat_id = $id;";
                $result = mysqli_query($link1, $add_new);
                $rows = $result->fetch_all(MYSQLI_ASSOC);
                if (empty($rows)){
                    $add_new1 = "insert into users (edecanat_id, loginST, pasST, position, act) values ($id,'$login', '$password', 2, $act)"; 
                    $result = mysqli_query($link1, $add_new1);
                }
                    else{
                        if (($rows[0]["edecanat_id"]!=$id) OR ($rows[0]["loginST"]!=$login) or ($rows[0]["pasST"]!=$password)){
                            $add_new ="update users set loginSt=$login, $pasST = $password WHERE edecanat_id = $id ;";
                        }
                        $add_new ="select foto from students where id = 1;";
                        $result = mysqli_query($link1, $add_new);
                        $rows = $result->fetch_all(MYSQLI_ASSOC);
                        $img = $rows[0]["foto"];
                        $add_new ="select * from teacher where id = $id;";
                        $result = mysqli_query($link1, $add_new);
                        $rows = $result->fetch_all(MYSQLI_ASSOC);
                        if (empty($rows)){
                            $FIO = $last_name." ".$first_name." ".$middle_name;
                            $add_new1 = "insert into teacher (id,name,foto)  values ($id,'$FIO','$img');"; 
                            $result = mysqli_query($link1, $add_new1);  
                            $add_new1 = "insert into passwords_teachers (login,password,id_teacher)  values (SHA2('$login',256),SHA2('$password',256),$id);";
                            $result = mysqli_query($link1, $add_new1);        
                
            }
            $authorization = new authorization_model();
            $authorization->list();}}
        }
        else{
        $KodST= $rows[0]["KodST"];
        $FIO = $rows[0]["FIO"];
        $act = $rows[0]["act"];
        $rowss =file_get_contents('https://portfolio.tspu.edu.ru/zzz/portfolio/meyder.php?gruppa=493');
        $object = json_decode($rowss);
        $idst = null;
        for ($i=0; $i < count($object->files); $i++){
            if (($object->files[$i]->edecanat_id)==$KodST){
                $idst=($object->files[$i]->user_id);
            }   
        }
        $link1 = mysqli_connect("88.204.18.157", "test123", "test123","VIKATSPU");
        $add_new ="select * from users where edecanat_id = $KodST;";
        $result = mysqli_query($link1, $add_new);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        
        if (empty($rows)){
            $add_new1 = "insert into users (edecanat_id, loginST, pasST, position, act) values ($KodST,'$login', '$password', 1, $act)"; 
            $result = mysqli_query($link1, $add_new1);  
        }
        else{
        if (($rows[0]["edecanat_id"]!=$KodST) OR ($rows[0]["loginST"]!=$login) or ($rows[0]["pasST"]!=$password)){
            $add_new ="update users set loginSt=$login, $pasST = $password WHERE edecanat_id = $KodST ;";
        }
        $add_new ="select foto from students where id = 1;";
        $result = mysqli_query($link1, $add_new);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $img = $rows[0]["foto"];
        $add_new ="select * from students where id = $idst;";
        $result = mysqli_query($link1, $add_new);
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        
        if (empty($rows)){
            $add_new1 = "insert into students (id,name,groupId,foto, course)  values ($idst,'$FIO', 2, '$img',3);"; 
            $result = mysqli_query($link1, $add_new1);  
            $add_new1 = "insert into passwords_students (login,password,id_student)  values (SHA2('$login',256),SHA2('$password',256),$idst);"; 
            $result = mysqli_query($link1, $add_new1);
        } 
        $authorization = new authorization_model();
        $authorization->list();
        }

    }
    }
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
