<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function homepage() {
        $title = 'Vítej na stránce!';
        return view ('pages/homepage')->with('title', $title);
    }

    public function cenik() {
        $title = 'Ceník!';
        return view ('pages/cenik')->with('title', $title);
    }

    public function kontakty() {
        $title = 'Kontakty!';
        return view ('pages/kontakty')->with('title', $title);
    }

    public function instruktori() {
        $title = 'Intruktoři!';
        return view ('pages/instruktori')->with('title', $title);
    }

    public function vozy() {
        $title = 'Vozidla!';
        return view ('pages/vozy')->with('title', $title);
    }
}
