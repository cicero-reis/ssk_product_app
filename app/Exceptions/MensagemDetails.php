<?php

namespace App\Exceptions;

class MensagemDetails
{
    public int $code;

    public string $alertInfo;

    public string $message;

    public function __construct(string $message = 'Not Found', string $alertInfo = 'danger', int $code = 404)
    {
        $this->message = $message;
        $this->alertInfo = $alertInfo;
        $this->code = $code;
    }
}
