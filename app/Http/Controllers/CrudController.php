<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;

class CrudController extends Controller
{
    public function __construct () {
        
    }

    public function getOffers () {
        return Offer::select('id', 'name')-get();
    }


    /* public function store () {
        Offer::create([
            'name' => 'Offer',
            'price' => '5000',
            'details' => 'details',
        ]);
    } */

    public function create () {
        return view('offers.create');
    }

    public function store (Request $request) {
        // Validate data before insert to database

        $rules = $this->getRules();
        
        $errorMessages = $this->getMessages();

        $validator = Validator::make($request->all(), $rules, $errorMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        // Insert

        Offer::create([
            'name' => $request->name, 
            'price' => $request->price, 
            'details' => $request->details,
        ]);

        return redirect()->back()->with(['success' => 'تم إضافة العرض بنجاح']);

    }

    protected function getMessages()
    {
        return $errorMessages = [
            'name.required' => trans('messages.offer name is required'),
            'name.unique' => trans('messages.offer name must be unique'),
            'price.numeric' => 'سعر العرض يجب ان يكون ارقام',
            'price.required' => 'السعر مطلوب',
            'details.required' => 'ألتفاصيل مطلوبة',
        ];
    }

    protected function getRules()
    {
        return $rules = [
            'name' => 'required|max:100|unique:offers,name',
            'price' => 'required|numeric',
            'details' => 'required|max:100',
        ];
    }

}