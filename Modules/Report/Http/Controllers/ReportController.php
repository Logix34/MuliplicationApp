<?php

namespace Modules\Report\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Report\Entities\Report;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function reports_abc_all(){
        $user = Auth::user();
        $reports = $user->reports;
        return view('report::report_all', compact('reports'));
    }
    public function report_abc_view(Report $report){
        return view('report::report_view', compact('report'));
    }
    public function report_abc()
    {
        $user = Auth::user();
        return view('report::report_abc', compact('user'));
    }
    public function report_abc_store(Request $request){
        Report::create($request->except('_token'));
        return back()->with('success','Report data added Successfully');
    }
}
