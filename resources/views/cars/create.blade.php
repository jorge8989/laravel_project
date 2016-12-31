@extends('layout')

@section('content')
  <div class="container">
    <h3>Add new car</h3>
    {{ Form::open(['url' => 'cars']) }}
      <div class="form-group">
        {{ Form::label('name', 'Car name') }}
        {{ Form::text('name', Input::old('name'), ['class'=>'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::submit('Save', null, ['class'=>'btn']) }}
      </div>
    {{ Form::close() }}
    {{ link_to_route('cars.index', 'Cars list', null, ['class'=>'btn btn-info']) }}
  </div>
@stop
