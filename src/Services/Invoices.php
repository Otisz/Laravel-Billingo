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
use Otisz\Billingo\Contracts\Invoices as Contract;
use Otisz\Billingo\Facades\Billingo;

/**
 * Class Invoices
 *
 * @package Otisz\Billingo\Services
 */
class Invoices implements Contract
{
    /**
     * @inheritdoc
     */
    public function query(array $filters)
    {
        return Billingo::get('invoices/query', $filters);
    }

    /**
     * @inheritdoc
     */
    public function all(int $page = 1, $maxPerPage = 20)
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
     * @inheritdoc
     */
    public function create(array $invoicePayload)
    {
        return Billingo::post('invoices', $invoicePayload);
    }

    /**
     * @inheritdoc
     */
    public function find(int $invoiceId)
    {
        return Billingo::get("invoices/{$invoiceId}");
    }

    /**
     * @inheritdoc
     */
    public function accessCode(int $invoiceId, bool $asURL = false)
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
    public function proformaToNormal(int $invoiceId)
    {
        return Billingo::get("invoices/{$invoiceId}/generate");
    }

    /**
     * @inheritdoc
     */
    public function download(int $invoiceId, $file = null, bool $asResponse = false)
    {
        $downloadable = Billingo::connector()->downloadInvoice($invoiceId, $file);
        
        if ($asResponse) {
            return Response::make($downloadable, 200, [
                'Content-Type' => 'application/pdf',
            ]);
        }

        return $downloadable;
    }

    /**
     * @inheritdoc
     */
    public function cancel(int $invoiceId)
    {
        return Billingo::get("invoices/{$invoiceId}/cancel");
    }

    /**
     * @inheritdoc
     */
    public function send(int $invoiceId)
    {
        return Billingo::get("invoices/{$invoiceId}/send");
    }

    /**
     * @inheritdoc
     */
    public function pay(int $invoiceId, array $payload)
    {
        if (!Arr::has($payload, 'date')) {
            $payload = Arr::add($payload, 'date', Carbon::today()->toDateString());
        }

        return Billingo::get("invoices/{$invoiceId}/pay", $payload);
    }

    /**
     * @inheritdoc
     */
    public function undoPayment(int $invoiceId)
    {
        return Billingo::delete("invoices/{$invoiceId}/pay");
    }

    /**
     * @inheritdoc
     */
    public function availableBlocks()
    {
        return Billingo::get('invoices/blocks');
    }
}
