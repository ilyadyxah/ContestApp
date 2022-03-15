<?php

require_once '../Classes/DataExport.php';
require_once '../Classes/Places.php';
require_once 'config.php';
$nameId = 3;
$contestName = "Mail"; // Индекс со значением имени в массиве совпадений.
$regular = "/Выберите международную олимпиаду:(.*)[\n]Тема.*:(.*)[\n]ФИО участника\(ов\) в дательном падеже, возраст:\s(.*)[\n]Класс, \(год обучения\):\s(.*)[\n].*[\n]Город, населенный пункт:\s(.*)[\n]Полное название учебного заведения:\s(.*)[\n]Краткое название учебного заведения:\s(.*)[\n]ФИО преподавателя\/ учителя:\s(.*)[\n]ФИО преподавателя\/ учителя в дательном падеже:\s(.*)[\n].*[\n]Электронная почта:\s(.*)[\n]/";
preg_match_all($regular, $text, $matches, PREG_UNMATCHED_AS_NULL);
$mainString = "\n";
// Составление строки из массива совпадений для дальнейшей записи в CSV файл.
for ($i = 1; $i < count($matches); $i++) {
    $mainString .= $matches[$i][0];
    $mainString .= "\t";
    switch ($i) {
        case '2':
            $mainString .= $matches[$i][0] . "\t"; // ТЕМА
            $mainString .= (new Places($ajaxData))->getPlace();
            break;
        case '9':
            $mainString .= 'преподавателю' . "\t" . 'За высокое педагогическое мастерство, проявленное в подготовке лауреата олимпиады' . "\t" . date('d.m.Y') . "\t";
            break;
    }
}

// Запись в CSV файл для дальнейшего использования в работе.
$export = new DataExport($mainString, $matches, $filePath, $contestName, $nameId);
$export->export();

