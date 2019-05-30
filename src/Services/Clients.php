<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Contracts\Clients as Contract;
use Otisz\Billingo\Facades\Billingo;

/**
 * Class Clients
 *
 * @package Otisz\Billingo\Services
 */
class Clients implements Contract
{
    /**
     * @inheritdoc
     */
    public function all(int $page = 1, int $maxPerPage = 20)
    {
        if ($maxPerPage > 50) {
            $maxPerPage = 50;
        }

        $options = [
            'page' => $page,
            'max_per_page' => $maxPerPage,
        ];

        return Billingo::get('clients', $options);
    }

    /**
     * @inheritdoc
     */
    public function create(array $clientPayload)
    {
        return Billingo::post('clients', $clientPayload);
    }

    /**
     * @inheritdoc
     */
    public function find(int $clientId)
    {
        return Billingo::get("clients/{$clientId}");
    }

    /**
     * @inheritdoc
     */
    public function update(int $clientId, array $clientPayload)
    {
        return Billingo::put("clients/{$clientId}", $clientPayload);
    }

    /**
     * @inheritdoc
     */
    public function destroy(int $clientId)
    {
        return Billingo::delete("clients/{$clientId}");
    }
}
