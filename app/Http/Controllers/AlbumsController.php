<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
    public function index(){
        $albums = Album::with('photos')->get();

        return view('albums.index')->with('albums', $albums);
    }

    public function create(){
        return view('albums.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            "name" => "required",
            "cover_image" => "image|max:1999"
        ]);

        $fileNameWithExt = $request->file('cover_image')->getClientOriginalName(); //get original file name with extension
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);//get just file name
        $extension = $request->file('cover_image')->getClientOriginalExtension();// get extension

        $fileNameToStore = $fileName.'_'.time().'.'.$extension;//rename file name

        $path = $request->file('cover_image')->storeAs('public/album_covers', $fileNameToStore);//Upload file to path

        //create album
        $album = new Album;
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $fileNameToStore;

        $album->save();

        return redirect('/albums')->with('success', 'Album created');
    }

    public function show($id){
        $album = Album::with('photos')->find($id);
        return view('albums.show')->with('album', $album);
    }
}
