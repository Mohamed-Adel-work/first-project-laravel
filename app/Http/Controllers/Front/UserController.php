<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;

class UserController extends Controller
{

  public function showUserName()
  {
    return 'Mohamed Adel';
  }

  public function getIndex () {

    // $data = []; // But this works best for big projects
    // $data['name'] = 'Mohamed Adel';
    // $data['id'] = 1;
    // $data['age'] = 15;

    // $obj = new \stdClass();

    // $obj->name = 'Mohamed Adel';
    // $obj->id = 1;
    // $obj->age = 15;

    $data = ['mohamed', 'adel'];

    return view('welcome', compact('data'));
    // return view('welcome', compact('obj'));//->with([ 'string' => 'Mohamed Adel']); // And but this works best for small projects
  }

}
