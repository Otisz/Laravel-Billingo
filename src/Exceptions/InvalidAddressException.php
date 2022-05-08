<?php

namespace Otisz\Billingo\Exceptions;

use Exception;

class InvalidAddressException extends Exception
{
    protected $message = 'Invalid address properties';
}
