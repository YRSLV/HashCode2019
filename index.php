<?php
/**
 * Created by PhpStorm.
 * User: yaros
 * Date: 2/28/2019
 * Time: 8:10 PM
 */

$submission = fopen("sub.txt", "w") or die("Unable to open file!");
$txt = "4
H 3 cat beach sun
V 2 selfie smile
V 2 garden selfie
H 2 garden cat";
fwrite($submission, $txt);
fclose($submission);