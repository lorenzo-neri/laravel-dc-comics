<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comic;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

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
    public function store(Request $request)
    {
        //dd($request->all());

        $data = $request->all();

        #to do completare form
        $data['description'] = 'prova description';
        $data['series'] = 'prova series';
        $data['sale_date'] = '2023-05-05';
        $data['type'] = 'prova type';
        $data['artists'] = 'prova artists';
        $data['writers'] = 'prova writers';

        //$file_path = null;
        if ($request->has('thumb')) {
            $file_path =  Storage::put('comic_images', $request->thumb);
            $data['thumb'] = $file_path;
        }
        //dd($file_path);


        # Add a new record the the db

        # Without mass assignment of fields
        /*         $new_comic = new Comic();
        if ($request->has('thumb')) {
            $file_path = Storage::put('comics_images', $request->thumb);
            $new_comic->thumb = $file_path;
        }
        $new_comic->title = $request->title;
        $new_comic->price = $request->price;
        $new_comic->save(); */


        # With mass assignment
        //dd($data);
        $comic = Comic::create($data);


        // redirectthe user to a get route, follow the pattern ->  POST/REDIRECT/GET
        return to_route('admin.comics.create', $comic); // new function to_route() laravel 9
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        return view('comic_details', compact('comic')); // views/comic_details.blade.php
    }

    /** 
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        //
    }
}
