<?php
class DataExport
{
    protected string $mainString;
    protected array $matches;
    protected string $filePath;
    protected string $contestName;
    protected int $nameId;

    public function __construct(string $mainString, array $matches, string $filePath, string $contestName, int $nameId)
    {
        $this->mainString = $mainString;
        $this->matches = $matches;
        $this->filePath = $filePath;
        $this->contestName = $contestName;
        $this->nameId = $nameId;
    }

    public function export(): void
    {
        if ($this->matches[1][0] === 0 || is_null($this->matches[1][0])) {
            echo "Ошибка $this->nameId";
            echo $this->matches[1][0];
            print_r($this->matches);
            die('Загрузка не удалась');
        } else {
            echo "Заявка $this->contestName загружена";
            echo '<br>';
            echo $this->matches[$this->nameId][0];
            file_put_contents($this->filePath, $this->prepareToExport(), FILE_APPEND);
        }
    }

    public function prepareToExport(): string
    {
        $finalString = preg_replace('/\n/', '', $this->mainString);
        $finalString = preg_replace('/\r/', '', $finalString);
        $finalString .= "\n";
        return "\xFF\xFE" . iconv("UTF-8", "UCS-2LE", $finalString);
    }
}