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
        $viewlesson = array();
        for ($i=0; $i < count($object->files); $i++){
            if (($object->files[$i]->user_id)==$id){
                $edecanat_id=($object->files[$i]->edecanat_id);
                break;
            }    
        }
        for ($j=0; $j < count($object->marks); $j++){
            if(($object->marks[$j]->edecanat_id)==$edecanat_id){
                $lesson['discipline'] = ($object->marks[$j]->discipline);
                $lesson['mark_name'] = ($object->marks[$j]->mark_name);
                $lesson['semester'] = ($object->marks[$j]->semester);

                    for ($k=0; $k < count($object->marks); $k++){
                        if($object->marks[$k]->discipline  == $object->marks[$j]->discipline && $object->marks[$k]->mark_name != 'не явился' && $object->marks[$k]->semester  == $object->marks[$j]->semester) {
                            if ($object->marks[$k]->mark_name =="зачтено" or $object->marks[$k]->mark_name =="не зачтено" or $object->marks[$k]->mark_name =="не выбрано"){
                            $lesson['view'] = "Зачёт:";}
                            else{
                                $lesson['view'] = "Экзамен:";   
                            }
                        }
                       }

             
                $obj = (object) ($lesson);
                array_push($lessonmark,$obj);
            }
        }
        /* for ($j=0; $j < count($object->marks); $j++){
            if((($object->marks[$j]->mark_name)=='зачтено') or($object->marks[$j]->mark_name)=='не зачтено'){
                if(count($viewlesson)==0){
                    $view['lesson'] = ($object->marks[$i]->discipline);
                    $view['view'] = 'Зачёт:';
                    $objj = (object) ($view);       
                    array_push($viewlesson, $objj);
                }
                for ($i=0; $i< count($viewlesson); $i++){
                if (($viewlesson[$i]->lesson)!=($object->marks[$j]->discipline)){
                    $view['lesson'] = ($object->marks[$i]->discipline);
                    $view['view'] = 'Зачёт:';
                    $objj = (object) ($view);       
                    array_push($viewlesson, $objj);}}
            }} */

        

            for ($j=0; $j < count($object->marks); $j++){
                if(($object->marks[$j]->edecanat_id)==$edecanat_id){
                    if (!in_array(($object->marks[$j]->semester), $semestr)){
                        array_push($semestr, ($object->marks[$j]->semester));
                    }  
                }
        }
        $objects = (object) ["marks"=>$lessonmark, "semester" => $semestr, "viewlesson" => $viewlesson ];
        echo json_encode($objects);
    
}}