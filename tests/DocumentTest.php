<?php

namespace Otisz\Billingo\Tests;

use Otisz\Billingo\Facades\Document;
use Otisz\Billingo\Facades\DocumentBlock;
use Otisz\Billingo\Facades\Partner;

class DocumentTest extends TestCase
{
    private array $payload;

    private array $partner;

    protected function setUp(): void
    {
        parent::setUp();

        $this->partner = [
            'name' => $this->faker->name,
            'address' => [
                'country_code' => $this->faker->countryCode,
                'post_code' => $this->faker->postcode,
                'city' => $this->faker->city,
                'address' => $this->faker->streetAddress,
            ],
            'emails' => [
                $this->faker->unique()->safeEmail,
            ],
            'taxcode' => $this->faker->numberBetween(600000, 900000),
            'iban' => $this->faker->iban('hu'),
            'swift' => $this->faker->swiftBicNumber,
            'account_number' => $this->faker->bankAccountNumber,
            'phone' => $this->faker->phoneNumber,
        ];

        $this->payload = [
            'type' => 'invoice',
            'fulfillment_date' => now()->subDay()->toDateString(),
            'due_date' => now()->addDay()->toDateString(),
            'payment_method' => 'bankcard',
            'language' => 'hu',
            'currency' => 'HUF',
            'items' => [
                [
                    'name' => $this->faker->words(3, true),
                    'unit_price' => $this->faker->numberBetween(1, 9),
                    'unit_price_type' => 'gross',
                    'quantity' => $this->faker->numberBetween(2, 5),
                    'unit' => 'óra',
                    'vat' => '0%',
                    'comment' => $this->faker->sentence,
                ],
            ],
        ];
    }

    public function testIndex(): void
    {
        $this->payload['partner_id'] = Partner::store($this->partner)['id'];
        $this->payload['block_id'] = head(DocumentBlock::index()['data'])['id'];

        $document = Document::store($this->payload);

        $response = Document::index();

        self::assertContains($document, $response['data']);
    }

    public function testStore(): void
    {
        $this->payload['partner_id'] = Partner::store($this->partner)['id'];
        $this->payload['block_id'] = head(DocumentBlock::index()['data'])['id'];

        $response = Document::store($this->payload);

        self::assertArrayHasKey('id', $response);
        self::assertArrayHasKey('invoice_number', $response);
        self::assertArrayHasKey('organization', $response);
        self::assertArrayHasKey('partner', $response);
        self::assertArrayHasKey('items', $response);

        self::assertEquals($this->payload['type'], $response['type']);
        self::assertEquals(false, $response['cancelled']);
        self::assertEquals($this->payload['block_id'], $response['block_id']);
        self::assertEquals('paid', $response['payment_status']);
        self::assertEquals($this->payload['payment_method'], $response['payment_method']);
        self::assertEquals($this->payload['currency'], $response['currency']);
        self::assertEquals(today()->toDateString(), $response['invoice_date']);
        self::assertEquals($this->payload['fulfillment_date'], $response['fulfillment_date']);
        self::assertEquals($this->payload['due_date'], $response['due_date']);
        self::assertEquals(today()->toDateString(), $response['paid_date']);
        self::assertEquals($this->payload['partner_id'], $response['partner']['id']);
        self::assertEquals($this->payload['language'], $response['language']);
    }

    public function testShow(): void
    {
        $this->payload['partner_id'] = Partner::store($this->partner)['id'];
        $this->payload['block_id'] = head(DocumentBlock::index()['data'])['id'];

        $document = Document::store($this->payload);

        $response = Document::show($document['id']);

        self::assertEquals($document, $response);
    }

    public function testDestroy(): void
    {
        $this->payload['partner_id'] = Partner::store($this->partner)['id'];
        $this->payload['block_id'] = head(DocumentBlock::index()['data'])['id'];

        $document = Document::store($this->payload);

        Document::destroy($document['id']);

        $response = Document::index();

        self::assertNotContains($document['id'], $response['data']);
    }

    public function testArchive(): void
    {
        $this->payload['type'] = 'proforma';
        $this->payload['partner_id'] = Partner::store($this->partner)['id'];
        $this->payload['block_id'] = head(DocumentBlock::index()['data'])['id'];

        $document = Document::store($this->payload);

        Document::archive($document['id']);

        $response = Document::index();

        self::assertNotContains($document['id'], $response['data']);
    }

    public function testCancel(): void
    {
        $this->payload['partner_id'] = Partner::store($this->partner)['id'];
        $this->payload['block_id'] = head(DocumentBlock::index()['data'])['id'];

        $document = Document::store($this->payload);

        $response = Document::cancel($document['id']);

        self::assertEquals('cancellation', $response['type']);
    }

    public function testCopy(): void
    {
        $this->payload['partner_id'] = Partner::store($this->partner)['id'];
        $this->payload['block_id'] = head(DocumentBlock::index()['data'])['id'];

        $document = Document::store($this->payload);

        $response = Document::copy($document['id']);

        self::assertEquals('draft', $response['type']);
        self::assertNotEquals($document['id'], $response['id']);
        self::assertEquals($document['payment_method'], $response['payment_method']);
        self::assertEquals($document['currency'], $response['currency']);
        self::assertEquals($document['invoice_date'], $response['invoice_date']);
        self::assertEquals($document['due_date'], $response['due_date']);
        self::assertEquals($document['paid_date'], $response['paid_date']);
        self::assertEquals($document['partner']['id'], $response['partner']['id']);
        self::assertEquals($document['document_partner']['id'], $response['document_partner']['id']);
        self::assertEquals($document['items'][0], $response['items'][0]);
        self::assertEquals($document['language'], $response['language']);
    }

