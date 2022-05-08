<?php

namespace Otisz\Billingo\Builders;

use Otisz\Billingo\Enums\Currencies;
use Otisz\Billingo\Enums\DocumentForms;
use Otisz\Billingo\Enums\PaymentMethods;
use Otisz\Billingo\Enums\TemplateLanguages;

class CustomBillingSettingBuilder extends Builder
{
    protected ?DiscountBuilder $discount = null;
    protected ?Currencies $documentCurrency = null;
    protected ?DocumentForms $documentForm = null;
    protected ?int $dueDays = null;
    protected ?PaymentMethods $paymentMethod = null;
    protected ?TemplateLanguages $templateLanguageCode = null;

    public function getDiscount(): ?DiscountBuilder
    {
        return $this->discount;
    }

    public function setDiscount(?DiscountBuilder $discount): CustomBillingSettingBuilder
    {
        $this->discount = $discount;

        return $this;
    }

    public function getDocumentCurrency(): ?string
    {
        return $this->documentCurrency?->value;
    }

    public function setDocumentCurrency(?Currencies $documentCurrency): CustomBillingSettingBuilder
    {
        $this->documentCurrency = $documentCurrency;

        return $this;
    }

    public function getDocumentForm(): ?string
    {
        return $this->documentForm?->value;
    }

    public function setDocumentForm(?DocumentForms $documentForm): CustomBillingSettingBuilder
    {
        $this->documentForm = $documentForm;

        return $this;
    }

    public function getDueDays(): ?int
    {
        return $this->dueDays;
    }

    public function setDueDays(?int $dueDays): CustomBillingSettingBuilder
    {
        $this->dueDays = $dueDays;

        return $this;
    }

    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod?->value;
    }

    public function setPaymentMethod(?PaymentMethods $paymentMethod): CustomBillingSettingBuilder
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    public function getTemplateLanguageCode(): ?string
    {
        return $this->templateLanguageCode?->value;
    }

    public function setTemplateLanguageCode(?TemplateLanguages $templateLanguageCode): CustomBillingSettingBuilder
    {
        $this->templateLanguageCode = $templateLanguageCode;

        return $this;
    }

    public function toArray(): array
    {
        return array_filter([
            'payment_method' => $this->getPaymentMethod(),
            'document_form' => $this->getDocumentForm(),
            'due_days' => $this->getDueDays(),
            'document_currency' => $this->getDocumentCurrency(),
            'template_language_code' => $this->getTemplateLanguageCode(),
            'discount' => $this->getDiscount()?->toArray(),
        ]);
    }

    public function validate(): void
    {
        $this->getDiscount()?->validate();
    }
}
