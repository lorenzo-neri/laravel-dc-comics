<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comic;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

use App\Http\Requests\StoreComicRequest;
use App\Http\Requests\UpdateComicRequest;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* dd('ciao'); */
        $comics = Comic::all();
        return view('admin.comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComicRequest $request)
    {
        //dd($request->all());
        //$data = $request->all();
        $validate_data = $request->validated();

        #to do completare form


        //questi dati servivano prima che mettessi nullable a determinati valori
        /*$data['description'] = 'prova description';
        $data['series'] = 'prova series';
        $data['sale_date'] = '2023-05-05';
        $data['type'] = 'prova type';
        $data['artists'] = 'prova artists';
        $data['writers'] = 'prova writers'; */

        //$file_path = null;
        if ($request->has('thumb')) {
            $file_path =  Storage::put('thumbs', $request->thumb);
            $validate_data['thumb'] = $file_path;
        }
        //dd($file_path);

        # Add a new record the the db
        # Without mass assignment of fields
        /* $new_comic = new Comic();
            if ($request->has('thumb')) {
                $file_path = Storage::put('comics_images', $request->thumb);
                $new_comic->thumb = $file_path;
            }
            $new_comic->title = $request->title;
            $new_comic->price = $request->price;
            $new_comic->save(); */

        # With mass assignment
        //dd($data);
        //dd($validate_data);
        $comic = Comic::create($validate_data);

        // redirectthe user to a get route, follow the pattern ->  POST/REDIRECT/GET
        return to_route('comics.index', $comic)->with('message', 'Comic creato correttamente🥳');; // new function to_route() laravel 9
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        return view('admin.comics.show', compact('comic')); // views/show.blade.php
    }

    /** 
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        return view('admin.comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComicRequest $request, Comic $comic)
    {
        //dd($request->all());
        //$data = $request->all();
        //dd($comic->thumb);
        //dd($comic);
        $validate_data = $request->validated();

        if ($request->has('thumb') && $comic->thumb) {

            //dd('update the image');
            // delete the previous image
            Storage::delete($comic->thumb);

            // save the new image and take its path
            $newImageFile = $request->thumb;
            $path = Storage::put('thumbs', $newImageFile);
            $validate_data['thumb'] = $path;
        }

        //dd($data);

        $comic->update($validate_data);
        return to_route('comics.index', $comic)->with('message', 'Comic modificato correttamente🥳');; // new function to_route() laravel 9
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        if ($comic->thumb) {
            Storage::delete($comic->thumb);
        }
        $comic->delete();
        return to_route('comics.index')->with('message', 'Comic eliminato correttamente🥳');
    }
}
