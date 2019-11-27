<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    public function menuCategory()
    {
        $this->belongsTo(MenuCategory::class, 'menu_category_id', 'id');
    }
}
