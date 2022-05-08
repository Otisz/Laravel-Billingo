<?php

namespace Otisz\Billingo\Builders;

use Otisz\Billingo\Enums\Countries;
use Otisz\Billingo\Exceptions\InvalidAddressException;

class AddressBuilder extends Builder
{
    protected string $address;
    protected string $city;
    protected Countries $country;
    protected string $postCode;

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): AddressBuilder
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): AddressBuilder
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): string
    {
        return $this->country->value;
    }

    public function setCountry(Countries $country): AddressBuilder
    {
        $this->country = $country;

        return $this;
    }

    public function getPostCode(): string
    {
        return $this->postCode;
    }

    public function setPostCode(string $postCode): AddressBuilder
    {
        $this->postCode = $postCode;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'country_code' => $this->getCountry(),
            'post_code' => $this->getPostCode(),
            'city' => $this->getCity(),
            'address' => $this->getAddress(),
        ];
    }

    /**
     * @return void
     * @throws \Otisz\Billingo\Exceptions\InvalidAddressException
     */
    public function validate(): void
    {
        if (
            empty($this->country) ||
            empty($this->postCode) ||
            empty($this->city) ||
            empty($this->address)
        ) {
            throw new InvalidAddressException();
        }
    }
}
