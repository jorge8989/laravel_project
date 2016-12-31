<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Car;
use Input;

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
      $car = new Car;
      $car->name = Input::get('name');
      $car->save();

      // redirect
      return redirect('cars');
    }

    public function edit($id) {
      // get the nerd
      $car = Car::find($id);

      // show the edit form and pass the nerd
      return view('cars.edit')
          ->with('car', $car);
    }

    public function update($id) {
      $car = Car::find($id);
      $car->name = Input::get('name');
      $car->save();
      return redirect('cars');
    }

    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();

        return redirect('cars');
    }
}
