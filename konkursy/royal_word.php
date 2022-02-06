<?php
require_once '../artFunctions.php';
require_once 'config.php';

$id = 1;
$name = "Mail-royal";
$regular = "/.*Ф.И.О.*преподавателя\)\s(.*)[\n]Название.*работы\s(.*)[\n]Ф.И.*ля\s(.*)[\n]Ф.И.*же\s(.*)[\n]Ф.И.*ру\s(.*)[\n]Ф.И.*же\s(.*)[\n]Благодар.*пункт\)\s(.*)[\n]Наим.*краткое\):\s(.*)[\n]Адрес.*дипломы\s(.*)\s1/sU";
preg_match_all($regular, $text, $matches, PREG_UNMATCHED_AS_NULL);
$matches[3][0] = 'Преподаватель: ' . $matches[3][0];
$matches[5][0] = 'Иллюстратор: ' . $matches[5][0];
$actor = "\n";
$excel = [];
for ($i = 1; $i < count($matches); $i++) {
//    $actor .= $matches[$i][0] . "\t";
    switch ($i) {
        case '1':
            $excel[] = $matches[$i][0] . "\t"; //ФИО
            $excel[] = artFunctions::mesto($var); //Место
            break;
        case '2':
            $excel[] = ".\t"; //Возраст
            $excel[] = $var['age'] . "\t"; //Категория
            $excel[] = $var['nominate'] . "\t"; //Номинация
            $excel[] = $matches[$i][0] . "\t"; //Работа
            break;
        case '3':
            $excel[] = $matches[$i][0] . "\t"; //ФИО преп
            break;
        case '4':
            $excel[] = $matches[$i][0] . "\t"; //ФИО преп дат
            break;
        case '5':
            $excel[] = $matches[$i][0] . "\t"; //ФИО илюстр
            break;
        case '6':
            $excel[] = $matches[$i][0] . "\t"; //ФИО илюстр дат
            break;
        case '7':
            $excel[] = $matches[$i][0] . "\t"; //Город
            break;
        case '8':
            $excel[] = "\t"; //Уч.заведение полн
            $excel[] = $matches[$i][0] . "\t"; //Уч.заведение кратк
            $excel[] = 'преподавателю' . "\t" . 'иллюстратору' . "\t" . 'За высокое педагогическое мастерство, проявленное в подготовке лауреата олимпиады' . "\t" . 'За высокое исполнительское мастерство, проявленное в подготовке лауреата к конкурсу' . "\t" . date('d.m.Y') . "\t";
            break;
        case '9':
            $excel[] = $matches[$i][0] . "\t"; //mail
            break;
    }
}
$actor = implode($excel);
artFunctions::save($actor, $matches, $file, $name, $id);

