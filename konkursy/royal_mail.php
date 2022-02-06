<?php

require_once '../artFunctions.php';
require_once 'config.php';

$id = 1;
$name = "Mail-royal";
$regular = "/.*ФИО .*падеже\):\s(.*)[\n]Возраст участника:\s(.*)[\n]Год.*Название.*работы:\s(.*)[\n]ФИО преподавателя\/руководителя:\s(.*)[\n]ФИО преподавателя.*падеже:\s(.*)[\n]ФИО .*\(если.*нет\"\):\s(.*)[\n]ФИО .*\(если.*нет\"\):\s(.*)[\n]Благодар.*Город.*пункт:\s(.*)[\n]Полное.*заведения:\s(.*)[\n]Краткое.*заведения:\s(.*)[\n]Адрес.*Электронная.*дипломы:\s(.*)[\n]Комментарий.*/sU";
preg_match_all($regular, $text, $matches, PREG_UNMATCHED_AS_NULL);
$actor = "\n";

$matches[4][0] = 'Преподаватель: ' . $matches[4][0];
$matches[6][0] = 'Иллюстратор: ' . $matches[6][0];

for ($i = 1; $i < count($matches); $i++) {
    $actor .= $matches[$i][0] . "\t";
    switch ($i) {
        case '1':
            $actor .= artFunctions::mesto($var);
            break;
        case '2':
            $actor .= $var['age'] . "\t";
            $actor .= $var['nominate'] . "\t";
            break;
        case '10':
            $actor .= 'преподавателю' . "\t" . 'иллюстратору' . "\t" . 'За высокое педагогическое мастерство, проявленное в подготовке лауреата олимпиады' . "\t" . 'За высокое исполнительское мастерство, проявленное в подготовке лауреата к конкурсу' . "\t" . date('d.m.Y') . "\t";
            break;
    }
}
artFunctions::save($actor, $matches, $file, $name, $id);

