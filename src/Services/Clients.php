<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Abstracts\BillinGoblin;
use Otisz\Billingo\Contracts\Clients as ClientInterface;
use Otisz\Billingo\Exceptions\TooManyResourcePerPageException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Clients
 *
 * @author Levente Otta <leventeotta@gmail.com>
 *
 * @package Otisz\Billingo\Services
 */
class Clients extends BillinGoblin implements ClientInterface
{
    /**
     * @inheritdoc
     */
    public static function query(array $filters): ResponseInterface
    {
        return self::get('invoices/query', $filters);
    }

    /**
     * @inheritdoc
     */
    public static function all(int $page = 1, int $maxPerPage = 20): ResponseInterface
    {
        if ($maxPerPage > 50) {
            throw new TooManyResourcePerPageException;
        }

        $options = [
            'page' => $page,
            'max_per_page' => $maxPerPage,
        ];

        return self::get('invoices', $options);
    }

    /**
     * @inheritdoc
     */
    public static function create(array $clientPayload): ResponseInterface
    {
        return self::post('clients', $clientPayload);
    }

    /**
     * @inheritdoc
     */
    public static function show($clientId): ResponseInterface
    {
        return self::get("clients/{$clientId}");
    }

    /**
     * @inheritdoc
     */
    public static function update($clientId, array $clientPayload): ResponseInterface
    {
        return self::put("clients/{$clientId}", $clientPayload);
    }

    /**
     * @inheritdoc
     */
    public static function destroy($clientId): ResponseInterface
    {
        return self::delete("clients/{$clientId}");
    }
}
