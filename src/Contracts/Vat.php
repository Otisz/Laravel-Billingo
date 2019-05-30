<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Contracts;

/**
 * Interface Vat
 *
 * @package Otisz\Billingo\Contracts
 */
interface Vat
{
    /**
     * Get a listing of available VAT codes
     *
     * @example https://billingo.readthedocs.io/en/latest/vat/#return-a-list-of-available-vat-codes
     *
     * @param mixed|null $value The value to filter for (eg. 0.27)
     * @param mixed|null $description The description to filter for (eg. AM)
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function available($value = null, $description = null);

    /**
     * Get a listing of available VAT codes
     *
     * @example https://billingo.readthedocs.io/en/latest/vat/#get-eu-vat-code
     *
     * @param mixed $country the ISO3166 country code given by the user (eg. DE)
     * @param mixed $ipAddress The IP address of the user
     * @param mixed $businessCountry The ISO3166 country code for the operating business
     * @param mixed|null $vatCode The EU VAT code for the user (eg. DE13816200)
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function euVatCode($country, $ipAddress, $businessCountry, $vatCode = null);
}
