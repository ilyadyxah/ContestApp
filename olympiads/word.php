<?php
require_once '../artFunctions.php';
require_once 'config.php';

$id = 3;
$name = "Word";
$regular = "/Олимпиада\s(.*)Тема.*музыки\)\s(.*)Ф.И.О.*возраст\s(.*)Ф.И.*ля\s(.*)Ф.И.*же\s(.*)Контакт.*пункт\)\s(.*)Н.*краткое\):\s(.*)Адрес.*дипломы\s(.*)\s1/sU";
preg_match_all($regular, $text, $matches, PREG_UNMATCHED_AS_NULL);
$actor = "\n";
$matchesTemp = $matches;
for ($i = 1; $i < count($matches); $i++) {
    switch ($i) {
        case '4':
            $matches[$i] = $matchesTemp['6'];
            break;
        case '5':
            $matches[$i] = $matchesTemp['7'];
            break;
        case '6':
            $matches[$i] = $matchesTemp['4'];
            break;
        case '7':
            $matches[$i] = $matchesTemp['5'];
            break;
    }
}
for ($i = 1; $i < count($matches); $i++) {
    switch ($i) {
        case '1':
            $actor .= $matches[$i][0] . "\t"; // Название олимпиады
            break;
        case '2':
            $actor .= $matches[$i][0] . "\t"; // ТЕМА
            $actor .= "\t"; // Вручается
            $actor .= artFunctions::mesto($var);
            break;
        case '3':
            $actor .= $matches[$i][0] . "\t"; // ФИО участника
            $actor .= 'год?' . "\t";          // Год обучения
            break;
        case '4':
            $actor .= $matches[$i][0] . "\t"; // Город
            break;
        case '5':
            $actor .= "\t";                   // Полное уч. заведение
            $actor .= $matches[$i][0] . "\t"; // Уч. заведение
            break;
        case '6':
            $actor .= $matches[$i][0] . "\t"; // Ф.И.О. преподавателя
            break;
        case '7':
            $actor .= $matches[$i][0] . "\t"; // Ф.И.О. в дательном преподавателя
            break;
        case '8':
            $actor .= 'преподавателю' . "\t" . 'За высокое педагогическое мастерство, проявленное в подготовке лауреата олимпиады' . "\t" . date('d.m.Y') . "\t";
            $actor .= $matches[$i][0]; // mail
            break;
    }
}
artFunctions::save($actor, $matches, $file, $name, $id);
