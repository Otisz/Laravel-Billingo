<?php

namespace Otisz\Billingo\Tests;

use Otisz\Billingo\Facades\Billingo;

class BankAccountsTest extends TestCase
{
    /**
     * @var array
     */
    protected $payload;

    protected function setUp(): void
    {
        parent::setUp();

        $this->payload = [
            'name' => $this->faker->words(3, true),
            'account_number' => $this->faker->bankAccountNumber,
            'account_number_iban' => $this->faker->iban('hu'),
            'swift' => $this->faker->words(3, true),
            'currency' => 'HUF',
            'need_qr' => false,
        ];
    }

    /** @test */
    public function bankAccountIndex(): void
    {
        $this->markTestIncomplete();
        $bankAccount = Billingo::bankAccount()->store($this->payload);

        $response = Billingo::bankAccount()->index();

        $this->assertContains($bankAccount, $response['data']);
    }

    /** @test */
    public function bankAccountStore(): void
    {
        $this->markTestIncomplete();
        $this->assertArrayNotHasKey('id', $this->payload);

        $response = Billingo::bankAccount()->store($this->payload);

        $this->assertArrayHasKey('id', $response);

        $this->assertEquals($this->payload['name'], $response['name']);
        $this->assertEquals($this->payload['account_number'], $response['account_number']);
        $this->assertEquals($this->payload['account_number_iban'], $response['account_number_iban']);
        $this->assertEquals($this->payload['swift'], $response['swift']);
        $this->assertEquals($this->payload['currency'], $response['currency']);
        $this->assertEquals($this->payload['need_qr'], $response['need_qr']);
    }

    /** @test */
    public function bankAccountShow(): void
    {
        $this->markTestIncomplete();
        $bankAccount = Billingo::bankAccount()->store($this->payload);

        $response = Billingo::bankAccount()->show($bankAccount['id']);

        $this->assertEquals($bankAccount, $response);
    }

    /** @test */
    public function bankAccountUpdate(): void
    {
        $this->markTestIncomplete();
        $bankAccount = Billingo::bankAccount()->store($this->payload);

        $payload = $bankAccount;
        unset($payload['id']);
        $payload['name'] = $this->faker->words(3, true);

        $response = Billingo::bankAccount()->update($bankAccount['id'], $payload);

        $this->assertNotEquals($bankAccount, $response);
        $this->assertEquals($payload['name'], $response['name']);
    }

    /** @test */
    public function bankAccountDestroy(): void
    {
        $this->markTestIncomplete();
        $bankAccount = Billingo::bankAccount()->store($this->payload);

        Billingo::bankAccount()->destroy($bankAccount['id']);

        $response = Billingo::bankAccount()->index();

        $this->assertNotContains($bankAccount, $response['data']);
    }
}
