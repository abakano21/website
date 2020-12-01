<?php

namespace App\Support;

class ApiErrorCodes
{
    const UNKNOWN_ERROR = -1;

    const ALL_ERRORS = [
        'TRANSFORMER_ERRORS' => [
            'INVOICES' => 9910,
        ],
        'GENERAL_ERRORS' => [
        ],
        'LOGIN_ERRORS' => [
            'INVALID_TOKEN' => 2002,
        ],
        'INVOICE_ERRORS' => [
            'NO_EVENTS' => 5001,
            'INVOICE_NOT_FOUND' => 5002,
        ],
    ];

    public static function getError($category, $name): int
    {
        return self::ALL_ERRORS[$category][$name] ?? self::UNKNOWN_ERROR;
    }
}
