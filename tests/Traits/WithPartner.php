<?php

namespace Otisz\Billingo\Tests\Traits;

use Otisz\Billingo\Builders\AddressBuilder;
use Otisz\Billingo\Builders\CustomBillingSettingBuilder;
use Otisz\Billingo\Builders\DiscountBuilder;
use Otisz\Billingo\Builders\PartnerBuilder;
use Otisz\Billingo\Enums\Countries;
use Otisz\Billingo\Enums\Currencies;
use Otisz\Billingo\Enums\DiscountTypes;
use Otisz\Billingo\Enums\DocumentForms;
use Otisz\Billingo\Enums\PaymentMethods;
use Otisz\Billingo\Enums\TaxTypes;
use Otisz\Billingo\Enums\TemplateLanguages;

trait WithPartner
{
    public function partnerFactory(bool $minimal = false): PartnerBuilder
    {
        $address = AddressBuilder::instance()
            ->setCountry($this->faker->randomElement(Countries::cases()))
            ->setCity($this->faker->city)
            ->setPostCode($this->faker->postcode)
            ->setAddress($this->faker->streetAddress);

        $partner = PartnerBuilder::instance()
            ->setAddress($address)
            ->setName($this->faker->name);

        if ($minimal) {
            return $partner;
        }

        $discount = DiscountBuilder::instance()
            ->setDiscountType($this->faker->randomElement(DiscountTypes::cases()))
            ->setValue($this->faker->numberBetween(0, 50));

        $customBillingSettings = CustomBillingSettingBuilder::instance()
            ->setDiscount($discount)
            ->setDocumentCurrency($this->faker->randomElement(Currencies::cases()))
            ->setDocumentForm($this->faker->randomElement(DocumentForms::cases()))
            ->setDueDays($this->faker->numberBetween(1, 10))
            ->setPaymentMethod($this->faker->randomElement(PaymentMethods::cases()))
            ->setTemplateLanguageCode($this->faker->randomElement(TemplateLanguages::cases()));

        return $partner->setAccountNumber($this->faker->randomNumber(9))
            ->setCustomBillingSettings($customBillingSettings)
            ->setEmails([$this->faker->unique()->safeEmail, $this->faker->unique()->safeEmail])
            ->setGeneralLedgerNumber($this->faker->randomNumber(9))
            ->setGroupMemberTaxNumber($this->faker->randomNumber(9))
            ->setIban($this->faker->iban($address->getCountry()))
            ->setPhone($this->faker->phoneNumber)
            ->setSwift($this->faker->swiftBicNumber)
            ->setTaxType($this->faker->randomElement(TaxTypes::cases()))
            ->setTaxcode($this->faker->randomNumber(9));
    }
}
