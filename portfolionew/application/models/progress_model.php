<?php
require_once "application/core/model.php";
class progress_model extends model
{
    function getlesson(){
        $id = $_POST["idstudent"];
        $rows =file_get_contents('https://portfolio.tspu.edu.ru/zzz/portfolio/meyder.php?gruppa='.$_POST['group']);
        $object = json_decode($rows);
        $edecanat_id = null;
        $lesson = array();
        $lessonmark = array ();
        $semestr = array();
        for ($i=0; $i < count($object->files); $i++){
            if (($object->files[$i]->user_id)==$id){
                $edecanat_id=($object->files[$i]->edecanat_id);
            }    
        }
        for ($j=0; $j < count($object->marks); $j++){
            if(($object->marks[$j]->edecanat_id)==$edecanat_id){
                $lesson['discipline'] = ($object->marks[$j]->discipline);
                $lesson['mark_name'] = ($object->marks[$j]->mark_name);
                $lesson['semester'] = ($object->marks[$j]->semester);
                $obj = (object) ($lesson);
                array_push($lessonmark,$obj);
            }
        }

            for ($j=0; $j < count($object->marks); $j++){
                if(($object->marks[$j]->edecanat_id)==$edecanat_id){
                    if (!in_array(($object->marks[$j]->semester), $semestr)){
                        array_push($semestr, ($object->marks[$j]->semester));
                    }  
                }
        }
        $objects = (object) ["marks"=>$lessonmark, "semester" => $semestr];
        echo json_encode($objects);
    
}}