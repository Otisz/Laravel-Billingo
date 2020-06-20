<?php

namespace Otisz\Billingo;

use Otisz\Billingo\Traits\HasRequests;
use Otisz\Billingo\Traits\HasServices;

class Billingo
{
    use HasRequests;
    use HasServices;

    /**
     * @var \Otisz\Billingo\Gateway
     */
    protected $gateway;

    public function __construct(Gateway $gateway)
    {
        $this->gateway = $gateway;
    }

    /**
     * @return \Otisz\Billingo\Gateway
     */
    public function gateway(): Gateway
    {
        return $this->gateway;
    }
}
