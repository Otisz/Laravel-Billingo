<?php

namespace Otisz\Billingo\Traits;

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
}
