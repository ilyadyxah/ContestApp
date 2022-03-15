<?php

$ajaxData = json_decode(file_get_contents('php://input'), true);
$text = $ajaxData['text'];
$filePath = 'E:\ARTVICTORY\Олимпиады\Auto\olympiads.txt';