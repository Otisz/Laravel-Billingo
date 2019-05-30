<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo\Contracts;

/**
 * Interface BankAccounts
 *
 * @package Otisz\Billingo\Contracts
 */
interface BankAccounts
{
    /**
     * Get a listing of bank accounts
     *
     * @example https://billingo.readthedocs.io/en/latest/bank_accounts/#list-bank-accounts
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function all();

    /**
     * Create a new bank account
     *
     * @example https://billingo.readthedocs.io/en/latest/bank_accounts/#create-bank-account-object
     *
     * @param array $bankAccountPayload Information about the new bank account
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function create(array $bankAccountPayload);

    /**
     * Find a specific bank account
     *
     * @example https://billingo.readthedocs.io/en/latest/bank_accounts/#list-bank-accounts
     *
     * @param int $bankAccountId Bank account id provided by Billingo
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function find(int $bankAccountId);

    /**
     * Update a specified bank account
     *
     * @example https://billingo.readthedocs.io/en/latest/bank_accounts/#update-bank-accounts-object
     *
     * @param int $bankAccountId Bank account id provided by Billingo
     * @param array $bankAccountPayload Information about the new bank account
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Otisz\Billingo\Exceptions\ConnectorException
     */
    public function update(int $bankAccountId, array $bankAccountPayload);
}
