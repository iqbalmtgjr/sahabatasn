<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkController extends Controller
{
    public function index()
    {
        return view('sk.index');
    }
}
