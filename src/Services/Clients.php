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
    public static function all(int $page = 1, int $maxPerPage = 20)
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
    public static function create(array $clientPayload)
    {
        return self::post('clients', $clientPayload);
    }

    /**
     * @inheritdoc
     */
    public static function show($clientId)
    {
        return self::get("clients/{$clientId}");
    }

    /**
     * @inheritdoc
     */
    public static function update($clientId, array $clientPayload)
    {
        return self::put("clients/{$clientId}", $clientPayload);
    }

    /**
     * @inheritdoc
     */
    public static function destroy($clientId)
    {
        return self::delete("clients/{$clientId}");
    }
}
