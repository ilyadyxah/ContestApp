<?php
require_once '../Classes/DataExport.php';
require_once '../Classes/Places.php';
require_once 'config.php';

$nameId = 3;
$contestName = "Word"; // Индекс со значением имени в массиве совпадений.
$regular = "/Олимпиада\s(.*)Тема.*музыки\)\s(.*)Ф.И.О.*возраст\s(.*)Ф.И.*ля\s(.*)Ф.И.*же\s(.*)Контакт.*пункт\)\s(.*)Н.*краткое\):\s(.*)Адрес.*дипломы\s(.*)\s1/sU";
preg_match_all($regular, $text, $matches, PREG_UNMATCHED_AS_NULL);
$mainString = "\n";

// Перестановка значений массива найденных совпадений для соответствия общему шаблону CSV колонок.
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
// Составление строки из массива совпадений для дальнейшей записи в CSV файл.
for ($i = 1; $i < count($matches); $i++) {
    switch ($i) {
        case '1':
            $mainString .= $matches[$i][0] . "\t"; // Название олимпиады
            break;
        case '2':
            $mainString .= $matches[$i][0] . "\t"; // ТЕМА
            $mainString .= "\t"; // Вручается
            $mainString .= (new Places($ajaxData))->getPlace();
            break;
        case '3':
            $mainString .= $matches[$i][0] . "\t"; // ФИО участника
            $mainString .= 'год?' . "\t";          // Год обучения
            break;
        case '4':
            $mainString .= $matches[$i][0] . "\t"; // Город
            break;
        case '5':
            $mainString .= "\t";                   // Полное уч. заведение
            $mainString .= $matches[$i][0] . "\t"; // Уч. заведение
            break;
        case '6':
            $mainString .= $matches[$i][0] . "\t"; // Ф.И.О. преподавателя
            break;
        case '7':
            $mainString .= $matches[$i][0] . "\t"; // Ф.И.О. в дательном преподавателя
            break;
        case '8':
            $mainString .= 'преподавателю' . "\t" . 'За высокое педагогическое мастерство, проявленное в подготовке лауреата конкурса' . "\t" . date('d.m.Y') . "\t";
            $mainString .= $matches[$i][0]; // mail
            break;
    }
}

// Запись в CSV файл для дальнейшего использования в работе.
$export = new DataExport($mainString, $matches, $filePath, $contestName, $nameId);
$export->export();
