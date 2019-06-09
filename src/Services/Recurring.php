<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Contracts\Recurring as Contract;
use Otisz\Billingo\Facades\Billingo;

/**
 * Class Recurring
 *
 * @package Otisz\Billingo\Services
 */
class Recurring implements Contract
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

        return Billingo::get('recurring', $options);
    }

    /**
     * @inheritDoc
     */
    public function create(array $productPayload)
    {
        return Billingo::post('recurring', $productPayload);
    }

    /**
     * @inheritDoc
     */
    public function find(int $recurringId)
    {
        return Billingo::get("recurring/{$recurringId}");
    }

    /**
     * @inheritDoc
     */
    public function update(int $recurringId, array $recurringPayload)
    {
        return Billingo::put("recurring/{$recurringId}", $recurringPayload);
    }

    /**
     * @inheritDoc
     */
    public function pause(int $recurringId)
    {
        return Billingo::post("recurring/{$recurringId}/stop");
    }

    /**
     * @inheritDoc
     */
    public function resume(int $recurringId)
    {
        return Billingo::post("recurring/{$recurringId}/resume");
    }
}
