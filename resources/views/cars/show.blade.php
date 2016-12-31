@extends('layout')

@section('content')
  <h3>Car details</h3>
  <table class="table table-striped">
    <tr>
      <td>Name:</td>
      <td>{{ $car->name }}</td>
    </tr>
  </table>
  {{ link_to_route('cars.index', 'Cars list', null, ['class'=>'btn btn-info']) }}
@stop
