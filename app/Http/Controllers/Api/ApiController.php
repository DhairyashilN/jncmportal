<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        //dd('a');
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA'
            ]);
    }
}
