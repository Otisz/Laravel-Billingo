<?php
/**
 * Deployed by Levente Otta <leventeotta@gmail.com>
 *
 * @author Levente Otta <leventeotta@gmail.com>
 * @copyright Copyright (c) 2019. Levente Otta
 */

namespace Otisz\Billingo;

use Otisz\Billingo\Connector\Connector;
use Otisz\Billingo\Contracts\Billable;
use Otisz\Billingo\Services\BankAccounts;
use Otisz\Billingo\Services\Clients;
use Otisz\Billingo\Services\Currency;
use Otisz\Billingo\Services\Expenses;
use Otisz\Billingo\Services\Invoices;
use Otisz\Billingo\Services\PaymentMethods;
use Otisz\Billingo\Services\Products;
use Otisz\Billingo\Services\Recurring;
use Otisz\Billingo\Services\Vat;

/**
 * Class Billingo
 *
 * @package Otisz\Billingo
 */
class Billingo implements Billable
{
    /**
     * @var \Otisz\Billingo\Connector\Connector $connector
     */
    private $connector;

    /**
     * Billingo constructor.
     *
     * @param \Otisz\Billingo\Connector\Connector $connector
     */
    public function __construct(Connector $connector)
    {
        $this->connector = $connector;
    }

    /**
     * @inheritDoc
     */
    public function connector(): Connector
    {
        return $this->connector;
    }

    /**
     * @inheritDoc
     */
    public function get(string $uri, array $payload = [])
    {
        return $this->connector->get($uri, $payload);
    }

    /**
     * @inheritdoc
     */
    public function post(string $uri, array $payload = [])
    {
        return $this->connector->post($uri, $payload);
    }

    /**
     * @inheritdoc
     */
    public function put(string $uri, array $payload = [])
    {
        return $this->connector->put($uri, $payload);
    }

    /**
     * @inheritdoc
     */
    public function delete(string $uri, array $payload = [])
    {
        return $this->connector->delete($uri, $payload);
    }

    /**
     * @return \Otisz\Billingo\Services\Clients
     */
    public function clients(): Clients
    {
        return new Clients;
    }

    /**
     * @return \Otisz\Billingo\Services\Invoices
     */
    public function invoices(): Invoices
    {
        return new Invoices;
    }

    /**
     * @return \Otisz\Billingo\Services\Products
     */
    public function products(): Products
    {
        return new Products;
    }

    /**
     * @return \Otisz\Billingo\Services\BankAccounts
     */
    public function bankAccounts(): BankAccounts
    {
        return new BankAccounts;
    }

    /**
     * @return \Otisz\Billingo\Services\Currency
     */
    public function currency(): Currency
    {
        return new Currency;
    }

    /**
     * @return \Otisz\Billingo\Services\Expenses
     */
    public function expenses(): Expenses
    {
        return new Expenses;
    }

    /**
     * @return \Otisz\Billingo\Services\PaymentMethods
     */
    public function paymentMethods(): PaymentMethods
    {
        return new PaymentMethods;
    }

    /**
     * @return \Otisz\Billingo\Services\Recurring
     */
    public function recurring(): Recurring
    {
        return new Recurring;
    }

    /**
     * @return \Otisz\Billingo\Services\Vat
     */
    public function vat(): Vat
    {
        return new Vat;
    }
}
