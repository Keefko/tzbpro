<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $sevices = Service::all();
        return view('services')->with('services', $sevices);
    }

    public function create(){

    }

}
