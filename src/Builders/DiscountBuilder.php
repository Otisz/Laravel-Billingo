<?php

namespace Otisz\Billingo\Builders;

use Otisz\Billingo\Enums\DiscountTypes;

class DiscountBuilder extends Builder
{
    protected ?DiscountTypes $discountType = null;
    protected ?int $value = null;

    public function getDiscountType(): ?string
    {
        return $this->discountType?->value;
    }

    public function setDiscountType(?DiscountTypes $discountType): DiscountBuilder
    {
        $this->discountType = $discountType;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(?int $value): DiscountBuilder
    {
        $this->value = $value;

        return $this;
    }

    public function toArray(): array
    {
        return array_filter([
            'type' => $this->getDiscountType(),
            'value' => $this->getValue(),
        ]);
    }

    public function validate(): void
    {
        //
    }
}
