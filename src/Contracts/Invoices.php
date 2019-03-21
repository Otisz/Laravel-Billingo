<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Contracts;

/**
 * Class Invoices
 *
 * @author Levente Otta <leventeotta@gmail.com>
 *
 * @package Otisz\Billingo\Contracts
 */
interface Invoices
{
    public static function query(array $filters);

    public static function all(int $page = 1, $maxPerPage = 20);

    public static function create(array $invoicePayload);

    public static function show($invoiceId);

    public static function accessCode($invoiceId, bool $asURL = false);

    public static function proformaToNormal($invoiceId, bool $asResponse = false);

    public static function download($invoiceId, bool $asResponse = false);

    public static function cancel($invoiceId);

    public static function send($invoiceId);

    public static function pay($invoiceId, array $payload);

    public static function undoPayment($invoiceId);

    public static function availableBlocks();
}
