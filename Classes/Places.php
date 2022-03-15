<?php

class Places
{
    protected $place;

    public function __construct(array $data)
    {
        $this->place = $data['place'];
    }

    public function getPlace(): string
    {
        if (!is_null($this->place)) {
            switch ($this->place) {
                case '1':
                    return 'ЛАУРЕАТА  I  СТЕПЕНИ' . "\t"; // Место
                case '2':
                    return 'ЛАУРЕАТА  II  СТЕПЕНИ' . "\t"; //  Место
                case '3':
                    return 'ЛАУРЕАТА  III  СТЕПЕНИ' . "\t"; //  Место
                default:
                    return $this->place . "\t";
            }
        } else {
            return 'место?' . "\t"; // Место
        }
    }
}