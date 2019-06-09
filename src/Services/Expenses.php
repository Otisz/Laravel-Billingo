<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Contracts\Expenses as Contract;
use Otisz\Billingo\Facades\Billingo;

/**
 * Class Expenses
 *
 * @package Otisz\Billingo\Services
 */
class Expenses implements Contract
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

        return Billingo::get('expenses', $options);
    }

    /**
     * @inheritDoc
     */
    public function create(array $expensePayload)
    {
        return Billingo::post('expenses', $expensePayload);
    }

    /**
     * @inheritDoc
     */
    public function update(int $expenseId, array $expensePayload)
    {
        return Billingo::put("expenses/{$expenseId}", $expensePayload);
    }

    /**
     * @inheritDoc
     */
    public function categories()
    {
        return Billingo::get('expenses/categories/hu');
    }
}
