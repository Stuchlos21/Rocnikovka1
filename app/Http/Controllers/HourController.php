<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use App\Hour;
use App\Cars;
use DB;

class HourController extends Controller
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
        /*if (Auth::user()->status == 3) {
            $hours = Hour::orderBy('datum','asc')->get()->where('id_user', '==', Auth::user()->surname);
            return view('hours.index')->with('hours', $hours);
        }else{
            $hours = Hour::orderBy('datum','asc')->get();
            return view('hours.index')->with('hours', $hours);
        }*/
        /*if (Auth::user()->status == 3) {    
            $hours = Hour::get()->where('id_user', '==', null);     //pouze hodiny ktere jsou volne (kde neni null)
            $hour = [];
            foreach ($hours as $row) {
                $hour[] = \Calendar::event(
                    $row->ucitel,
                    true,
                    new \DateTime($row->datum),
                    new \DateTime($row->end_date),
                    $row->id_hodiny,
                    [
                        'color' => $row->barva,
                    ]
                );
            }
        
            $calendar = \Calendar::addEvents($hour)
                ->setOptions([
                    'firstDay' => 1,
                    'lang'     => 'cs',
                ])
                ->setCallbacks([
                    'eventClick' => 'function() {alert("")}',
                ]);
        
            return view('hours.eventpage', compact('hours', 'calendar'));
        }
        else
        {
            $hours = Hour::all();
            $hour = [];
            foreach ($hours as $row) {
                $hour[] = \Calendar::event(
                    $row->ucitel,
                    true,
                    new \DateTime($row->datum),
                    new \DateTime($row->end_date),
                    $row->id_hodiny,
                    [
                        'color' => $row->barva,
                    ]
                );
            }
        
            $calendar = \Calendar::addEvents($hour)
                ->setOptions([
                    'firstDay' => 1,
                    'lang'     => 'cs',
                ])
                ->setCallbacks([
	                'eventClick' => 'function(info) {alert(info.jsEvent)}',
                ]);
        
            return view('hours.eventpage', compact('hours', 'calendar'));
        }*/
        {
            $hours = Hour::all();
            $hour = [];
            foreach ($hours as $row) {
                $hour[] = \Calendar::event(
                    $row->ucitel,
                    true,
                    new \DateTime($row->datum),
                    new \DateTime($row->end_date),
                    $row->id_hodiny,
                    [
                        'color' => $row->barva,
                    ]
                );
            }
        
            $calendar = \Calendar::addEvents($hour)
                ->setOptions([
                    'firstDay' => 1,
                    'lang'     => 'cs',
                ])
                ->setCallbacks([
	                'eventClick' => 'function(info) {alert(info.jsEvent)}',
                ]);
        
            return view('hours.eventpage', compact('hours', 'calendar'));
                }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Cars::pluck('nazev', 'id_vozu');
        return view('hours.create')->with(compact('items'));
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
            'datum' => 'required',
            'Číslo_ve_dni' => 'required',
            'id_vozidla' => 'required',
            
        ]);

        //add hour
        $hour = new Hour;
        $hour->ucitel = Auth::user()->surname;
        $hour->datum = $request->input('datum');
        $hour->Číslo_ve_dni = $request->input('Číslo_ve_dni');
        $hour->vozidlo = $request->input('id_vozidla');
        $hour->barva = Auth::user()->barva;
        $hour->end_date = $request->input('end_date');

        $hour->save();

        return redirect('/hours/create')->with('success', 'Hodina přidána!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hour = Hour::find($id);
        return view('hours.show')->with('hour', $hour);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hour = Hour::find($id);
        return view('hours.edit')->with('hour', $hour);
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
        $this->validate($request, [
            'datum' => 'required',
            'Číslo_ve_dni' => 'required',
            
        ]);

        //add hour
        $hour = Hour::find($id);
        $hour->ucitel = $request->input('ucitel');
        $hour->id_user = $request->input('surname');
        $hour->datum = $request->input('datum');
        $hour->Číslo_ve_dni = $request->input('Číslo_ve_dni');

        $hour->save();

        return redirect('/hours')->with('success', 'Úspěšně zapsán!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hour = Hour::find($id);
        $hour->delete();
        return redirect('/hours')->with('success', 'Hodina odstraněna!');
    }
}