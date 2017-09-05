<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use Illuminate\Http\Request;

class ContestController extends Controller
{
    public function index()
    {
        $contests = Contest::get();
        return view('contest-manager.index', ['contests' => $contests]);
    }

    public function show($id)
    {
        $contest = Contest::with('questions')->find($id);
        return view('contest-manager.show', ['contest' => $contest]);
    }
}
