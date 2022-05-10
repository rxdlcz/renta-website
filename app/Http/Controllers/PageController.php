<?php

namespace App\Http\Controllers;

use App\Models\bill;
use App\Models\tenant;
use App\Models\Unit;
use App\Models\location;
use App\Models\payment;
use Illuminate\Http\Request;
use Carbon;
use Session;

class PageController extends Controller
{
    public function home(){
        $tenants = tenant::get();
        $locations = location::get();

        return view('pages.home', compact('tenants', 'locations'));
    }

    public function myAccount(){
        $mytime = Carbon\Carbon::now()->format('Y-m-d');

        $tenant = array();
        if (Session::has('loginId')) {
            $tenant = tenant::where('id', '=', Session::get('loginId'))->first();
            $unit = Unit::find($tenant->unit_id);
            $location = location::find($unit->location_id);
            $bills = bill::where('tenant_id','=', Session::get('loginId'))->get();
            $billsUnpaid = bill::where('status', 2)->count();
            $payments = payment::get();
        }

        return view('pages.myAccount', compact('tenant', 'mytime', 'unit', 'location', 'bills', 'billsUnpaid', 'payments'));
    }

    public function aboutUs(){
        return view('pages.aboutUs');
    }
}
