<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Services;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Response;
use Otisz\Billingo\Billingo;
use Otisz\Billingo\Contracts\Invoices as InvoicesContract;
use Otisz\Billingo\Exceptions\TooManyResourcePerPageException;

/**
 * Class Invoices
 *
 * @author Levente Otta <leventeotta@gmail.com>
 *
 * @package Otisz\Billingo\Services
 */
class Invoices implements InvoicesContract
{
    /**
     * @inheritdoc
     */
    public static function query(array $filters)
    {
        return Billingo::get('invoices/query', $filters);
    }

    /**
     * @inheritdoc
     */
    public static function all(int $page = 1, $maxPerPage = 20)
    {
        if ($maxPerPage > 50) {
            throw new TooManyResourcePerPageException;
        }

        $options = [
            'page' => $page,
            'max_per_page' => $maxPerPage,
        ];

        return Billingo::get('invoices', $options);
    }

    /**
     * @inheritdoc
     */
    public static function create(array $invoicePayload)
    {
        // Just to be sure.
        $invoicePayload['block_uid'] = 0;

        return Billingo::post('invoices', $invoicePayload);
    }

    /**
     * @inheritdoc
     */
    public static function find($invoiceId)
    {
        return Billingo::get("invoices/{$invoiceId}");
    }

    /**
     * @inheritdoc
     */
    public static function accessCode($invoiceId, bool $asURL = false)
    {
        $response = Billingo::get("invoices/{$invoiceId}/code");

        if ($asURL) {
            return "https://www.billingo.hu/access/c:{$response['code']}";
        }

        return $response;
    }

    /**
     * @inheritdoc
     */
    public static function proformaToNormal($invoiceId)
    {
        return Billingo::get("invoices/{$invoiceId}/generate");
    }

    /**
     * @inheritdoc
     */
    public static function download($invoiceId, $file = null, bool $asResponse = false)
    {
        if ($asResponse) {
            return Response::make(Billingo::connector()->downloadInvoice($invoiceId, $file), 200, [
                'Content-Type' => 'application/pdf',
            ]);
        }

        return Billingo::connector()->downloadInvoice($invoiceId, $file);
    }

    /**
     * @inheritdoc
     */
    public static function cancel($invoiceId)
    {
        return Billingo::get("invoices/{$invoiceId}/cancel");
    }

    /**
     * @inheritdoc
     */
    public static function send($invoiceId)
    {
        return Billingo::get("invoices/{$invoiceId}/send");
    }

    /**
     * @inheritdoc
     */
    public static function pay($invoiceId, array $payload)
    {
        if (!Arr::has($payload, 'date')) {
            $payload = Arr::add($payload, 'date', Carbon::now()->toDateString());
        }

        return Billingo::get("invoices/{$invoiceId}/pay", $payload);
    }

    /**
     * @inheritdoc
     */
    public static function undoPayment($invoiceId)
    {
        return Billingo::delete("invoices/{$invoiceId}/pay");
    }

    /**
     * @inheritdoc
     */
    public static function availableBlocks()
    {
        return Billingo::get('invoices/blocks');
    }
}
