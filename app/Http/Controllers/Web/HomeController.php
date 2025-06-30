<?php

namespace App\Http\Controllers\Web;

use App\Models\WebProfile;
use App\Models\Sport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $webProfile = WebProfile::first(); // hanya ambil satu
        $sports = Sport::all(); // ambil semua sport dan logo

        return view('web.home', compact('webProfile', 'sports'));
    }
}
