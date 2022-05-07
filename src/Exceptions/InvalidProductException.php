<?php

namespace Otisz\Billingo\Exceptions;

use Exception;

class InvalidProductException extends Exception
{
    protected $message = 'Invalid product properties';
}
