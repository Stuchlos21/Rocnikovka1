<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cars;
use DB;

class CarsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Cars::all();
        return view('vozidla.index')->with('cars', $cars);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vozidla.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nazev' => 'required',
            'spz' => 'required',
            'rok_vyroby' => 'required',
            'barva' => 'required',
            'barva_slovy' => 'required',
            'typ' => 'required',
            'palivo' => 'required',
        ]);

        //add user
        $cars = new Cars;
        $cars->nazev = $request->input('nazev');
        $cars->spz = $request->input('spz');
        $cars->rok_vyroby = $request->input('rok_vyroby');
        $cars->barva = $request->input('barva');
        $cars->barva_slovy = $request->input('barva_slovy');
        $cars->typ = $request->input('typ');
        $cars->palivo = $request->input('palivo');
       
        $cars->save();

        return redirect('/vozidla/create')->with('success', 'Vozidlo přidáno!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Cars::find($id);
        return view('vozidla.show')->with('car', $car);
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
        $car = Cars::find($id);
        $car->delete();
        return redirect('/vozidla')->with('success', 'Vozidlo odtraněno!');
    }
}