<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PusatlanggananController extends Controller
{
    public function index ()
    {
        return view('pusatlangganan.index');
    }
}
