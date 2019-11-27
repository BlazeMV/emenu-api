<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cafe;
use App\Models\MenuCategory;
use App\Models\Table;

class CafeController extends Controller
{
    public function all()
    {
        $cafes = Cafe::orderBy('rating', 'desc')->get();

        return $this->jsonResponse([
            'message' => 'success',
            'data' => $cafes->toArray(),
        ]);
    }

    public function menu($id)
    {
        $categories = MenuCategory::where('cafe_id', $id)->with('menuItems')->get();

        return $this->jsonResponse([
            'message' => 'success',
            'data' => $categories->toArray(),
        ]);
    }

    public function tables($id)
    {
        $tables = Table::where('cafe_id', $id)->orderBy('table_no')->get();

        return $this->jsonResponse([
            'message' => 'success',
            'data' => $tables->toArray(),
        ]);
    }
}
