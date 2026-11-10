<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChirpController extends Controller
{
    public function index()
    {
        $chirps = [
            [
                'author' => 'Jonas',
                'message' => 'Mano pirmoji Laravel programa!',
                'time' => 'prieš 5 minutes',
            ],
            [
                'author' => 'Ona',
                'message' => 'MVC padeda laikyti kodą tvarkingą.',
                'time' => 'prieš 1 valandą',
            ],
            [
                'author' => 'Petras',
                'message' => 'Laravel mokytis smagu.',
                'time' => 'prieš 2 valandas',
            ],
        ];

        return view('home', ['chirps' => $chirps]);
    }
}
