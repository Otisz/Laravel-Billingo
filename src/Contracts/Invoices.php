<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Contracts;

/**
 * Interface Invoices
 *
 * @author Levente Otta <leventeotta@gmail.com>
 *
 * @package Otisz\Billingo\Contracts
 */
interface Invoices
{
    /**
     * Search invoices.
     *
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @see https://billingo.readthedocs.io/en/latest/query/
     *
     * @param array $filters
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \Otisz\BillingoConnector\Exceptions\JSONParseException
     * @throws \Otisz\BillingoConnector\Exceptions\RequestErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function query(array $filters);

    /**
     * Get a listing of invoices
     *
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @see https://billingo.readthedocs.io/en/latest/invoices/#invoices
     *
     * @param int $page
     * @param int $maxPerPage
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \Otisz\BillingoConnector\Exceptions\JSONParseException
     * @throws \Otisz\BillingoConnector\Exceptions\RequestErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\TooManyResourcePerPageException
     */
    public static function all(int $page = 1, $maxPerPage = 20);

    /**
     * Create a new invoice
     *
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @see https://billingo.readthedocs.io/en/latest/invoices/#save-a-new-invoice
     *
     * @param array $invoicePayload
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \Otisz\BillingoConnector\Exceptions\JSONParseException
     * @throws \Otisz\BillingoConnector\Exceptions\RequestErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function create(array $invoicePayload);

    /**
     * Find a specified client
     *
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @see https://billingo.readthedocs.io/en/latest/invoices/#invoices
     *
     * @param int|string $invoiceId
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \Otisz\BillingoConnector\Exceptions\JSONParseException
     * @throws \Otisz\BillingoConnector\Exceptions\RequestErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function find($invoiceId);

    /**
     * Create download link
     *
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @see https://billingo.readthedocs.io/en/latest/invoices/#create-download-link
     *
     * @param int|string $invoiceId
     * @param bool $asURL
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface|string
     * @throws \Otisz\BillingoConnector\Exceptions\JSONParseException
     * @throws \Otisz\BillingoConnector\Exceptions\RequestErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function accessCode($invoiceId, bool $asURL = false);

    /**
     * Generate normal invoice from proforma invoice
     *
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @see https://billingo.readthedocs.io/en/latest/invoices/#generate-normal-invoice-from-proforma-invoice
     *
     * @param int|string $invoiceId
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \Otisz\BillingoConnector\Exceptions\JSONParseException
     * @throws \Otisz\BillingoConnector\Exceptions\RequestErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function proformaToNormal($invoiceId);

    /**
     * Download invoice
     *
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @see https://billingo.readthedocs.io/en/latest/invoices/#download-invoice
     *
     * @param int|string $invoiceId
     * @param resource|string|null $file
     * @param bool $asResponse
     *
     * @return \Illuminate\Http\Response|\Psr\Http\Message\StreamInterface|string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function download($invoiceId, $file = null, bool $asResponse = false);

    /**
     * Cancel the invoice
     *
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @see https://billingo.readthedocs.io/en/latest/invoices/#cancel-the-invoice
     *
     * @param int|string $invoiceId
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \Otisz\BillingoConnector\Exceptions\JSONParseException
     * @throws \Otisz\BillingoConnector\Exceptions\RequestErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function cancel($invoiceId);

    /**
     * Send the invoice to the client email address
     *
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @see https://billingo.readthedocs.io/en/latest/invoices/#send-the-invoice-to-the-client-email-address
     *
     * @param int|string $invoiceId
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \Otisz\BillingoConnector\Exceptions\JSONParseException
     * @throws \Otisz\BillingoConnector\Exceptions\RequestErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function send($invoiceId);

    /**
     * Pay the full or partial amount of the invoice
     *
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @see https://billingo.readthedocs.io/en/latest/invoices/#pay-the-full-or-partial-amount-of-the-invoice
     *
     * @param int|string $invoiceId
     * @param array $payload
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \Otisz\BillingoConnector\Exceptions\JSONParseException
     * @throws \Otisz\BillingoConnector\Exceptions\RequestErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function pay($invoiceId, array $payload);

    /**
     * Undo payment of the invoice
     *
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @see https://billingo.readthedocs.io/en/latest/invoices/#undo-payment-of-the-invoice
     *
     * @param int|string $invoiceId
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \Otisz\BillingoConnector\Exceptions\JSONParseException
     * @throws \Otisz\BillingoConnector\Exceptions\RequestErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function undoPayment($invoiceId);

    /**
     * Get the available invoice blocks
     *
     * @author Levente Otta <leventeotta@gmail.com>
     *
     * @see https://billingo.readthedocs.io/en/latest/invoices/#get-the-available-invoice-blocks
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \Otisz\BillingoConnector\Exceptions\JSONParseException
     * @throws \Otisz\BillingoConnector\Exceptions\RequestErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function availableBlocks();
}
