<?php
require_once '../Classes/DataExport.php';
require_once '../Classes/Places.php';
require_once 'config.php';

$nameId = 1; // Индекс со значением имени в массиве совпадений.
$contestName = "Mail-royal";
$regular = "/.*Ф.И.О. участника.*преподавателя\)\s(.*)[\n]Основной.*коллектива.*наличии\)(.*)[\n]Название.*работы\s(.*)[\n]Ф.И.О. преподавателя\/.*руководителя\s(.*)[\n]Ф.И.О. преподавателя\/.*руководителя в.*дательном падеже\s(.*)[\n]Контактный.*пункт\)\s(.*)[\n]Наим.*краткое\):\s(.*)[\n]Адрес.*дипломы\s(.*)\s1/sU";
preg_match_all($regular, $text, $matches, PREG_UNMATCHED_AS_NULL);
$matches[4][0] = 'Преподаватель: ' . $matches[4][0];
$mainString = "\n";
$collectArray = [];
// Составление строки из массива совпадений для дальнейшей записи в CSV файл.
for ($i = 1; $i < count($matches); $i++) {
    switch ($i) {
        case '1':
            $collectArray[] = $matches[$i][0] . "\t"; //ФИО
            $collectArray[] = (new Places($ajaxData))->getPlace(); //Место
            break;
        case '2':
            $collectArray[] = $ajaxData['age'] . "\t"; //Категория
            $collectArray[] = $ajaxData['nominate'] . "\t"; //Номинация
            $collectArray[] = $matches[$i][0] . "\t"; //Название ансамбля
            break;
        case '3':
            $collectArray[] = $matches[$i][0] . "\t"; //Название работы
            break;
        case '4':
            $collectArray[] = $matches[$i][0] . "\t"; //ФИО преп
            break;
        case '5':
            $collectArray[] = $matches[$i][0] . "\t"; //ФИО преп дат
            break;
        case '6':
            $collectArray[] = $matches[$i][0] . "\t"; //Город
            break;
        case '7':
            $collectArray[] = "\t"; //Уч.заведение полн
            $collectArray[] = $matches[$i][0] . "\t"; //Уч.заведение кратк
            $collectArray[] = 'преподавателю' . "\t" . 'За высокое педагогическое мастерство, проявленное в подготовке лауреата конкурса' . "\t" . date('d.m.Y') . "\t";
            break;
        case '8':
            $collectArray[] = $matches[$i][0] . "\t"; //mail
            break;
    }
}
$mainString = implode($collectArray);
// Запись в CSV файл для дальнейшего использования в работе.
$export = new DataExport($mainString, $matches, $filePath, $contestName, $nameId);
$export->export();

