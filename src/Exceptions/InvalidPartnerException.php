<?php

namespace Otisz\Billingo\Exceptions;

use Exception;

class InvalidPartnerException extends Exception
{
    protected $message = 'Invalid partner properties';
}
