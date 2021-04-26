<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class Util
{
    /**
     * @param  string  $taxNumber
     *
     * @return array
     */
    public function checkTaxNumber(string $taxNumber): array
    {
        return Billingo::get("utils/check-tax-number/{$taxNumber}");
    }

    /**
     * @param  int|string  $id
     *
     * @return array
     */
    public function convertLegacyId($id): array
    {
        return Billingo::get("utils/convert-legacy-id/{$id}");
    }
}
