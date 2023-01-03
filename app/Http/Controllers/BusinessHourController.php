<?php

namespace App\Http\Controllers;

use App\Models\BusinessHour;
use Illuminate\Http\Request;

class BusinessHourController extends Controller
{
    public function index()
    {
        $businessHours = BusinessHour::all();
        return view('appointments.business_hours', compact('businessHours'));
    }

    public function update(Request $request)
    {
       $data = array_values($request->all()['data']);

       BusinessHour::query()->upsert($data,['day']);

       return back();
    }
}
