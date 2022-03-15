<?php
require_once '../Classes/DataExport.php';
require_once '../Classes/Places.php';
require_once 'config.php';

$nameId = 1; // Индекс со значением имени в массиве совпадений.
$contestName = "Mail-royal";
$regular = "/.*ФИО.*падеже\):\s(.*)[\n]Возраст.*наличии\).:\s(.*)[\n]Название.*работы:\s(.*)[\n]Основной.*\/руководителя:\s(.*)[\n]ФИО преподавателя.*падеже:\s(.*)[\n]ФИО.*Город.*пункт:\s(.*)[\n]Полное.*заведения:\s(.*)[\n]Краткое.*заведения:\s(.*)[\n]Адрес.*Электронная.*дипломы:\s(.*)[\n]Комментарий.*/sU";
preg_match_all($regular, $text, $matches, PREG_UNMATCHED_AS_NULL);

// Составление нужной строки из массива совпадений для дальнейшей записи в CSV файл.
$mainString = "\n";
$matches[4][0] = 'Преподаватель: ' . $matches[4][0];
for ($i = 1; $i < count($matches); $i++) {
    $mainString .= $matches[$i][0] . "\t";
    switch ($i) {
        case '1':
            $mainString .= (new Places($ajaxData))->getPlace();
            $mainString .= $ajaxData['age'] . "\t";
            $mainString .= $ajaxData['nominate'] . "\t";
            break;
        case '8':
            $mainString .= 'преподавателю' . "\t" . 'За высокое педагогическое мастерство, проявленное в подготовке лауреата конкурса' . "\t" . date('d.m.Y') . "\t";
            break;
    }
}

// Запись в CSV файл для дальнейшего использования в работе.
$export = new DataExport($mainString, $matches, $filePath, $contestName, $nameId);
$export->export();

