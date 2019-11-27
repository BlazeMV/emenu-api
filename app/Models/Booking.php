<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['cafe_id', 'table_id', 'customer_id', 'approved_employee_id', 'status', 'from', 'to', 'remarks', 'created_at', 'updated_at'];

    protected $dates = ['from', 'to'];

    protected $with = ['cafe', 'table'];

    protected $appends = ['start', 'until'];

    public function getStartAttribute()
    {
        return $this->attributes['start'] = Carbon::parse($this->from)->format('d M, H:i');
    }

    public function getUntilAttribute()
    {
        return $this->attributes['until'] = Carbon::parse($this->to)->format('d M, H:i');
    }

    public function cafe()
    {
        return $this->belongsTo(Cafe::class, 'cafe_id', 'id');
    }

    public function table()
    {
        return $this->belongsTo(Table::class, 'table_id', 'id');
    }
}
