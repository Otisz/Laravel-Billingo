<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class Expenses
{
    /**
     * Get a listing of expenses
     *
     * @example https://billingo.readthedocs.io/en/latest/expenses/#list-of-expenses
     *
     * @param  int  $page  Show the given page
     * @param  int  $maxPerPage  Sets the maximum number of results to return. Absolute maximum is 50!
     *
     * @return array
     */
    public function all(int $page = 1, int $maxPerPage = 20): array
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
     * List of available expense categories
     *
     * @example https://billingo.readthedocs.io/en/latest/expenses/#list-of-available-expense-categories
     *
     * @return array
     */
    public function categories(): array
    {
        return Billingo::get('expenses/categories/hu');
    }

    /**
     * Create a new expense
     *
     * @example https://billingo.readthedocs.io/en/latest/expenses/#create-expense-object
     *
     * @param  array  $expensePayload  Information about the new expense
     *
     * @return array
     */
    public function create(array $expensePayload): array
    {
        return Billingo::post('expenses', $expensePayload);
    }

    /**
     * Update a specified expense
     *
     * @example https://billingo.readthedocs.io/en/latest/expenses/#update-expense-object
     *
     * @param  int|string  $expenseId  Expense id provided by Billingo
     * @param  array  $expensePayload  Information about the new expense
     *
     * @return array
     */
    public function update($expenseId, array $expensePayload): array
    {
        return Billingo::put("expenses/{$expenseId}", $expensePayload);
    }
}
