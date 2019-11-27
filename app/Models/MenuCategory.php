<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    public function cafe()
    {
        return $this->belongsTo(Cafe::class, 'cafe_id', 'id');
    }

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class, 'menu_category_id', 'id');
    }
}
