<?php

namespace Otisz\Billingo\Builders;

use Illuminate\Contracts\Support\Arrayable;
use Otisz\Billingo\Enums\Currencies;
use Otisz\Billingo\Enums\Entitlements;
use Otisz\Billingo\Enums\Vats;
use Otisz\Billingo\Exceptions\InvalidProductException;

class ProductBuilder implements Arrayable
{
    protected ?string $comment = null;
    protected Currencies $currency;
    protected ?Entitlements $entitlement = null;
    protected ?string $generalLedgerNumber = null;
    protected ?string $generalLedgerTaxcode = null;
    protected string $name;
    protected float $netUnitPrice;
    protected string $unit;
    protected Vats $vat;

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param  string  $comment
     * @return ProductBuilder
     */
    public function setComment(string $comment): ProductBuilder
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency->value;
    }

    /**
     * @param  \Otisz\Billingo\Enums\Currencies  $currency
     * @return ProductBuilder
     */
    public function setCurrency(Currencies $currency): ProductBuilder
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEntitlement(): ?string
    {
        return $this->entitlement?->value;
    }

    /**
     * @param  \Otisz\Billingo\Enums\Entitlements  $entitlement
     * @return ProductBuilder
     */
    public function setEntitlement(Entitlements $entitlement): ProductBuilder
    {
        $this->entitlement = $entitlement;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getGeneralLedgerNumber(): ?string
    {
        return $this->generalLedgerNumber;
    }

    /**
     * @param  string  $generalLedgerNumber
     * @return ProductBuilder
     */
    public function setGeneralLedgerNumber(string $generalLedgerNumber): ProductBuilder
    {
        $this->generalLedgerNumber = $generalLedgerNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getGeneralLedgerTaxcode(): ?string
    {
        return $this->generalLedgerTaxcode;
    }

    /**
     * @param  string  $generalLedgerTaxcode
     * @return ProductBuilder
     */
    public function setGeneralLedgerTaxcode(string $generalLedgerTaxcode): ProductBuilder
    {
        $this->generalLedgerTaxcode = $generalLedgerTaxcode;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param  string  $name
     * @return ProductBuilder
     */
    public function setName(string $name): ProductBuilder
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return float
     */
    public function getNetUnitPrice(): float
    {
        return $this->netUnitPrice;
    }

    /**
     * @param  float  $netUnitPrice
     * @return ProductBuilder
     */
    public function setNetUnitPrice(float $netUnitPrice): ProductBuilder
    {
        $this->netUnitPrice = $netUnitPrice;

        return $this;
    }

    /**
     * @return string
     */
    public function getUnit(): string
    {
        return $this->unit;
    }

    /**
     * @param  string  $unit
     * @return ProductBuilder
     */
    public function setUnit(string $unit): ProductBuilder
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * @return string
     */
    public function getVat(): string
    {
        return $this->vat->value;
    }

    /**
     * @param  \Otisz\Billingo\Enums\Vats  $vat
     * @return ProductBuilder
     */
    public function setVat(Vats $vat): ProductBuilder
    {
        $this->vat = $vat;

        return $this;
    }

    public static function instance(): ProductBuilder
    {
        return new self();
    }

    public function toArray(): array
    {
        return array_filter([
            'name' => $this->getName(),
            'comment' => $this->getComment(),
            'currency' => $this->getCurrency(),
            'vat' => $this->getVat(),
            'net_unit_price' => $this->getNetUnitPrice(),
            'unit' => $this->getUnit(),
            'general_ledger_number' => $this->getGeneralLedgerNumber(),
            'general_ledger_taxcode' => $this->getGeneralLedgerTaxcode(),
            'entitlement' => $this->getEntitlement(),
        ]);
    }

    /**
     * @return void
     * @throws \Otisz\Billingo\Exceptions\InvalidProductException
     */
    public function validate(): void
    {
        if (
            empty($this->name) ||
            empty($this->unit) ||
            empty($this->vat) ||
            empty($this->currency) ||
            empty($this->netUnitPrice)
        ) {
            throw new InvalidProductException();
        }
    }
}
