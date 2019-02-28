<?php
/**
 * Created by PhpStorm.
 * User: yaros
 * Date: 2/28/2019
 * Time: 8:10 PM
 */

$submission = fopen("sub.txt", "w") or die("Unable to open file!");
$txt = "3
0
3
1 2
";
fwrite($submission, $txt);
fclose($submission);