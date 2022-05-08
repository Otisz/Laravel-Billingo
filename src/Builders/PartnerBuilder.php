<?php

namespace Otisz\Billingo\Builders;

use Otisz\Billingo\Enums\TaxTypes;
use Otisz\Billingo\Exceptions\InvalidPartnerException;

/**
 * Required properties: name
 *
 * Optional properties: accountNumber, address, customBillingSettings, emails, generalLedgerNumber, groupMemberTaxNumber, iban, phone, swift, taxType, taxcode
 */
class PartnerBuilder extends Builder
{
    protected ?string $accountNumber = null;
    protected ?AddressBuilder $address = null;
    protected ?CustomBillingSettingBuilder $customBillingSettings = null;
    /** @var string[]|null */
    protected ?array $emails = null;
    protected ?string $generalLedgerNumber = null;
    protected ?string $groupMemberTaxNumber = null;
    protected ?string $iban = null;
    protected string $name;
    protected ?string $phone = null;
    protected ?string $swift = null;
    protected ?TaxTypes $taxType = null;
    protected ?string $taxcode = null;

    public function getAccountNumber(): ?string
    {
        return $this->accountNumber;
    }

    public function setAccountNumber(?string $accountNumber): PartnerBuilder
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    public function getAddress(): ?AddressBuilder
    {
        return $this->address;
    }

    public function setAddress(?AddressBuilder $address): PartnerBuilder
    {
        $this->address = $address;

        return $this;
    }

    public function getCustomBillingSettings(): ?CustomBillingSettingBuilder
    {
        return $this->customBillingSettings;
    }

    public function setCustomBillingSettings(?CustomBillingSettingBuilder $customBillingSettings): PartnerBuilder
    {
        $this->customBillingSettings = $customBillingSettings;

        return $this;
    }

    public function getEmails(): ?array
    {
        return $this->emails;
    }

    public function setEmails(?array $emails): PartnerBuilder
    {
        $this->emails = $emails;

        return $this;
    }

    public function getGeneralLedgerNumber(): ?string
    {
        return $this->generalLedgerNumber;
    }

    public function setGeneralLedgerNumber(?string $generalLedgerNumber): PartnerBuilder
    {
        $this->generalLedgerNumber = $generalLedgerNumber;

        return $this;
    }

    public function getGroupMemberTaxNumber(): ?string
    {
        return $this->groupMemberTaxNumber;
    }

    public function setGroupMemberTaxNumber(?string $groupMemberTaxNumber): PartnerBuilder
    {
        $this->groupMemberTaxNumber = $groupMemberTaxNumber;

        return $this;
    }

    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setIban(?string $iban): PartnerBuilder
    {
        $this->iban = $iban;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): PartnerBuilder
    {
        $this->name = $name;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): PartnerBuilder
    {
        $this->phone = $phone;

        return $this;
    }

    public function getSwift(): ?string
    {
        return $this->swift;
    }

    public function setSwift(?string $swift): PartnerBuilder
    {
        $this->swift = $swift;

        return $this;
    }

    public function getTaxType(): ?string
    {
        return $this->taxType?->value;
    }

    public function setTaxType(?TaxTypes $taxType): PartnerBuilder
    {
        $this->taxType = $taxType;

        return $this;
    }

    public function getTaxcode(): ?string
    {
        return $this->taxcode;
    }

    public function setTaxcode(?string $taxcode): PartnerBuilder
    {
        $this->taxcode = $taxcode;

        return $this;
    }

    public function toArray(): array
    {
        return array_filter([
            'name' => $this->getName(),
            'address' => $this->getAddress()?->toArray(),
            'emails' => $this->getEmails(),
            'taxcode' => $this->getTaxcode(),
            'iban' => $this->getIban(),
            'swift' => $this->getSwift(),
            'account_number' => $this->getAccountNumber(),
            'phone' => $this->getPhone(),
            'general_ledger_number' => $this->getGeneralLedgerNumber(),
            'tax_type' => $this->getTaxType(),
            'custom_billing_settings' => $this->getCustomBillingSettings()?->toArray(),
            'group_member_tax_number' => $this->getGroupMemberTaxNumber(),
        ]);
    }

    /**
     * @return void
     * @throws \Otisz\Billingo\Exceptions\InvalidAddressException
     * @throws \Otisz\Billingo\Exceptions\InvalidPartnerException
     */
    public function validate(): void
    {
        if (empty($this->name) || empty($this->address)) {
            throw new InvalidPartnerException();
        }

        $this->getAddress()?->validate();
        $this->getCustomBillingSettings()?->validate();
    }
}
