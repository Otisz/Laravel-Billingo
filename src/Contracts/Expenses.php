<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Contracts;

/**
 * Interface Expenses
 *
 * @package Otisz\Billingo\Contracts
 */
interface Expenses
{
    /**
     * Get a listing of expenses
     *
     * @example https://billingo.readthedocs.io/en/latest/expenses/#list-of-expenses
     *
     * @param int $page Show the given page
     * @param int $maxPerPage Sets the maximum number of results to return. Absolute maximum is 50!
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function all(int $page = 1, int $maxPerPage = 20);

    /**
     * List of available expense categories
     *
     * @example https://billingo.readthedocs.io/en/latest/expenses/#list-of-available-expense-categories
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function categories();

    /**
     * Create a new expense
     *
     * @example https://billingo.readthedocs.io/en/latest/expenses/#create-expense-object
     *
     * @param array $expensePayload Information about the new expense
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function create(array $expensePayload);

    /**
     * Update a specified expense
     *
     * @example https://billingo.readthedocs.io/en/latest/expenses/#update-expense-object
     *
     * @param int $expenseId Expense id provided by Billingo
     * @param array $expensePayload Information about the new expense
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function update(int $expenseId, array $expensePayload);
}
