<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\Promo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Pengumuman::all();
        $promo = Promo::all();
        // dd($promo);
        return view('home', compact('data', 'promo'));
    }
}
