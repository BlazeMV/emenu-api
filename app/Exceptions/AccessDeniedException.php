<?php

namespace App\Exceptions;

class AccessDeniedException extends EMenuException
{
    protected $statusCode = 401;

    protected $message = 'Access denied';
}
