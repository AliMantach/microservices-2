<?php

namespace App\Http\Resources;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class Utils
{
    public static function paginate($items, $perPage, $actualPage = null)
    {
        $actualPage = $actualPage ?: (Paginator::resolveCurrentPage() ?: 1);
        $total = count($items);
        $offset = ($actualPage * $perPage) - $perPage;
        $itemstoshow = array_slice($items, $offset, $perPage);
        
        return new LengthAwarePaginator($itemstoshow, $total, $perPage);
    }
}
