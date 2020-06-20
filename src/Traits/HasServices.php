<?php

namespace Otisz\Billingo\Traits;

use Otisz\Billingo\Services\Partners;

trait HasServices
{
    /**
     * @return \Otisz\Billingo\Services\Partners
     */
    public function partners(): Partners
    {
        return new Partners();
    }
}
