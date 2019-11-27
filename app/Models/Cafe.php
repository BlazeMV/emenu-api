<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    protected $appends = ['open'];

    public function getOpenAttribute()
    {
        if ($this->always_open) {
            $open = true;
        } else {
            $time = Carbon::now();
            list($start_hour, $start_minute, $start_second) = explode(':', $this->opening_hour);
            list($end_hour, $end_minute, $end_second) = explode(':', $this->closing_hour);
            $morning = Carbon::create($time->year, $time->month, $time->day, $start_hour, $start_minute, $start_second);
            $evening = Carbon::create($time->year, $time->month, $time->day, $end_hour, $end_minute, $end_second);
            if($time->between($morning, $evening, true)) {
                $open = true;
            } else {
                $open = false;
            }
        }
        return $this->attributes['open'] = $open;
    }

    public function menuCategories()
    {
        return $this->hasMany(MenuCategory::class, 'cafe_id', 'id');
    }

    public function tables()
    {
        return $this->hasMany(Table::class, 'cafe_id', 'id');
    }
}
