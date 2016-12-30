@extends('layout')

@section('content')
  <div class="flex-center position-ref full-height">
    @if (Route::has('login'))
      <div class="top-right links">
        @if (Auth::check())
          <a href="{{ url('/home') }}">Home</a>
        @else
          <a href="{{ url('/login') }}">Login</a>
          <a href="{{ url('/register') }}">Register</a>
        @endif
      </div>
    @endif

    <div class="content">
      <div class="title m-b-md">
        Laravel
      </div>
      @unless (empty($cars))
        @foreach ($cars as $car)
          <li>{{ $car }}</li>
        @endforeach
      @else
        There's no cars
      @endunless
    </div>
  </div>
@stop