    public function testCreateFromProforma(): void
    {
        $this->payload['partner_id'] = Partner::store($this->partner)['id'];
        $this->payload['block_id'] = head(DocumentBlock::index()['data'])['id'];

        $this->payload['type'] = 'proforma';

        $document = Document::store($this->payload);

        $response = Document::createFromProforma($document['id']);

        self::assertEquals('invoice', $response['type']);
    }

    public function testCreateModificationDocument(): void
    {
        $this->payload['partner_id'] = Partner::store($this->partner)['id'];
        $this->payload['block_id'] = head(DocumentBlock::index()['data'])['id'];

        $document = Document::store($this->payload);

        $response = Document::createModificationDocument($document['id'], [
            'items' => [
                $item = [
                    'name' => $this->faker->words(3, true),
                    'unit_price' => $this->faker->numberBetween(1, 9),
                    'unit_price_type' => 'gross',
                    'quantity' => $this->faker->numberBetween(2, 5),
                    'unit' => 'óra',
                    'vat' => '0%',
                    'comment' => $this->faker->sentence,
                ],
            ],
        ]);

        self::assertNotEquals(head($this->payload['items'])['name'], head($response['items'])['name']);
        self::assertEquals($item['name'], head( $response['items'])['name']);
    }

    public function testDownload(): void
    {
        $this->payload['partner_id'] = Partner::store($this->partner)['id'];
        $this->payload['block_id'] = head(DocumentBlock::index()['data'])['id'];

        $document = Document::store($this->payload);

        sleep(5);

        $response = Document::download($document['id']);

        self::assertEquals(200, $response->getStatusCode());
    }

    public function testOnlineSzamla(): void
    {
        self::markTestIncomplete('External government service is required.');

        $this->payload['partner_id'] = Partner::store($this->partner)['id'];
        $this->payload['block_id'] = head(DocumentBlock::index()['data'])['id'];

        $this->payload['items'][0]['unit_price'] = 1000000;
        $this->payload['items'][0]['vat'] = '27%';

        $document = Document::store($this->payload);

        Document::onlineSzamla($document['id']);
    }

    public function testPaymentsShow(): void
    {
        $this->payload['partner_id'] = Partner::store($this->partner)['id'];
        $this->payload['block_id'] = head(DocumentBlock::index()['data'])['id'];

        $document = Document::store($this->payload);

        $response = Document::payments($document['id']);

        self::assertEquals(today()->toDateString(), head($response)['date']);
        self::assertEquals(
            head($this->payload['items'])['unit_price'] * head($this->payload['items'])['quantity'],
            head($response)['price']
        );
        self::assertEquals($this->payload['payment_method'], head($response)['payment_method']);
    }

    public function testPaymentsUpdate(): void
    {
        $this->payload['partner_id'] = Partner::store($this->partner)['id'];
        $this->payload['block_id'] = head(DocumentBlock::index()['data'])['id'];

        $document = Document::store($this->payload);

        $response = Document::paymentsUpdate($document['id'], [
            [
                'date' => today()->toDateString(),
                'price' => 2,
                'payment_method' => 'bankcard',
            ],
        ]);

        self::assertEquals(today()->toDateString(), head($response)['date']);
        self::assertEquals(2, head($response)['price']);
        self::assertEquals('bankcard', head($response)['payment_method']);
    }

    public function testPaymentsDestroy(): void
    {
        $this->payload['partner_id'] = Partner::store($this->partner)['id'];
        $this->payload['block_id'] = head(DocumentBlock::index()['data'])['id'];

        $document = Document::store($this->payload);

        Document::paymentsUpdate($document['id'], [
            [
                'date' => today()->toDateString(),
                'price' => 2,
                'payment_method' => 'bankcard',
            ],
        ]);
        Document::paymentsDestroy($document['id']);

        self::assertEmpty(Document::payments($document['id']));
    }

    public function testPrintPOS(): void
    {
        $this->payload['partner_id'] = Partner::store($this->partner)['id'];
        $this->payload['block_id'] = head(DocumentBlock::index()['data'])['id'];

        $document = Document::store($this->payload);

        $response = Document::printPOS($document['id']);

        self::assertEquals('application/octet-stream', $response->header('Content-Type'));
    }

    public function testPublicURL(): void
    {
        $this->payload['partner_id'] = Partner::store($this->partner)['id'];
        $this->payload['block_id'] = head(DocumentBlock::index()['data'])['id'];

        $document = Document::store($this->payload);

        $response = Document::publicURL($document['id']);

        self::assertArrayHasKey('public_url', $response);
        self::assertNotEmpty($response['public_url']);
    }

    public function testSend(): void
    {
        $this->payload['partner_id'] = Partner::store($this->partner)['id'];
        $this->payload['block_id'] = head(DocumentBlock::index()['data'])['id'];

        $document = Document::store($this->payload);

        $response = Document::send($document['id']);

        self::assertEquals($response['emails'], $this->partner['emails']);
    }
}
