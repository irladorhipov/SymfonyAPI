<?php

namespace App\Exception;

use RuntimeException;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class BookCategoryNotFoundException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('book category not found', Response::HTTP_NOT_FOUND);
    } 
}