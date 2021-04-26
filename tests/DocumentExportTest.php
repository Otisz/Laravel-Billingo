<?php

namespace Otisz\Billingo\Tests;

use Otisz\Billingo\Facades\DocumentBlock;
use Otisz\Billingo\Facades\DocumentExport;

class DocumentExportTest extends TestCase
{
    private array $payload;

    protected function setUp(): void
    {
        parent::setUp();

        $this->payload = [
            'query_type' => 'fulfillment_date',
            'start_date' => '2021-04-26',
            'end_date' => '2021-04-26',
            'document_block_id' => head(DocumentBlock::index()['data'])['id'],
            'export_type' => 'armada',
            'number_start_year' => 0,
            'number_start_sequence' => 0,
            'number_end_year' => 0,
            'number_end_sequence' => 0,
            'payment_method' => 'aruhitel',
            'sort_by' => 'fulfillment_date',
            'other_options' => 'all',
            'filter_extra' => [
                'tensoft_vkod' => 'string',
                'ledger_number' => [
                    'bevetel' => 'string',
                    'vevo' => 'string',
                    'penztar' => 'string',
                    'afa' => 'string',
                ],
                'forintsoft_konyvelesi_naplo_szam' => 'string',
                'positive_ledger_number' => 'string',
                'negative_ledger_number' => 'string',
                'rlb_kata' => true,
                'rlb_note' => 'string',
                'novitax_naplokod' => 'string',
                'use_gross_values' => true,
            ],
        ];
    }

    public function testExport(): void
    {
        $response = DocumentExport::export($this->payload);

        self::assertArrayHasKey('id', $response);
    }

    public function testDownload(): void
    {
        $export = DocumentExport::export($this->payload);
        $response = DocumentExport::download($export['id']);

        self::assertEquals(202, $response->status());
    }

    public function testPoll(): void
    {
        $export = DocumentExport::export($this->payload);
        $response = DocumentExport::poll($export['id']);

        self::assertEquals($export['id'], $response['id']);
        self::assertArrayHasKey('state', $response);
        self::assertArrayHasKey('message', $response);
    }
}
