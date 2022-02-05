<?php

require_once '../artFunctions.php';
require_once 'config.php';

$id = 2;
$name = "Mail";
$regular = "/.*ФИО .*падеже\):\s(.*)[\n]Возраст участника:\s(.*)[\n]Год.*Название.*работы:\s(.*)[\n]ФИО преподавателя\/руководителя:\s(.*)[\n]ФИО преподавателя.*падеже:\s(.*)[\n]ФИО .*\(если.*нет\"\):\s(.*)[\n]ФИО .*\(если.*нет\"\):\s(.*)[\n]Благодар.*Город.*пункт:\s(.*)[\n]Полное.*заведения:\s(.*)[\n]Краткое.*заведения:\s(.*)[\n]Адрес.*Электронная.*дипломы:\s(.*)[\n]Комментарий.*/sU";
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

