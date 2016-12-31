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
        Cars
      </div>
      @unless (empty($cars))
        <table class="table table-striped">
          <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Actions</td>
          </tr>
        @foreach ($cars as $car)
          <tr>
            <td>{{ $car->id }}</td>
            <td>{{ $car->name }}</td>
            <td>
              {{ link_to_route('cars.show', $title = 'Details', $parameters = ['car'=>$car->id],
                $attributes=['class'=>'btn btn-default btn-sm']) }}
              {{ link_to_route('cars.edit', $title = 'edit', $parameters = ['car'=>$car->id],
                $attributes=['class'=>'btn btn-primary btn-sm']) }}
              {{ Form::open(array('url' => 'cars/' . $car->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-sm')) }}
              {{ Form::close() }}
            </td>
          </tr>
        @endforeach
        </table>
      @else
        There's no cars
      @endunless
      {{ link_to_route('cars.create', 'Add new Car', null, ['class'=>'btn btn-sucess']) }}
    </div>
  </div>
@stop
