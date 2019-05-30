<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Contracts;

/**
 * Interface Currency
 *
 * @package Otisz\Billingo\Contracts
 */
interface Currency
{
    /**
     * Convert amount from to
     *
     * @example https://billingo.readthedocs.io/en/latest/currency/#convert-value
     *
     * @param int|float|double $value The amount to convert
     * @param string $from The currency to convert from (eg. EUR)
     * @param string $to The currency to convert to (eg. USD)
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function convert($value, string $from, string $to);
}
