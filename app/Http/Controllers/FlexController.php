<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlexController extends Controller
{
    public function index()
    {
        return view('flex.index');
    }
}
