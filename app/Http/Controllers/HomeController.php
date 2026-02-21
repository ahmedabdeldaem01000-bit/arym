<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Regiment;
use App\Models\Soldier;
use Illuminate\Http\Request;

class HomeController extends Controller
{  public function index() {
    $totalSoldiers = Soldier::count();
    $totalSoldiersLeaves = Leave::count();
    $RegimentCount = Regiment::count();
    return view('home',compact('totalSoldiers','totalSoldiersLeaves','RegimentCount'));
}
}
