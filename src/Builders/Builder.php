<?php

namespace Otisz\Billingo\Builders;

use Illuminate\Contracts\Support\Arrayable;

abstract class Builder implements Arrayable
{
    final public function __construct()
    {
    }

    public static function instance(): static
    {
        return new static();
    }

    abstract public function validate(): void;
}
