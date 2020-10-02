<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class Utils
{
    private $uri = 'utils';

    /**
     * @param  string  $taxNumber
     *
     * @return array
     */
    public function checkTaxNumber(string $taxNumber): array
    {
        return Billingo::get("{$this->uri}/check-tax-number/{$taxNumber}");
    }

    /**
     * @param  int  $id
     *
     * @return array
     */
    public function convertLegacyId(int $id): array
    {
        return Billingo::get("{$this->uri}/convert-legacy-id/{$id}");
    }
}
