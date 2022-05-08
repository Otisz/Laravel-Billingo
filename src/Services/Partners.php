<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Builders\PartnerBuilder;
use Otisz\Billingo\Gateway;

class Partners extends Gateway
{
    /**
     * Returns a list of your partners.
     * The partners are returned sorted by creation date, with the most recent partners appearing first.
     *
     * @param  int  $page
     * @param  int  $perPage
     * @param  string|null  $query
     * @return array
     */
    public function index(int $page = 1, int $perPage = 25, string $query = null): array
    {
        if ($perPage > 100 || $perPage < 1) {
            $perPage = 25;
        }

        return $this->httpGet('partners', array_filter([
            'page' => $page,
            'per_page' => $perPage,
            'query' => $query,
        ]));
    }

    /**
     * Create a new partner. Returns a partner object if the creation is succeeded.
     *
     * @param  \Otisz\Billingo\Builders\PartnerBuilder  $builder
     * @return array
     * @throws \Otisz\Billingo\Exceptions\InvalidAddressException
     */
    public function store(PartnerBuilder $builder): array
    {
        $builder->validate();

        return $this->httpPost('partners', $builder->toArray());
    }

    /**
     * Retrieves the details of an existing partner.
     *
     * @param  int  $id
     * @return array
     */
    public function show(int $id): array
    {
        return $this->httpGet("partners/$id");
    }

    /**
     * Update an existing partner. Returns a partner object if the update is succeeded.
     *
     * @param  int  $id
     * @param  \Otisz\Billingo\Builders\PartnerBuilder  $builder
     * @return array
     * @throws \Otisz\Billingo\Exceptions\InvalidAddressException
     */
    public function update(int $id, PartnerBuilder $builder): array
    {
        $builder->validate();

        return $this->httpPut("partners/$id", $builder->toArray());
    }

    /**
     * Delete an existing partner.
     *
     * @param  int  $id
     * @return array
     */
    public function delete(int $id): array
    {
        return $this->httpDelete("partners/$id");
    }
}
