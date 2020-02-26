<?php

namespace Otisz\Billingo\Traits;

use Otisz\Billingo\Services\BankAccounts;
use Otisz\Billingo\Services\Clients;
use Otisz\Billingo\Services\Currency;
use Otisz\Billingo\Services\Expenses;
use Otisz\Billingo\Services\Invoices;
use Otisz\Billingo\Services\PaymentMethods;
use Otisz\Billingo\Services\Products;
use Otisz\Billingo\Services\Recurring;
use Otisz\Billingo\Services\Vat;

trait Services
{
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
