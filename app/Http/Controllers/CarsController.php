<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Car;
use Input;
use Validator;
use Session;
use Redirect;

class CarsController extends Controller
{
    public function index() {
      $cars = Car::all();
      return view('cars.index', compact('cars'));
    }

    public function show($id) {
      $car = Car::find($id);

      return view('cars.show')
          ->with('car', $car);
    }

    public function create() {
      return view('cars.create');
    }

    public function store() {
      $rules = array(
           'name'       => 'required'
       );
       $validator = Validator::make(Input::all(), $rules);

       if ($validator->fails()) {
           return Redirect::route('cars.create')
               ->withErrors($validator)
               ->withInput(Input::except('password'));
       } else {
      $car = new Car;
      $car->name = Input::get('name');
      $car->save();

      // redirect
      Session::flash('message', 'Successfully created Car!');
      return redirect('cars');
      }
    }

    public function edit($id) {
      // get the nerd
      $car = Car::find($id);

      // show the edit form and pass the nerd
      return view('cars.edit')
          ->with('car', $car);
    }

    public function update($id) {
      $rules = array(
        'name'       => 'required',
      );
    $validator = Validator::make(Input::all(), $rules);

    // process the login
    if ($validator->fails()) {
        return Redirect::route('cars.edit', array('car'=>$id))
            ->withErrors($validator)
            ->withInput(Input::except('password'));
    } else {
      $car = Car::find($id);
      $car->name = Input::get('name');
      $car->save();
      Session::flash('message', 'Successfully updated Car!');
      return redirect('cars');
    }
  }

    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();

        return redirect('cars');
    }
}
