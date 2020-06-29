<?php

namespace Otisz\Billingo\Traits;

use Otisz\Billingo\Services\BankAccounts;
use Otisz\Billingo\Services\Currencies;
use Otisz\Billingo\Services\DocumentBlocks;
use Otisz\Billingo\Services\Organization;
use Otisz\Billingo\Services\Partners;
use Otisz\Billingo\Services\Products;

trait HasServices
{
    /**
     * @return \Otisz\Billingo\Services\Partners
     */
    public function partners(): Partners
    {
        return new Partners();
    }

    /**
     * @return \Otisz\Billingo\Services\Products
     */
    public function products(): Products
    {
        return new Products();
    }

    /**
     * @return \Otisz\Billingo\Services\BankAccounts
     */
    public function bankAccount(): BankAccounts
    {
        return new BankAccounts();
    }

    /**
     * @return \Otisz\Billingo\Services\Currencies
     */
    public function currencies(): Currencies
    {
        return new Currencies();
    }

    /**
     * @return \Otisz\Billingo\Services\Organization
     */
    public function organization(): Organization
    {
        return new Organization();
    }

    /**
     * @return \Otisz\Billingo\Services\DocumentBlocks
     */
    public function documentBlocks(): DocumentBlocks
    {
        return new DocumentBlocks();
    }
