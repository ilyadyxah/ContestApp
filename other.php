<?php

// Малоинформативные названия переменных, понятные только "создателю"
$var = json_decode(file_get_contents('php://input'), true);
$text = $var['text'];
$file = 'C:\Users\Admin\Desktop\ARTVICTORY\Олимпиады\Auto\dominanta.txt';
$regular = "/Выберите международную олимпиаду:(.*)[\n]Тема.*:(.*)[\n]ФИО участника\(ов\) в дательном падеже, возраст:\s(.*)[\n]Класс, \(год обучения\):\s(.*)[\n].*[\n]Город, населенный пункт:\s(.*)[\n]Полное название учебного заведения:\s(.*)[\n]Краткое название учебного заведения:\s(.*)[\n]ФИО преподавателя\/ учителя:\s(.*)[\n]ФИО преподавателя\/ учителя в дательном падеже:\s(.*)[\n].*[\n]Электронная почта:\s(.*)[\n]/";
preg_match_all($regular, $text, $matches, PREG_UNMATCHED_AS_NULL);
$actor = "\n";

for ($i = 1; $i < count($matches); $i++) {
    $actor .= $matches[$i][0];
    $actor .= "\t";
    switch ($i) {
        case '2':
            $actor .= $matches[$i][0] . "\t"; // ТЕМА

            // Данное условие и последующий код в нём повторяется в 2-х других файлах.
            if (isset($var['mesto'])) {
                switch ($var['mesto']) {
                    case '1':
                        $actor .= 'ЛАУРЕАТА  I  СТЕПЕНИ' . "\t"; // Место
                        break;
                    case '2':
                        $actor .= 'ЛАУРЕАТА  II  СТЕПЕНИ' . "\t"; //  Место
                        break;
                    case '3':
                        $actor .= 'ЛАУРЕАТА  III  СТЕПЕНИ' . "\t"; //  Место
                        break;
                }
            } else {
                $actor .= 'место?' . "\t"; // Место
            }
            break;
        case '9':
            $actor .= 'преподавателю' . "\t" . 'За высокое педагогическое мастерство, проявленное в подготовке лауреата олимпиады' . "\t" . date('d.m.Y') . "\t";
            break;
    }
}

// Повторяющаяся часть программы в 2-х других файлах
$actor = preg_replace('/\n/', '', $actor);
$actor = preg_replace('/\r/', '', $actor);
$actor .= "\n";
$actor = "\xFF\xFE" . iconv("UTF-8", "UCS-2LE", $actor);

if ($matches[1][0] === 0 || is_null($matches[1][0])) {
    echo 'Ошибка mail(с темой)';
    echo $matches[1][0];
    print_r($matches);
    die('Загрузка не удалась');
} else {
    echo 'Заявка mail загружена';
    echo '<br>';
    echo $matches[3][0];
    file_put_contents($file, $actor, FILE_APPEND);
}
