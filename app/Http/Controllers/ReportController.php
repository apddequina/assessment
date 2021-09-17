<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    //constructor for auth
    public function __construct(){
        $this->middleware('auth');
    }

    //
    public function AllReport(){
        $reports = Orders::latest()->paginate(5);
        return view('report.index', compact('reports'));
    }

    
}
