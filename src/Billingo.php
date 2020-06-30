<?php

namespace Otisz\Billingo;

use Otisz\Billingo\Traits\HasRequests;
use Otisz\Billingo\Traits\HasServices;
use Otisz\Billingo\Traits\HasStaticData;

class Billingo
{
    use HasRequests;
    use HasServices;
    use HasStaticData;

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
