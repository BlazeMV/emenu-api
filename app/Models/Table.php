<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public function cafe()
    {
        return $this->belongsTo(Cafe::class, 'cafe_id', 'id');
    }
}
