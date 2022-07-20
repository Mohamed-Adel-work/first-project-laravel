<?php

namespace App\Http\Controllers;

use App\HTTP\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;
use LaravelLocalization;

class CrudController extends Controller
{
    public function __construct () {
        
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

    public function store (OfferRequest $request) {

        // Validate data before insert to database

        // $rules = $this->getRules();
        
        // $errorMessages = $this->getMessages();

        // $validator = Validator::make($request->all(), $rules, $errorMessages);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput($request->all());
        // }

        // Insert

        Offer::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,
        ]);

        return redirect()->back()->with(['success' => 'تم إضافة العرض بنجاح']);

    }

    // protected function getMessages()
    // {
    //     return $errorMessages = [
    //         'name.required' => __('messages.offer name is required'), // __ this is or trans
    //         'name.unique' => __('messages.offer name must be unique'), // __ this is or trans
    //         'price.numeric' =>  __('messages.The offer price must be numbers'),
    //         'price.required' => __('messages.Price is required'),
    //         'details.required' => __('messages.Details is required'),
    //     ];
    // }

    // protected function getRules()
    // {
    //     return $rules = [
    //         'name' => 'required|max:100|unique:offers,name',
    //         'price' => 'required|numeric',
    //         'details' => 'required|max:100',
    //     ];
    // }

    
    public function getAllOffers ()
    {
        $offers = Offer::select(
            'id', 
            'price', 
            'name_'. LaravelLocalization::getCurrentLocale().' as name',
            'details_'. LaravelLocalization::getCurrentLocale().' as details'
            )->get(); // return collection
            return view('offers.all', compact('offers'));
        }

        // public function getAllOffers ()
        // {
        //     $offers = Offer::select(
        //         'id', 
        //         'price', 
        //         'name_ar',
        //         'name_en',
        //         'details_ar',
        //         'details_en'
        //     )->get(); // return collection
        //     return view('offers.all', compact('offers'));
        // }
}