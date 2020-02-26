<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class PaymentMethods
{
    /**
     * Get a listing of payment methods
     *
     * @example https://billingo.readthedocs.io/en/latest/payment_methods/#list-the-available-payment-methods
     *
     * @param  string  $langCode  Language code. Can be any of hu, en, or de
     *
     * @return array
     */
    public function all(string $langCode): array
    {
        return Billingo::get("payment_methods/{$langCode}");
    }
}
