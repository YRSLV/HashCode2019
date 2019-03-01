<?php
/**
 * Created by PhpStorm.
 * User: yaros, kara_sick
 * Date: 2/28/2019
 * Time: 8:10 PM
 */
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 900);

$tasks = array(//"a_example.txt", 
                "b_lovely_landscapes.txt"/*, 
                "c_memorable_moments.txt", 
                "d_pet_pictures.txt", 
                "e_shiny_selfies.txt"*/);
// $task_H_elements = array();
// $task_V_elements = array();
$task_elements = array();
$tag_num = array();
$slides = array();
$amount_of_slides = 0;
$txt = "";

foreach($tasks as $task) {
    $task_file = fopen("tasks/" . $task, "r+") or die("Unable to open file!");
    $task_array = array();
    while (($buffer = fgets($task_file, 8192)) !== false) {
        array_push($task_array, $buffer);
    }
    $iteration = 0;
    $amount_of_photos = 0;

    function maxVal($arr, $orientation = "H") {
        $tag_num = array();
        $max_tags = 0;
        $max_key = 0;
        // echo $orientation . ": ";
        foreach ($arr as $key => $value) {
            if($value["orientation"] === $orientation) {
                // array_push($tag_num, $value["amount_of_tags"]);
                if($value["amount_of_tags"] >= $max_tags) {
                    $max_tags = $value["amount_of_tags"];
                    $max_key = $key;
                    // echo $key . " ";
                }
            }
        }
        // echo "<br />";
        // $max_tagNum = array_keys($tag_num, max($tag_num));
        // echo $max_tagNum[0] . "<br />";
        // return $max_tagNum[0];
        return $max_key;
    }

    function CheckOrientation($element) {
        if($element["orientation"] === "H") {
            return "H";
        } else {
            return "V";
        }
    }

    function CreateSlide($task_elems, $orientation = "H") {
        $Slide_id = maxVal($task_elems, $orientation);
        return $Slide_id;
    }


    foreach($task_array as $task_array_element) {
        if($iteration === 0) {
            $amount_of_photos = intval($task_array);
            $iteration++;
        } else {
            $task_array_element = explode(" ", $task_array_element, 3);
            $task_element["orientation"] = $task_array_element[0];
            $task_element["amount_of_tags"] = intval($task_array_element[1]);
            $task_element["tags"] = $task_array_element[2];
            $task_element["tags"] = explode(" ", $task_element["tags"]);
            array_push($task_elements, $task_element);
            /*if($task_element["orientation"] === "H") {
                array_push($task_H_elements, $task_element);
            } else {
                array_push($task_V_elements, $task_element);
            }*/
        }
    }

    // var_dump($task_elements);
    // echo "<br />";
    // echo "<br />";
    $iteration = 0;
    while($task_elements != NULL) {
        $iteration++;
        // var_dump($task_elements);
        // echo "<br />";
        $Slide_id = maxVal($task_elements);
        // echo "slide: $iteration is $Slide_id" . "<br />";
        unset($task_elements[$Slide_id]);
        // array_push($slides, strval($Slide_id));
        $txt .= $Slide_id . "\n";
        $amount_of_slides++;
        // echo "<br />";
        if($task_elements != NULL) {
            // var_dump($task_elements);
            // echo "<br />";
            $Slide_id_1 = maxVal($task_elements, "V");
            unset($task_elements[$Slide_id_1]);
            // var_dump($task_elements);
            // echo "<br />";
            $Slide_id_2 = maxVal($task_elements, "V");
            unset($task_elements[$Slide_id_2]);
            if($Slide_id_1 != $Slide_id_2) {
                $iteration++;
                // echo "slide: $iteration is $Slide_id_1, $Slide_id_2" . "<br />";
                $txt .= $Slide_id_1 . " ";
                $txt .= $Slide_id_2 . "\n";
                $amount_of_slides++;
                // echo "<br />";
            }
        }
    }
    $txt = $amount_of_slides . "\n" . $txt;
    echo "succes";

    /*var_dump($task_elements);
    echo "<br />";
    $current_max_id = maxVal($task_elements);
    $current_max = $task_elements[$current_max_id];
    var_dump($current_max);
    echo "<br />";
    echo CheckOrientation($current_max);
    echo "<br />";

    if(CheckOrientation($current_max) === 1) {
        $slide_H_id = $current_max_id;
        unset($array[$current_max_id]);
        $txt = $current_max_id . "\n";
        $amount_of_slides++;
    }// else {
    //    $slide_V_id[0] = $current_max_id;
    //}*/
    
    /*
    if($task_elements[maxVal($task_elements)]["orientation"] === "H") {
        $max_current_Hslide = $task_elements[maxVal($task_elements)];
    } else {
        $max_current_firstelement_Vslide = $task_elements[maxVal($task_elements)];
    }
    */

    $submission = fopen("submition.txt", "w+") or die("Unable to open file!");
    fwrite($submission, $txt);
    fclose($submission);
    fclose($task_file);
}