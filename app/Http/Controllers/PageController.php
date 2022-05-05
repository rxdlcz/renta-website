<?php

namespace App\Http\Controllers;

use App\Models\tenant;
use App\Models\Unit;
use App\Models\location;
use Illuminate\Http\Request;
use Carbon;
use Session;

class PageController extends Controller
{
    public function home(){
        $tenants = tenant::get();

        return view('pages.home', compact('tenants'));
    }

    public function myAccount(){
        $mytime = Carbon\Carbon::now()->format('Y-m-d');

        $tenant = array();
        if (Session::has('loginId')) {
            $tenant = tenant::where('id', '=', Session::get('loginId'))->first();
            $unit = Unit::find($tenant->unit_id);
            $location = location::find($unit->location_id);
        }

        return view('pages.myAccount', compact('tenant', 'mytime', 'unit', 'location'));
    }
}
