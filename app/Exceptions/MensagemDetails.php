<?php

namespace App\Exceptions;

class MensagemDetails
{
    public int $code;

    public string $alertInfo;

    public string $message;

    public function __construct(string $message = 'Not Found', int $code = 404, string $alertInfo = 'Not Found')
    {
        $this->code = $code;
        $this->alertInfo = $alertInfo;
        $this->message = $message;
    }
}
