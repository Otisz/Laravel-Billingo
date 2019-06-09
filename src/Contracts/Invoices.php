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
 * @package Otisz\Billingo\Contracts
 */
interface Invoices
{
    /**
     * Search invoices.
     *
     * @example https://billingo.readthedocs.io/en/latest/query/
     *
     * @param array $filters
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function query(array $filters);

    /**
     * Get a listing of invoices
     *
     * @example https://billingo.readthedocs.io/en/latest/invoices/#invoices
     *
     * @param int $page
     * @param int $maxPerPage
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function all(int $page = 1, $maxPerPage = 20);

    /**
     * Create a new invoice
     *
     * @example https://billingo.readthedocs.io/en/latest/invoices/#save-a-new-invoice
     *
     * @param array $invoicePayload
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function create(array $invoicePayload);

    /**
     * Find a specified client
     *
     * @example https://billingo.readthedocs.io/en/latest/invoices/#invoices
     *
     * @param int $invoiceId
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function find(int $invoiceId);

    /**
     * Create download link
     *
     * @example https://billingo.readthedocs.io/en/latest/invoices/#create-download-link
     *
     * @param int $invoiceId
     * @param bool $asURL
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed|string
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function accessCode(int $invoiceId, bool $asURL = false);

    /**
     * Generate normal invoice from proforma invoice
     *
     * @example https://billingo.readthedocs.io/en/latest/invoices/#generate-normal-invoice-from-proforma-invoice
     *
     * @param int $invoiceId
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function proformaToNormal(int $invoiceId);

    /**
     * Download invoice
     *
     * @example https://billingo.readthedocs.io/en/latest/invoices/#download-invoice
     *
     * @param int $invoiceId
     * @param resource|string|null $file
     * @param bool $asResponse
     *
     * @return \Illuminate\Http\Response|\Psr\Http\Message\StreamInterface|string|null
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function download(int $invoiceId, $file = null, bool $asResponse = false);

    /**
     * Cancel the invoice
     *
     * @example https://billingo.readthedocs.io/en/latest/invoices/#cancel-the-invoice
     *
     * @param int $invoiceId
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function cancel(int $invoiceId);

    /**
     * Send the invoice to the client email address
     *
     * @example https://billingo.readthedocs.io/en/latest/invoices/#send-the-invoice-to-the-client-email-address
     *
     * @param int $invoiceId
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function send(int $invoiceId);

    /**
     * Pay the full or partial amount of the invoice
     *
     * @example https://billingo.readthedocs.io/en/latest/invoices/#pay-the-full-or-partial-amount-of-the-invoice
     *
     * @param int $invoiceId
     * @param array $payload
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function pay(int $invoiceId, array $payload);

    /**
     * Undo payment of the invoice
     *
     * @example https://billingo.readthedocs.io/en/latest/invoices/#undo-payment-of-the-invoice
     *
     * @param int $invoiceId
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function undoPayment(int $invoiceId);

    /**
     * Get the available invoice blocks
     *
     * @example https://billingo.readthedocs.io/en/latest/invoices/#get-the-available-invoice-blocks
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function availableBlocks();
}
