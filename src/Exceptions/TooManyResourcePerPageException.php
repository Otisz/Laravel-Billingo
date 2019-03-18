<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Exceptions;

/**
 * Class TooManyResourcePerPageException
 *
 * @author Levente Otta <leventeotta@gmail.com>
 *
 * @package Otisz\Billingo\Exceptions
 */
class TooManyResourcePerPageException extends \Exception
{
    /**
     * @var string
     */
    protected $message = 'There should be no more than 50 resources requested per page.';

    /**
     * @var int
     */
    protected $code = 400;
}
