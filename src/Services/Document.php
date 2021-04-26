<?php

namespace Otisz\Billingo\Services;

use Illuminate\Http\Client\Response;
use Otisz\Billingo\Facades\Billingo;

class Document
{
    /**
     * @param  int  $page
     * @param  int  $perPage
     * @param  array  $payload
     *
     * @return array
     */
    public function index(int $page = 1, int $perPage = 25, array $payload = []): array
    {
        if ($perPage > 100 || $perPage < 1) {
            $perPage = 25;
        }

        $payload['page'] = $page;
        $payload['per_page'] = $perPage;

        return Billingo::get('documents', $payload);
    }

    /**
     * @param  array  $payload
     *
     * @return array
     */
    public function store(array $payload): array
    {
        return Billingo::post('documents', $payload);
    }

    /**
     * @param  int|string  $documentID
     *
     * @return array
     */
    public function show($documentID): array
    {
        return Billingo::get("documents/{$documentID}");
    }

    /**
     * @param  int|string  $documentID
     *
     * @return array
     */
    public function destroy($documentID): array
    {
        return Billingo::delete("documents/{$documentID}");
    }

    /**
     * @param  int|string  $documentID
     *
     * @return array
     */
    public function archive($documentID): array
    {
        return Billingo::put("documents/{$documentID}/archive");
    }

    /**
     * @param  int|string  $documentID
     *
     * @return array
     */
    public function cancel($documentID): array
    {
        return Billingo::post("documents/{$documentID}/cancel");
    }

    /**
     * @param  int|string  $documentID
     *
     * @return array
     */
    public function copy($documentID): array
    {
        return Billingo::post("documents/{$documentID}/copy");
    }

    /**
     * @param  int|string  $documentID
     *
     * @return array
     */
    public function createFromProforma($documentID): array
    {
        return Billingo::post("documents/{$documentID}/create-from-proforma");
    }

    /**
     * @param  int|string  $documentID
     *
     * @return array
     */
    public function createModificationDocument($documentID): array
    {
        return Billingo::post("documents/{$documentID}/create-modification-document");
    }

    /**
     * @param  int|string  $documentID
     *
     * @return \Illuminate\Http\Client\Response
     */
    public function download($documentID): Response
    {
        return Billingo::download("documents/{$documentID}/download");
    }

    /**
     * @param  int|string  $documentID
     *
     * @return array
     */
    public function onlineSzamla($documentID): array
    {
        return Billingo::get("documents/{$documentID}/online-szamla");
    }

    /**
     * @param  int|string  $documentID
     *
     * @return array
     */
    public function payments($documentID): array
    {
        return Billingo::get("documents/{$documentID}/payments");
    }

    /**
     * @param  int|string  $documentID
     *
     * @return array
     */
    public function deletePayments($documentID): array
    {
        return Billingo::delete("documents/{$documentID}/payments");
    }

    /**
     * @param  int|string  $documentID
     *
     * @return \Illuminate\Http\Client\Response
     */
    public function printPOS($documentID): Response
    {
        return Billingo::download("documents/{$documentID}/print/pos");
    }

    /**
     * @param  int|string  $documentID
     *
     * @return array
     */
    public function publicURL($documentID): array
    {
        return Billingo::get("documents/{$documentID}/public-url");
    }

    /**
     * @param  int|string  $documentID
     *
     * @return array
     */
    public function send($documentID): array
    {
        return Billingo::post("documents/{$documentID}/send");
    }
}
