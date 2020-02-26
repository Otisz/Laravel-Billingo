<?php

namespace Otisz\Billingo\Services;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Otisz\Billingo\Facades\Billingo;
use Psr\Http\Message\ResponseInterface;

class Invoices
{
    /**
     * Search invoices.
     *
     * @example https://billingo.readthedocs.io/en/latest/query/
     *
     * @param  array  $filters
     *
     * @return array
     */
    public function query(array $filters): array
    {
        return Billingo::get('invoices/query', $filters);
    }

    /**
     * Get a listing of invoices
     *
     * @example https://billingo.readthedocs.io/en/latest/invoices/#invoices
     *
     * @param  int  $page
     * @param  int  $maxPerPage
     *
     * @return array
     */
    public function all(int $page = 1, $maxPerPage = 20): array
    {
        if ($maxPerPage > 50) {
            $maxPerPage = 50;
        }

        $options = [
            'page' => $page,
            'max_per_page' => $maxPerPage,
        ];

        return Billingo::get('invoices', $options);
    }

    /**
     * Create a new invoice
     *
     * @example https://billingo.readthedocs.io/en/latest/invoices/#save-a-new-invoice
     *
     * @param  array  $invoicePayload
     *
     * @return array
     */
    public function create(array $invoicePayload): array
    {
        return Billingo::post('invoices', $invoicePayload);
    }

    /**
     * Find a specified client
     *
     * @example https://billingo.readthedocs.io/en/latest/invoices/#invoices
     *
     * @param  int|string  $invoiceId
     *
     * @return array
     */
    public function find($invoiceId): array
    {
        return Billingo::get("invoices/{$invoiceId}");
    }

    /**
     * Create download link
     *
     * @example https://billingo.readthedocs.io/en/latest/invoices/#create-download-link
     *
     * @param  int|string  $invoiceId
     * @param  bool  $asURL
     *
     * @return array|string
     */
    public function accessCode($invoiceId, bool $asURL = false)
    {
        $response = Billingo::get("invoices/{$invoiceId}/code");

        if ($asURL) {
            return "https://www.billingo.hu/access/c:{$response['code']}";
        }

        return $response;
    }

    /**
     * Generate normal invoice from proforma invoice
     *
     * @example https://billingo.readthedocs.io/en/latest/invoices/#generate-normal-invoice-from-proforma-invoice
     *
     * @param  int|string  $invoiceId
     *
     * @return array
     */
    public function proformaToNormal($invoiceId): array
    {
        return Billingo::get("invoices/{$invoiceId}/generate");
    }

    /**
     * Download invoice
     *
     * @example https://billingo.readthedocs.io/en/latest/invoices/#download-invoice
     *
     * @param  int|string  $invoiceId
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function download($invoiceId): ResponseInterface
    {
        return Billingo::gateway()->downloadInvoice($invoiceId);
    }

    /**
     * Cancel the invoice
     *
     * @example https://billingo.readthedocs.io/en/latest/invoices/#cancel-the-invoice
     *
     * @param  int|string  $invoiceId
     *
     * @return array
     */
    public function cancel($invoiceId): array
    {
        return Billingo::get("invoices/{$invoiceId}/cancel");
    }

    /**
     * Send the invoice to the client email address
     *
     * @example https://billingo.readthedocs.io/en/latest/invoices/#send-the-invoice-to-the-client-email-address
     *
     * @param  int|string  $invoiceId
     *
     * @return array
     */
    public function send(int $invoiceId): array
    {
        return Billingo::get("invoices/{$invoiceId}/send");
    }

    /**
     * Pay the full or partial amount of the invoice
     *
     * @example https://billingo.readthedocs.io/en/latest/invoices/#pay-the-full-or-partial-amount-of-the-invoice
     *
     * @param  int|string  $invoiceId
     * @param  array  $payload
     *
     * @return array
     */
    public function pay($invoiceId, array $payload): array
    {
        if (!Arr::has($payload, 'date')) {
            $payload = Arr::add($payload, 'date', Carbon::today()->toDateString());
        }

        return Billingo::get("invoices/{$invoiceId}/pay", $payload);
    }

    /**
     * Undo payment of the invoice
     *
     * @example https://billingo.readthedocs.io/en/latest/invoices/#undo-payment-of-the-invoice
     *
     * @param  int|string  $invoiceId
     *
     * @return array
     */
    public function undoPayment($invoiceId): array
    {
        return Billingo::delete("invoices/{$invoiceId}/pay");
    }

    /**
     * Get the available invoice blocks
     *
     * @example https://billingo.readthedocs.io/en/latest/invoices/#get-the-available-invoice-blocks
     *
     * @return array
     */
    public function availableBlocks(): array
    {
        return Billingo::get('invoices/blocks');
    }
}
