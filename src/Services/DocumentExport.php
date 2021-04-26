<?php

namespace Otisz\Billingo\Services;

use Illuminate\Http\Client\Response;
use Otisz\Billingo\Facades\Billingo;

class DocumentExport
{
    /**
     * @return array
     */
    public function export(): array
    {
        return Billingo::post('document-export');
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
