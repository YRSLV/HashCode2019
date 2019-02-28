<?php
/**
 * Created by PhpStorm.
 * User: yaros
 * Date: 2/28/2019
 * Time: 8:10 PM
 */

$submission = fopen("sub.txt", "w") or die("Unable to open file!");
$txt = "3\n0\n3\n1 2\n";
fwrite($submission, $txt);
fclose($submission);