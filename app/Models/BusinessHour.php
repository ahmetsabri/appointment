<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessHour extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function getTimesPeriodAttribute()
    {
        $times = CarbonInterval::minutes($this->step)->toPeriod($this->from, $this->to)->toArray();

        return array_map(function ($time) {

            if ($this->day == today()->format('l') &&  !$time->isPast()) {
                return $time->format('H:i');
            }

            if ($this->day != today()->format('l')) {
                return $time->format('H:i');
            }

        }, $times);
    }
}
