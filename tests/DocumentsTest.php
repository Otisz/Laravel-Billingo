<?php

namespace Otisz\Billingo\Tests;

use Otisz\Billingo\Facades\Billingo;

class DocumentsTest extends TestCase
{
    /**
     * @var array
     */
    private $payload;

    /**
     * @var array
     */
    private $partner;

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

    /** @test */
    public function documentsIndex(): void
    {
        $this->payload['partner_id'] = Billingo::partners()->store($this->partner)['id'];
        $this->payload['block_id'] = head(Billingo::documentBlocks()->index()['data'])['id'];

        $document = Billingo::documents()->store($this->payload);

        $response = Billingo::documents()->index();

        $this->assertContains($document, $response['data']);
    }

    /** @test */
    public function documentsStore(): void
    {
        $this->payload['partner_id'] = Billingo::partners()->store($this->partner)['id'];
        $this->payload['block_id'] = head(Billingo::documentBlocks()->index()['data'])['id'];

        $response = Billingo::documents()->store($this->payload);

        $this->assertArrayHasKey('id', $response);
        $this->assertArrayHasKey('invoice_number', $response);
        $this->assertArrayHasKey('organization', $response);
        $this->assertArrayHasKey('partner', $response);
        $this->assertArrayHasKey('items', $response);

        $this->assertEquals($this->payload['type'], $response['type']);
        $this->assertEquals(false, $response['cancelled']);
        $this->assertEquals($this->payload['block_id'], $response['block_id']);
        $this->assertEquals('paid', $response['payment_status']);
        $this->assertEquals($this->payload['payment_method'], $response['payment_method']);
        $this->assertEquals($this->payload['currency'], $response['currency']);
        $this->assertEquals(today()->toDateString(), $response['invoice_date']);
        $this->assertEquals($this->payload['fulfillment_date'], $response['fulfillment_date']);
        $this->assertEquals($this->payload['due_date'], $response['due_date']);
        $this->assertEquals(today()->toDateString(), $response['paid_date']);
        $this->assertEquals($this->payload['partner_id'], $response['partner']['id']);
        $this->assertEquals($this->payload['language'], $response['language']);
    }

    /** @test */
    public function documentsShow(): void
    {
        $this->payload['partner_id'] = Billingo::partners()->store($this->partner)['id'];
        $this->payload['block_id'] = head(Billingo::documentBlocks()->index()['data'])['id'];

        $document = Billingo::documents()->store($this->payload);

        $response = Billingo::documents()->show($document['id']);

        $this->assertEquals($document, $response);
    }

    /** @test */
    public function documentsCancel(): void
    {
        $this->payload['partner_id'] = Billingo::partners()->store($this->partner)['id'];
        $this->payload['block_id'] = head(Billingo::documentBlocks()->index()['data'])['id'];

        $document = Billingo::documents()->store($this->payload);

        $response = Billingo::documents()->cancel($document['id']);

        $this->assertEquals('cancellation', $response['type']);
    }

    /** @test */
    public function documentsCreateFromProforma(): void
    {
        $this->payload['partner_id'] = Billingo::partners()->store($this->partner)['id'];
        $this->payload['block_id'] = head(Billingo::documentBlocks()->index()['data'])['id'];

        $this->payload['type'] = 'proforma';

        $document = Billingo::documents()->store($this->payload);

        $response = Billingo::documents()->createFromProforma($document['id']);

        $this->assertEquals('invoice', $response['type']);
    }

    /** @test */
    public function documentsDownload(): void
    {
        $this->payload['partner_id'] = Billingo::partners()->store($this->partner)['id'];
        $this->payload['block_id'] = head(Billingo::documentBlocks()->index()['data'])['id'];

        $document = Billingo::documents()->store($this->payload);

        sleep(3);

        $response = Billingo::documents()->download($document['id']);

        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function documentsOnlineSzamla(): void
    {
        $this->markTestIncomplete('External government service is required.');

        $this->payload['partner_id'] = Billingo::partners()->store($this->partner)['id'];
        $this->payload['block_id'] = head(Billingo::documentBlocks()->index()['data'])['id'];

        $this->payload['items'][0]['unit_price'] = 1000000;
        $this->payload['items'][0]['vat'] = '27%';

        $document = Billingo::documents()->store($this->payload);

        Billingo::documents()->onlineSzamla($document['id']);
    }

    /** @test */
    public function documentsPaymentsShow(): void
    {
        $this->payload['partner_id'] = Billingo::partners()->store($this->partner)['id'];
        $this->payload['block_id'] = head(Billingo::documentBlocks()->index()['data'])['id'];

        $document = Billingo::documents()->store($this->payload);

        $response = Billingo::documents()->payments($document['id'])->show();

        $this->assertEquals(today()->toDateString(), head($response)['date']);
        $this->assertEquals(
            head($this->payload['items'])['unit_price'] * head($this->payload['items'])['quantity'],
            head($response)['price']
        );
        $this->assertEquals($this->payload['payment_method'], head($response)['payment_method']);
    }

    /** @test */
    public function documentsPaymentsUpdate(): void
    {
        $this->payload['partner_id'] = Billingo::partners()->store($this->partner)['id'];
        $this->payload['block_id'] = head(Billingo::documentBlocks()->index()['data'])['id'];

        $document = Billingo::documents()->store($this->payload);

        $response = Billingo::documents()->payments($document['id'])->update([
            [
                'date' => today()->toDateString(),
                'price' => 2,
                'payment_method' => 'bankcard',
            ],
        ]);

        $this->assertEquals(today()->toDateString(), head($response)['date']);
        $this->assertEquals(2, head($response)['price']);
        $this->assertEquals('bankcard', head($response)['payment_method']);
    }

    /** @test */
    public function documentsPaymentsDestroy(): void
    {
        $this->payload['partner_id'] = Billingo::partners()->store($this->partner)['id'];
        $this->payload['block_id'] = head(Billingo::documentBlocks()->index()['data'])['id'];

        $document = Billingo::documents()->store($this->payload);

        Billingo::documents()->payments($document['id'])->update([
            [
                'date' => today()->toDateString(),
                'price' => 2,
                'payment_method' => 'bankcard',
            ],
        ]);
        Billingo::documents()->payments($document['id'])->destroy();

        $this->assertEmpty(Billingo::documents()->payments($document['id'])->show());
    }

    /** @test */
    public function documentsPublicURL(): void
    {
        $this->payload['partner_id'] = Billingo::partners()->store($this->partner)['id'];
        $this->payload['block_id'] = head(Billingo::documentBlocks()->index()['data'])['id'];

        $document = Billingo::documents()->store($this->payload);

        $response = Billingo::documents()->publicURL($document['id']);

        $this->assertArrayHasKey('public_url', $response);
        $this->assertNotEmpty($response['public_url']);
    }

    /** @test */
    public function documentsSend(): void
    {
        $this->payload['partner_id'] = Billingo::partners()->store($this->partner)['id'];
        $this->payload['block_id'] = head(Billingo::documentBlocks()->index()['data'])['id'];

        $document = Billingo::documents()->store($this->payload);

        $response = Billingo::documents()->send($document['id']);

        $this->assertEquals($response['emails'], $this->partner['emails']);
    }
}
