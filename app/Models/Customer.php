<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['user_id', 'full_name', 'contact_no'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
