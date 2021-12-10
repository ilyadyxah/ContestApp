<?php
require_once ("test.php");
    $file = 'C:\Users\Admin\Desktop\ARTVICTORY\Олимпиады\Auto\dominanta.txt';
    $regular = "/Выберите международную олимпиаду:(.*)[\n]ФИО участника\(ов\) в дательном падеже, возраст:\s(.*)[\n]Класс, \(год обучения\):\s(.*)[\n].*[\n]Город, населенный пункт:\s(.*)[\n]Полное название учебного заведения:\s(.*)[\n]Краткое название учебного заведения:\s(.*)[\n]ФИО преподавателя\/ учителя:\s(.*)[\n]ФИО преподавателя\/ учителя в дательном падеже:\s(.*)[\n].*[\n]Электронная почта:\s(.*)[\n]/";
    preg_match_all($regular, $text, $matches, PREG_UNMATCHED_AS_NULL);
    $actor = "\n";
    for ($i = 1; $i < count($matches); $i++) {
        $actor .= $matches[$i][0];
        $actor .= "\t";
        switch ($i) {
            case '1':
                $actor .= "\t" . "\t"; // ТЕМА

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
            case '8':
                $actor .= 'преподавателю' . "\t" . 'За высокое педагогическое мастерство, проявленное в подготовке лауреата олимпиады' . "\t" . date('d.m.Y') . "\t";
                break;
        }
    }
    $actor = preg_replace('/\n/', '', $actor);
    $actor = preg_replace('/\r/', '', $actor);
    $actor .= "\n";
    $actor = "\xFF\xFE".iconv("UTF-8","UCS-2LE",$actor);
    if ($matches[1][0] === 0 || is_null($matches[1][0])) {
        echo '<br>';
        echo $matches[1][0];
        vardump($matches);
        die('Загрузка не удалась');
    }
    else  {
        echo '<a href="olimpiada.php">На главную</a>';
        echo '<br>';
        echo 'Заявка mail загружена';
        echo '<br>';
        echo $matches[2][0];
        file_put_contents($file, $actor, FILE_APPEND);
        }
//    sleep (1);
//    header("Location: /olimpiada.php");
//    exit;