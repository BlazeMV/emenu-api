<?php

namespace App\Exceptions;

class RecordNotFoundException extends EMenuException
{
    protected $statusCode = 404;

    protected $message = 'Record not found';
}
