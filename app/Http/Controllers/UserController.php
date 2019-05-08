<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');  //pokud není přihlášen -> nedostane se
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('tridas','asc')->get()->where('tridas', '>=', 1);
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'nickname' => 'required',
            'phone' => 'required',
            'adress' => 'required',
            //'trida' => 'required',
            //'status' => 'required',
            //'kabinet' => 'required',
            //'barva' => 'required',
        ]);

        //add user
        $user = new User;
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->nickname = $request->input('nickname');
        $user->phone_number = $request->input('phone');
        $user->adress = $request->input('adress');
        $user->status = $request->input('status');
        $user->tridas = $request->input('trida');
        $user->kabinet = $request->input('kabinet');
        $user->barva = $request->input('barva');
        $user->password = bcrypt($request->input('password'));

        $user->save();

        return redirect('/users/create')->with('success', 'User added'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show')->with('user', $user);
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
        $user = User::find($id);
        $user->delete();
        return redirect('/users')->with('success', 'Uživatel odtraněn!');
    }
}
