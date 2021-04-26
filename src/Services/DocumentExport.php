<?php

namespace Otisz\Billingo\Services;

use Illuminate\Http\Client\Response;
use Otisz\Billingo\Facades\Billingo;

class DocumentExport
{
    /**
     * @param  array  $payload
     *
     * @return array
     */
    public function export(array $payload): array
    {
        return Billingo::post('document-export', $payload);
    }

    /**
     * @param  int|string  $exportID
     *
     * @return \Illuminate\Http\Client\Response
     */
    public function download($exportID): Response
    {
        return Billingo::download("document-export/{$exportID}/download", [
            'Accept' => 'application/*',
        ]);
    }

    /**
     * @param  int|string  $exportID
     *
     * @return array
     */
    public function poll($exportID): array
    {
        return Billingo::get("document-export/{$exportID}/poll");
    }
}
