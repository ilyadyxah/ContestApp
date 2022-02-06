<?php

class artFunctions
{
    public static function mesto($var)
    {
        if (isset($var['mesto'])) {
            switch ($var['mesto']) {
                case '1':
                    return 'ЛАУРЕАТА  I  СТЕПЕНИ' . "\t"; // Место
                case '2':
                    return 'ЛАУРЕАТА  II  СТЕПЕНИ' . "\t"; //  Место
                case '3':
                    return 'ЛАУРЕАТА  III  СТЕПЕНИ' . "\t"; //  Место
            }
        } else {
            return 'место?' . "\t"; // Место
        }
    }

    public static function save($actor, $matches, $file, $name, $id)
    {
        $actor = preg_replace('/\n/', '', $actor);
        $actor = preg_replace('/\r/', '', $actor);
        $actor .= "\n";
        $actor = "\xFF\xFE" . iconv("UTF-8", "UCS-2LE", $actor);

        if ($matches[1][0] === 0 || is_null($matches[1][0])) {
            echo "Ошибка $name";
            echo $matches[1][0];
            print_r($matches);
            die('Загрузка не удалась');
        } else {
            echo "Заявка $name загружена";
            echo '<br>';
            echo $matches[$id][0];
            file_put_contents($file, $actor, FILE_APPEND);
        }
    }

}