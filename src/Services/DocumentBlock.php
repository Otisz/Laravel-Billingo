<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class DocumentBlock
{
    /**
     * @param  int  $page
     * @param  int  $perPage
     *
     * @return array
     */
    public function index(int $page = 1, int $perPage = 25): array
    {
        if ($perPage > 100 || $perPage < 1) {
            $perPage = 25;
        }

        return Billingo::get('document-blocks', [
            'page' => $page,
            'per_page' => $perPage,
        ]);
    }
}
