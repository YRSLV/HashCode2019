<?php
/**
 * Created by PhpStorm.
 * User: yaros, kara_sick
 * Date: 2/28/2019
 * Time: 8:10 PM
 */

$tasks = array("a_example.txt", "b_lovely_landscapes.txt", "c_memorable_moments.txt", "d_pet_pictures.txt", "e_shiny_selfies.txt");
foreach($tasks as $task) {
    $task_file = fopen($tasks, "r+") or die("Unable to open file!");
    $submission = fopen("submition.txt", "w+") or die("Unable to open file!");
    $txt = "3\n0\n3\n1 2\n";
    fwrite($submission, $txt);
    fclose($submission);
    fclose($task_file);
}
?>