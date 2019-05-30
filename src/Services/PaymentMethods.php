<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Contracts\PaymentMethods as Contract;
use Otisz\Billingo\Facades\Billingo;

/**
 * Class PaymentMethods
 *
 * @package Otisz\Billingo\Services
 */
class PaymentMethods implements Contract
{
    /**
     * @inheritdoc
     */
    public function all(string $langCode)
    {
        return Billingo::get("payment_methods/{$langCode}");
    }
}
