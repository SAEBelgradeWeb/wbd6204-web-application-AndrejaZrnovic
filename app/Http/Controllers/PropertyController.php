<?php

namespace App\Http\Controllers;

use App\Models\Booked;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function show()
    {
        $data = Property::all();
        return view('book', ['properties' => $data]);
    }

    public function property()
    {

        return view('property');
    }

    function getInfo()
    {
        return "Form data will be here";

    }

    public function propertyForm(Request $request)
    {
        $request['user_id'] = Auth::user()->id;


        $this->validate($request, [
            'user_id' => 'nullable',
            'name' => 'required',
            'country' => 'required',
            'location' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required'

        ]);

        //dd($request->all());

        Property::create($request->except('_token'));

        //
        return Redirect::back()->with('success', 'Your form has been sent successfuly.');

    }

    public function searchProperties(Request $request)
    {
        $query = $request->all()['query'];


        $result1 = Property::where('name', 'LIKE', $query . "%")->get();
        $results2 = Property::where('country', 'LIKE', $query . "%")->get();

        $properties = $result1->merge($results2);
        return view('property-search', compact('properties'));
    }

    public function index()
    {
        $properties = Property::all();
        return view('property', ['properties' => $properties, 'layout' => 'index']);
    }



    public function store(Request $request)
    {
        $property = new Property();
        $property->location = $request->input('location');
        $property->name = $request->input('name');
        $property->save();
        return redirect('/');
    }


    public function copyBooking($id)
    {
        $booking = Property::find($id);
        Booked::create([

            'name' => $booking->name,
            'country' => $booking->country,
            'location' => $booking->location,
            'price' => $booking->price,
             ]);
        return redirect('/booked');
    }



    public function showBooked()
    {
        $bookings = Booked::all();


        return view('booked',compact('bookings'));
    }

}


