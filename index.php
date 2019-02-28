<?php
/**
 * Created by PhpStorm.
 * User: yaros, kara_sick
 * Date: 2/28/2019
 * Time: 8:10 PM
 */

$tasks = array("a_example.txt"/*, "b_lovely_landscapes.txt", "c_memorable_moments.txt", "d_pet_pictures.txt", "e_shiny_selfies.txt"*/);
foreach($tasks as $task) {
    $task_file = fopen("tasks/" . $task, "r+") or die("Unable to open file!");
    $task_array = array();
    while (($buffer = fgets($task_file)) !== false) {
        array_push($task_array, $buffer);
    }
    $iteration = 0;
    $amount_of_photos = 0;
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
            var_dump($task_element);
            echo "<br />";
        }
    }

    $

    $submission = fopen("submition.txt", "w+") or die("Unable to open file!");
    $txt = "3\n0\n3\n1 2\n";
    fwrite($submission, $txt);
    fclose($submission);
    fclose($task_file);
}
?>