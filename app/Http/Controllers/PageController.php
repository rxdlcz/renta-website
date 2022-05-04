<?php

namespace App\Http\Controllers;

use App\Models\tenant;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        $tenants = tenant::get();

        return view('pages.home', compact('tenants'));
    }
}
