<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class Recurring
{
    /**
     * Get a listing of my recurring profile(s)
     *
     * @example https://billingo.readthedocs.io/en/latest/recurring/#show-my-recurring-profiles
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

        return Billingo::get('recurring', $options);
    }

    /**
     * Create a new recurring profile
     *
     * @example https://billingo.readthedocs.io/en/latest/recurring/#create-a-new-recurring-profile
     *
     * @param  array  $recurringPayload  Information about the new recurring profile
     *
     * @return array
     */
    public function create(array $recurringPayload): array
    {
        return Billingo::post('recurring', $recurringPayload);
    }

    /**
     * Find a specific recurring profile
     *
     * @example https://billingo.readthedocs.io/en/latest/recurring/#show-my-recurring-profiles
     *
     * @param  int|string  $recurringId  Recurring id provided by Billingo
     *
     * @return array
     */
    public function find($recurringId): array
    {
        return Billingo::get("recurring/{$recurringId}");
    }

    /**
     * Update a specified recurring profile
     *
     * @example https://billingo.readthedocs.io/en/latest/recurring/#update-a-recurring-profile
     *
     * @param  int|string  $recurringId  Recurring profile id provided by Billingo
     * @param  array  $recurringPayload  Information about the new recurring profile
     *
     * @return array
     */
    public function update($recurringId, array $recurringPayload): array
    {
        return Billingo::put("recurring/{$recurringId}", $recurringPayload);
    }

    /**
     * Pause an existing recurring profile
     *
     * @example https://billingo.readthedocs.io/en/latest/recurring/#pause-a-recurring-profile
     *
     * @param  int|string  $recurringId  Recurring profile id provided by Billingo
     *
     * @return array
     */
    public function pause($recurringId): array
    {
        return Billingo::post("recurring/{$recurringId}/stop");
    }

    /**
     * Resume an existing recurring profile
     *
     * @example https://billingo.readthedocs.io/en/latest/recurring/#resume-a-recurring-profile
     *
     * @param  int|string  $recurringId  Recurring profile id provided by Billingo
     *
     * @return array
     */
    public function resume($recurringId): array
    {
        return Billingo::post("recurring/{$recurringId}/resume");
    }
}
