<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class Clients
{
    /**
     * Get a listing of clients
     *
     * @example https://billingo.readthedocs.io/en/latest/clients/#list-of-clients
     *
     * @param  int  $page  Show the given page
     * @param  int  $maxPerPage  Sets the maximum number of results to return. Absolute maximum is 50!
     *
     * @return array
     */
    public function all(int $page = 1, int $maxPerPage = 20): array
    {
        if ($maxPerPage > 50) {
            $maxPerPage = 50;
        }

        $options = [
            'page' => $page,
            'max_per_page' => $maxPerPage,
        ];

        return Billingo::get('clients', $options);
    }

    /**
     * Create a new client
     *
     * @example https://billingo.readthedocs.io/en/latest/clients/#create-a-client
     *
     * @param  array  $clientPayload  Information about the new client
     *
     * @return array
     */
    public function create(array $clientPayload): array
    {
        return Billingo::post('clients', $clientPayload);
    }

    /**
     * Find a specific client
     *
     * @example https://billingo.readthedocs.io/en/latest/clients/#list-of-clients
     *
     * @param  int|string  $clientId  Client id provided by Billingo
     *
     * @return array
     */
    public function find($clientId): array
    {
        return Billingo::get("clients/{$clientId}");
    }

    /**
     * Update a specified client
     *
     * @example https://billingo.readthedocs.io/en/latest/clients/#update-a-client
     *
     * @param  int|string  $clientId  Client id provided by Billingo
     * @param  array  $clientPayload  Information about the new client
     *
     * @return array
     */
    public function update($clientId, array $clientPayload): array
    {
        return Billingo::put("clients/{$clientId}", $clientPayload);
    }

    /**
     * Delete an existing client
     *
     * @example https://billingo.readthedocs.io/en/latest/clients/#delete-client
     *
     * @param  int|string  $clientId  Client id provided by Billingo
     *
     * @return array
     */
    public function destroy($clientId): array
    {
        return Billingo::delete("clients/{$clientId}");
    }
}
