<?php

require_once '../artFunctions.php';
require_once 'config.php';

$id = 2;
$name = "Mail";
$regular = "/Выберите международную олимпиаду:(.*)[\n]ФИО участника\(ов\) в дательном падеже, возраст:\s(.*)[\n]Класс, \(год обучения\):\s(.*)[\n].*[\n]Город, населенный пункт:\s(.*)[\n]Полное название учебного заведения:\s(.*)[\n]Краткое название учебного заведения:\s(.*)[\n]ФИО преподавателя\/ учителя:\s(.*)[\n]ФИО преподавателя\/ учителя в дательном падеже:\s(.*)[\n].*[\n]Электронная почта:\s(.*)[\n]/";
preg_match_all($regular, $text, $matches, PREG_UNMATCHED_AS_NULL);
$actor = "\n";
for ($i = 1; $i < count($matches); $i++) {
    $actor .= $matches[$i][0];
    $actor .= "\t";
    switch ($i) {
        case '1':
            $actor .= "\t" . "\t"; // ТЕМА
            $actor .= artFunctions::mesto($var);
            break;
        case '8':
            $actor .= 'преподавателю' . "\t" . 'За высокое педагогическое мастерство, проявленное в подготовке лауреата олимпиады' . "\t" . date('d.m.Y') . "\t";
            break;
    }
}
artFunctions::save($actor, $matches, $file, $name, $id);

