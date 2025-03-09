<?php

namespace App\Exceptions;

class MensagemDetails
{
    private int $code;
    private string $alertInfo;
    private string $message;

    public function __construct(string $message = 'Not Found', string $alertInfo = 'danger', int $code = 404)
    {
        $this->message = $message;
        $this->alertInfo = $alertInfo;
        $this->code = $code;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getAlertInfo(): string
    {
        return $this->alertInfo;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function toArray(): array
    {
        return [
            'message' => $this->message,
            'alertInfo' => $this->alertInfo,
            'code' => $this->code,
        ];
    }
}
