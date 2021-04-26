<?php

namespace Otisz\Billingo\Tests;

use Otisz\Billingo\Facades\BankAccount;

class BankAccountTest extends TestCase
{
    protected array $payload;

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

    public function testIndex(): void
    {
        $bankAccount = BankAccount::store($this->payload);

        $response = BankAccount::index();

        self::assertContains($bankAccount['id'], $response['data'][0]);

        BankAccount::destroy($bankAccount['id']);
    }

    public function testStore(): void
    {
        self::assertArrayNotHasKey('id', $this->payload);

        $response = BankAccount::store($this->payload);

        self::assertArrayHasKey('id', $response);

        self::assertEquals($this->payload['name'], $response['name']);
        self::assertEquals($this->payload['account_number'], $response['account_number']);
        self::assertEquals($this->payload['account_number_iban'], $response['account_number_iban']);
        self::assertEquals($this->payload['swift'], $response['swift']);
        self::assertEquals($this->payload['currency'], $response['currency']);
        self::assertEquals($this->payload['need_qr'], $response['need_qr']);

        BankAccount::destroy($response['id']);
    }

    public function testShow(): void
    {
        $bankAccount = BankAccount::store($this->payload);

        $response = BankAccount::show($bankAccount['id']);

        self::assertEquals($bankAccount, $response);

        BankAccount::destroy($bankAccount['id']);
    }

    public function testUpdate(): void
    {
        $bankAccount = BankAccount::store($this->payload);

        $payload = $bankAccount;
        unset($payload['id']);
        $payload['name'] = $this->faker->words(3, true);

        $response = BankAccount::update($bankAccount['id'], $payload);

        self::assertNotEquals($bankAccount, $response);
        self::assertEquals($payload['name'], $response['name']);

        BankAccount::destroy($bankAccount['id']);
    }

    public function testDestroy(): void
    {
        $bankAccount = BankAccount::store($this->payload);

        BankAccount::destroy($bankAccount['id']);

        $response = BankAccount::index();

        self::assertNotContains($bankAccount, $response['data']);
    }
}
