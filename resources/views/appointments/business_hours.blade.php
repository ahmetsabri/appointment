@extends('layouts.home')

@section('content')
<div class="container">
    <h1 class="center">
        Business Hours
    </h1>

    <div class="row center">

        <form action="{{route('business_hours.update')}}" method="post">
            @csrf
            @foreach($businessHours as $businessHour)
                        <div class="col s3">
                <h4>
                    {{$businessHour->day}}
                </h4>
            </div>
            <input type="hidden" name="data[{{$businessHour->day}}][day]" value="{{$businessHour->day}}">
            <div class="input-field col s3">
                <input type="text" class="timepicker" value="{{$businessHour->from}}" name="data[{{$businessHour->day}}][from]" placeholder="From">
            </div>

            <div class="input-field col s2">
                <input type="text" class="timepicker" value="{{$businessHour->to}}" name="data[{{$businessHour->day}}][to]" placeholder="To">
            </div>
            <div class="input-field col s1">
                <input type="number" name="data[{{$businessHour->day}}][step]" value="{{$businessHour->step}}" placeholder="Step">
            </div>

            <div class="input-field col s3">
                <p>
                    <label>
                        <input value="true" name="data[{{$businessHour->day}}][off]" class="filled-in" type="checkbox" @checked($businessHour->off) />
                        <span>OFF</span>
                    </label>
                </p>
            </div>

            @endforeach



            <div class="col s12">

                <button class="waves-effect waves-light btn info darken-2" type="submit">
                    save
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.timepicker');
        var instances = M.Timepicker.init(elems, {
            twelveHour:false
        });
    });
</script>
@endsection
