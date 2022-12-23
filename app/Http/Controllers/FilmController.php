<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Spatie\Permission\Commands\Show;

class FilmController extends Controller
{
    //create
    public function index()
    {
        return Film::all();
    }

    public function show($id)
    {
        return Film::find($id);
    }
    public function filmCreate(Request $request)
    {
        // return $request;
        try {
            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'release_year' => 'required|integer',
                'rating' => 'required|integer',
                'ticket_price' => 'required|double',
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }

        Film::create([
            'title' => $request->title,
            'description' => $request->description,
            'release_year' => $request->release_year,
            'rating' => $request->rating,
            'ticket_price' => $request->ticket_price,
        ]);

        return 'Film ' . $request->name . ' fue agregada exitosamente';
    }
//update
    public function filmUpdate($id, Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'release_year' => 'required|integer',
                'rating' => 'required|integer',
                'ticket_price' => 'required|double',
            ]);


        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
        Film::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'release_year' => $request->release_year,
            'rating' => $request->rating,
            'ticket_price' => $request->ticket_price,
        ]);
        return 'film update ok';
    }
//delete
    public function filmDelete($id)
    {
        Film::find($id)->delete();
        return 'film delete ok'. $id;
    }
    //list film
    public function filmList()
    {
        return Film::get();
    }
//info film 
    public function filmInfo($id)
    {
        return Film::find($id);
    }
}
