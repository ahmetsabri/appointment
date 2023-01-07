<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusinessHoursRequest;
use App\Models\BusinessHour;
use Illuminate\Http\Request;

class BusinessHourController extends Controller
{
    public function index()
    {
        $businessHours = BusinessHour::all();
        return view('appointments.business_hours', compact('businessHours'));
    }

    public function update(BusinessHoursRequest $request)
    {

       BusinessHour::query()->upsert($request->validated()['data'],['day']);

       return back();
    }
}
