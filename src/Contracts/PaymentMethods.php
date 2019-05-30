<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Contracts;

/**
 * Interface PaymentMethods
 *
 * @package Otisz\Billingo\Contracts
 */
interface PaymentMethods
{
    /**
     * Get a listing of payment methods
     *
     * @example https://billingo.readthedocs.io/en/latest/payment_methods/#list-the-available-payment-methods
     *
     * @param string $langCode Language code. Can be any of hu, en, or de
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function all(string $langCode);
}
