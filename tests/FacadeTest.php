<?php

namespace Otisz\Billingo\Tests;

use Otisz\Billingo\Facades\BankAccount as BankAccountFacade;
use Otisz\Billingo\Facades\Currency as CurrencyFacade;
use Otisz\Billingo\Facades\Document as DocumentFacade;
use Otisz\Billingo\Facades\DocumentBlock as DocumentBlockFacade;
use Otisz\Billingo\Facades\DocumentExport as DocumentExportFacade;
use Otisz\Billingo\Facades\Organization as OrganizationFacade;
use Otisz\Billingo\Facades\Partner as PartnerFacade;
use Otisz\Billingo\Facades\Product as ProductFacade;
use Otisz\Billingo\Facades\Spending as SpendingFacade;
use Otisz\Billingo\Facades\Util as UtilFacade;
use Otisz\Billingo\Services\BankAccount;
use Otisz\Billingo\Services\Currency;
use Otisz\Billingo\Services\Document;
use Otisz\Billingo\Services\DocumentBlock;
use Otisz\Billingo\Services\DocumentExport;
use Otisz\Billingo\Services\Organization;
use Otisz\Billingo\Services\Partner;
use Otisz\Billingo\Services\Product;
use Otisz\Billingo\Services\Spending;
use Otisz\Billingo\Services\Util;

class FacadeTest extends TestCase
{
    public function testItRegistersBankAccountFacade(): void
    {
        self::assertInstanceOf(BankAccount::class, app('billingo.bank-account'));
        self::assertInstanceOf(BankAccount::class, BankAccountFacade::getFacadeRoot());
    }

    public function testItRegistersCurrencyFacade(): void
    {
        self::assertInstanceOf(Currency::class, app('billingo.currency'));
        self::assertInstanceOf(Currency::class, CurrencyFacade::getFacadeRoot());
    }

    public function testItRegistersDocumentBlockFacade(): void
    {
        self::assertInstanceOf(DocumentBlock::class, app('billingo.document-block'));
        self::assertInstanceOf(DocumentBlock::class, DocumentBlockFacade::getFacadeRoot());
    }

    public function testItRegistersDocumentExportFacade(): void
    {
        self::assertInstanceOf(DocumentExport::class, app('billingo.document-export'));
        self::assertInstanceOf(DocumentExport::class, DocumentExportFacade::getFacadeRoot());
    }

    public function testItRegistersDocumentFacade(): void
    {
        self::assertInstanceOf(Document::class, app('billingo.document'));
        self::assertInstanceOf(Document::class, DocumentFacade::getFacadeRoot());
    }

    public function testItRegistersOrganizationFacade(): void
    {
        self::assertInstanceOf(Organization::class, app('billingo.organization'));
        self::assertInstanceOf(Organization::class, OrganizationFacade::getFacadeRoot());
    }

    public function testItRegistersPartnerFacade(): void
    {
        self::assertInstanceOf(Partner::class, app('billingo.partner'));
        self::assertInstanceOf(Partner::class, PartnerFacade::getFacadeRoot());
    }

    public function testItRegistersProductFacade(): void
    {
        self::assertInstanceOf(Product::class, app('billingo.product'));
        self::assertInstanceOf(Product::class, ProductFacade::getFacadeRoot());
    }

    public function testItRegistersSpendingFacade(): void
    {
        self::assertInstanceOf(Spending::class, app('billingo.spending'));
        self::assertInstanceOf(Spending::class, SpendingFacade::getFacadeRoot());
    }

    public function testItRegistersUtilFacade(): void
    {
        self::assertInstanceOf(Util::class, app('billingo.util'));
        self::assertInstanceOf(Util::class, UtilFacade::getFacadeRoot());
    }
}
