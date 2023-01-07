@extends('layouts.home')

@section('content')
<div class="">
    <h1 class="center">
      Available Appointments
    </h1>
        <div class="row">
        @foreach($appointments as $appointment)
                  <div class="col 1">
                <h5 class="center">
                    {{$appointment['date']}}
                </h5>
                <h5 class="center">
                    <b> {{$appointment['day_name']}}</b>
                </h5>
    @if(!$appointment['off'])

                @foreach($appointment['business_hours'] as $time)

                @if (!in_array($time, $appointment['reserved_hours']))
       <form action="{{route('reserve')}}" method="post">
                @csrf
                    <input type="hidden" name="date" value=" {{$appointment['full_date']}}">
                    <input type="hidden" name="time" value="{{$time}}">
                        <button class="waves-effect waves-light btn info darken-2" type="submit">
                            {{$time}}
                        </button>
                        <br>
                        <br>
                    </form>
                @else
                        <button class="waves-effect waves-light btn info darken-2" disabled>
                            {{$time}}
                        </button>

                @endif

                @endforeach
    @endif

            </div>
        @endforeach

        </div>
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
