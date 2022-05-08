<?php

namespace Otisz\Billingo\Builders;

use Otisz\Billingo\Enums\Currencies;
use Otisz\Billingo\Enums\Entitlements;
use Otisz\Billingo\Enums\Vats;
use Otisz\Billingo\Exceptions\InvalidProductException;

class ProductBuilder extends Builder
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

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): ProductBuilder
    {
        $this->comment = $comment;

        return $this;
    }

    public function getCurrency(): string
    {
        return $this->currency->value;
    }

    public function setCurrency(Currencies $currency): ProductBuilder
    {
        $this->currency = $currency;

        return $this;
    }

    public function getEntitlement(): ?string
    {
        return $this->entitlement?->value;
    }

    public function setEntitlement(?Entitlements $entitlement): ProductBuilder
    {
        $this->entitlement = $entitlement;

        return $this;
    }

    public function getGeneralLedgerNumber(): ?string
    {
        return $this->generalLedgerNumber;
    }

    public function setGeneralLedgerNumber(?string $generalLedgerNumber): ProductBuilder
    {
        $this->generalLedgerNumber = $generalLedgerNumber;

        return $this;
    }

    public function getGeneralLedgerTaxcode(): ?string
    {
        return $this->generalLedgerTaxcode;
    }

    public function setGeneralLedgerTaxcode(?string $generalLedgerTaxcode): ProductBuilder
    {
        $this->generalLedgerTaxcode = $generalLedgerTaxcode;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ProductBuilder
    {
        $this->name = $name;

        return $this;
    }

    public function getNetUnitPrice(): float
    {
        return $this->netUnitPrice;
    }

    public function setNetUnitPrice(float $netUnitPrice): ProductBuilder
    {
        $this->netUnitPrice = $netUnitPrice;

        return $this;
    }

    public function getUnit(): string
    {
        return $this->unit;
    }

    public function setUnit(string $unit): ProductBuilder
    {
        $this->unit = $unit;

        return $this;
    }

    public function getVat(): string
    {
        return $this->vat->value;
    }

    public function setVat(Vats $vat): ProductBuilder
    {
        $this->vat = $vat;

        return $this;
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
