<?php

namespace Otisz\Billingo\Services;

use Otisz\Billingo\Facades\Billingo;

class DocumentBlocks
{
    private $uri = 'document-blocks';

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

        $payload = [
            'page' => $page,
            'per_page' => $perPage,
        ];

        return Billingo::get($this->uri, $payload);
    }
}
