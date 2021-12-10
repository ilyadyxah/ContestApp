<?php
require_once ("test.php");
    $file = 'C:\Users\Admin\Desktop\ARTVICTORY\Олимпиады\Auto\dominanta.txt';
    $regular = "/Олимпиада\s(.*)Тема.*\s(.*)Ф.И.О.*возраст\s(.*)Ф.И.*ля\s(.*)Ф.И.*же\s(.*)Контакт.*пункт\)\s(.*)Н.*краткое\):\s(.*)Адрес.*дипломы\s(.*)\s1/sU";
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
                if (isset($_POST['mesto'])){
                    switch ($_POST['mesto']) {
                        case '1':
                            $actor .=  'ЛАУРЕАТА  I  СТЕПЕНИ' . "\t"; // Место
                            break;
                        case '2':
                            $actor .=  'ЛАУРЕАТА  II  СТЕПЕНИ' . "\t"; //  Место
                            break;
                        case '3':
                            $actor .=  'ЛАУРЕАТА  III  СТЕПЕНИ' . "\t"; //  Место
                            break;
                    }
                }
                else {
                    $actor .=  'место?' . "\t"; // Место
                }
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
    $actor = preg_replace('/\n/', '', $actor);
    $actor = preg_replace('/\r/', '', $actor);
    $actor .= "\n";
    $actor = "\xFF\xFE".iconv("UTF-8","UCS-2LE",$actor);
    if ($matches[1][0] === 0 || is_null($matches[1][0])) {
        echo $matches[1][0];
        echo 'Ошибка Word' . "\n";
        vardump($matches);
        die('Загрузка не удалась');
    }
    else  {
        echo '<a href="olimpiada.php">На главную</a>';
        echo '<br>';
        echo 'Заявка Word загружена';
        echo '<br>';
        echo $matches[3][0];
        file_put_contents($file, $actor, FILE_APPEND);
    }
