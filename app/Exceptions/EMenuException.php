<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Throwable;

abstract class EMenuException extends Exception implements HttpExceptionInterface
{
    protected $statusCode;

    protected $data;

    protected $errors;

    public function __construct($errors=[], $data=[] ,$message=null, $statusCode=null, $code=0, Throwable $previous=null)
    {
        $this->errors = $errors;
        $this->data = $data;
        $this->message = $message !== null ? $message : $this->message;
        $this->statusCode = $statusCode !== null ? $statusCode : $this->statusCode;
        parent::__construct($this->message, $code, $previous);
    }

    /**
     * Returns the status code.
     *
     * @return int An HTTP response status code
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Returns response headers.
     *
     * @return array Response headers
     */
    public function getHeaders()
    {
        return [];
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
