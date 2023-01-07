<?php

namespace App\Services;

use App\Models\Appointment;
use App\Models\BusinessHour;
use Carbon\Carbon;

class AppointmentService {

    public function generateTimeData(Carbon $date)
    {
            $dayName = $date->format('l');

            $businessHours = BusinessHour::where('day',$dayName)->first();

            $hours = array_filter($businessHours->TimesPeriod);

            $currentAppointments = Appointment::where('date', $date->toDateString())->pluck('time')->map(function($time){
                return $time->format('H:i');
            })->toArray();

           $availbleHours = array_diff($hours,$currentAppointments);

           return [
                'day_name' => $dayName,
                'date' => $date->format('d M'),
                'full_date' => $date->format('Y-m-d'),
                'available_hours' => $availbleHours,
                'reserved_hours' => $currentAppointments,
                'business_hours' => $hours,
                'off' => $businessHours->off
            ];
    }
}
