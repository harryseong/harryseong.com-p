<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use Mews\Purifier\Facades\Purifier;
use Image;

class PlaceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'getPlace']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::all()->sortBy("name");
        return view('places.index')->withPlaces($places);
    }

    public function getPlace() {
        $id = $_GET['id'];
        $place = Place::find($id);
        $data = [$place->display_name, $place->name, $place->image, $place->home,
            [$place->longitude, $place->latitude], $place->description, $place->date_range];
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('places.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this -> validate($request, [
            'display_name'  => 'required|max:255',
            'name'          => 'required|max:255',
            'longitude'     => ['required' , 'regex:/^(-?(?:1[0-7]|[1-9])?\d(?:\.\d{1,18})?|180(?:\.0{1,18})?)$/'],
            'latitude'      => ['required' , 'regex:/^(-?[1-8]?\d(?:\.\d{1,18})?|90(?:\.0{1,18})?)$/'],
            'description'   => 'required',
            'date_range'    => 'required'
        ]);

        // store in the database
        $place = new Place;

        $place->display_name= $request->display_name;
        $place->name        = $request->name;
        $place->longitude   = $request->longitude;
        $place->latitude    = $request->latitude;
        $place->description = Purifier::clean($request->description);
        $place->date_range  = $request->date_range;
        $place->home        = $request->home;

        // save image
        if($request->hasFile('place_image')) {
            $image = $request->file('place_image');
            $filename = $request->display_name . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->save($location);

            $place->image   = $filename;
        }

        $place->save();

        // Creates a flash (put is the permanent one for the session) session just to the next request to tell the user the post was successfully saved.
        session()->flash('success', 'The new place was successfully saved.');

        return redirect()->route('places.index', $place->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $place = Place::find($id);
        return view('places.show')->withPlace($place);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
