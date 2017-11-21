<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index')->withTags($tags);
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
        $this -> validate($request, array(
            'name' => 'required|max:255'
        ));

        // store in the database
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();

        // Creates a flash (put is the permanent one for the session) session just to the next request to tell the user the tag was successfully saved.
        session()->flash('success', 'The tag was successfully saved.');

        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);

        return view('tags.show')->withTag($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('tags.edit')->withTag($tag);
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
        $tag = Tag::find($id);

        $this -> validate($request, array(
            'name' => 'required|max:255'
        ));

        // update in the database
        $tag->name = $request->name;
        $tag->save();

        // Creates a flash (put is the permanent one for the session) session just to the next request to tell the user the tag was successfully saved.
        session()->flash('success', 'The tag was successfully updated.');

        return redirect()->route('tags.show', $tag);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->posts()->detach();
        $tag->delete();

        session()->flash('success', 'The tag was successfully deleted.');

        return redirect()->route('tags.index');
    }
}
