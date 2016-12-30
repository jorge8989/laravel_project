<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Car;

class PagesController extends Controller
{
    public function home() {
      $cars = Car::all();
      return view('welcome', compact('cars'));
    }

    public function about() {
      return view('pages.about');
    }
}
