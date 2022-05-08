<?php

namespace Otisz\Billingo\Tests\Partners;

use Illuminate\Foundation\Testing\WithFaker;
use Otisz\Billingo\Builders\AddressBuilder;
use Otisz\Billingo\Builders\PartnerBuilder;
use Otisz\Billingo\Exceptions\InvalidAddressException;
use Otisz\Billingo\Exceptions\InvalidPartnerException;
use Otisz\Billingo\Facades\Partners;
use Otisz\Billingo\Tests\TestCase;
use Otisz\Billingo\Tests\Traits\WithPartner;

class PartnerStoreTest extends TestCase
{
    use WithFaker;
    use WithPartner;

    protected function setUpFaker(): void
    {
        $this->faker = $this->makeFaker('hu_HU');
    }

    public function testItCannotStoreNewPartnerWithInvalidProperties(): void
    {
        $partner = PartnerBuilder::instance();

        $this->expectException(InvalidPartnerException::class);
        Partners::store($partner);
    }

    public function testItCannotStoreNewPartnerWithInvalidAddress(): void
    {
        $address = AddressBuilder::instance();
        $partner = PartnerBuilder::instance()
            ->setName($this->faker->name)
            ->setAddress($address);

        $this->expectException(InvalidAddressException::class);
        Partners::store($partner);
    }

    public function testItCanStoreNewPartnerWithMinimalProperties(): void
    {
        $partner = $this->partnerFactory(true);

        $response = Partners::store($partner);

        $this->assertArrayHasKey('id', $response);
        $this->assertSame($partner->getName(), $response['name']);
        $this->assertSame($partner->getAddress()->getCountry(), $response['address']['country_code']);
        $this->assertSame($partner->getAddress()->getCity(), $response['address']['city']);
        $this->assertSame($partner->getAddress()->getPostCode(), $response['address']['post_code']);
        $this->assertSame($partner->getAddress()->getAddress(), $response['address']['address']);
    }

    public function testItCanStoreNewPartnerWithAllProperties(): void
    {
        $partner = $this->partnerFactory();

        $response = Partners::store($partner);

        $this->assertArrayHasKey('id', $response);
        $this->assertSame($partner->getName(), $response['name']);
        $this->assertSame($partner->getAddress()->getCountry(), $response['address']['country_code']);
        $this->assertSame($partner->getAddress()->getCity(), $response['address']['city']);
        $this->assertSame($partner->getAddress()->getPostCode(), $response['address']['post_code']);
        $this->assertSame($partner->getAddress()->getAddress(), $response['address']['address']);
        $this->assertSame($partner->getEmails(), $response['emails']);
        $this->assertSame($partner->getTaxcode(), $response['taxcode']);
        $this->assertSame($partner->getIban(), $response['iban']);
        $this->assertSame($partner->getSwift(), $response['swift']);
        $this->assertSame($partner->getAccountNumber(), $response['account_number']);
        $this->assertSame($partner->getPhone(), $response['phone']);
        $this->assertSame($partner->getGeneralLedgerNumber(), $response['general_ledger_number']);
        $this->assertSame($partner->getTaxType(), $response['tax_type']);
        $this->assertSame(
            $partner->getCustomBillingSettings()->getPaymentMethod(),
            $response['custom_billing_settings']['payment_method']
        );
        $this->assertSame(
            $partner->getCustomBillingSettings()->getDocumentForm(),
            $response['custom_billing_settings']['document_form']
        );
        $this->assertSame(
            $partner->getCustomBillingSettings()->getDueDays(),
            $response['custom_billing_settings']['due_days']
        );
        $this->assertSame(
            $partner->getCustomBillingSettings()->getDocumentCurrency(),
            $response['custom_billing_settings']['document_currency']
        );
        $this->assertSame(
            $partner->getCustomBillingSettings()->getTemplateLanguageCode(),
            $response['custom_billing_settings']['template_language_code']
        );
        $this->assertSame(
            $partner->getCustomBillingSettings()->getDiscount()->getDiscountType(),
            $response['custom_billing_settings']['discount']['type']
        );
        $this->assertSame(
            $partner->getCustomBillingSettings()->getDiscount()->getValue(),
            $response['custom_billing_settings']['discount']['value']
        );
        $this->assertSame($partner->getGroupMemberTaxNumber(), $response['group_member_tax_number']);
    }
}
