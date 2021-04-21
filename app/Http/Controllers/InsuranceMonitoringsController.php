<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InsuranceMonitoring;
use App\Project;
use Carbon\Carbon;
use DB;
use Auth;
use App\ActivityLog;
use Excel;
use Barryvdh\DomPDF\Facade as PDF;

class InsuranceMonitoringsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('view_insurance')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $insurances = DB::table('insurance_monitorings')
            ->join('projects', 'insurance_monitorings.project_id', '=', 'projects.id')
            ->join('users', 'insurance_monitorings.user_id', '=', 'users.id')
            ->select(
            'insurance_monitorings.id',
            'insurance_monitorings.plate_number',
            'insurance_monitorings.start_date',
            'insurance_monitorings.expire_date',
            'insurance_monitorings.cost',
            'users.first_name',
            'users.last_name',
            'users.email',
            'users.phone_number',
            'projects.project_name',
            'insurance_monitorings.created_at')
            ->latest()
            ->get();

        return view('insuranceMonitoring.index')->with('insurances', $insurances);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        return view('insuranceMonitoring.create')->with('projects', $projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('create_project')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $this->validate(request(), [
            'plate_number' => 'required',
            'start_date' => 'required',
            'expire_date' => 'required',
            'cost' => 'required',
            'project_id' => 'required',
        ]);

        $projects  = DB::table('projects')->select('id', 'project_name')->where('id', '=', $request->project_id)->value('id');

        $insurance = new InsuranceMonitoring();
        $insurance->plate_number = $request->plate_number;
        $insurance->start_date = $request->start_date;
        $insurance->expire_date = $request->expire_date;
        $insurance->cost = $request->cost;
        $insurance->project_id = $projects;
        $insurance->user_id = Auth::user()->id;
        $st = $insurance->save();

        if (!$st) {
            return redirect()->back()->with('message', 'Failed to insert Insurance monitoring data');
        } else {
            return redirect()->back()->with('message', 'Insurance monitoring is successfully added');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request, $id)
     {
         $this->middleware(function ($request, $next) {
             if (\Auth::user()->can('delete_insurance')) {
                 return $next($request);
             }
             return redirect()->back();
         });

         $uid = \Auth::id();
         $insurance = InsuranceMonitoring::findOrFail($id);
         $insurance->delete();
         ActivityLog::where('changetype', 'Delete Insurance monitoring')->update(['user_id' => $uid]);


         $request->session()->flash('message', 'Insurance monitoring is successfully deleted');
         return back();
     }
}
