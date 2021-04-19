<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KindProcurement;
use Carbon\Carbon;
use DB;
use Auth;
use App\ActivityLog;
use Excel;
use Barryvdh\DomPDF\Facade as PDF;

class KindProcurementsController extends Controller
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
            if (\Auth::user()->can('view_procurement')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $procurements = KindProcurement::all();

        return view('manageProcurement.index')->with('procurements', $procurements);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manageProcurement.create');
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
            if (\Auth::user()->can('create_procurement')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $this->validate(request(), [
            'procurement_name' => 'required|string|max:255',
        ]);

        $procurement = new KindProcurement();
        $procurement->kind_procurement_name = $request->procurement_name;
        $st = $procurement->save();

        if (!$st) {
            return redirect()->back()->with('message', 'Failed to insert procurement data');
        } else {
            return redirect()->back()->with('message', 'Procurement is successfully added');
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
            if (\Auth::user()->can('delete_procurement')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $uid = \Auth::id(); 
        $procurement = KindProcurement::findOrFail($id);
        $procurement->delete();
        ActivityLog::where('changetype', 'Delete Procurement')->update(['user_id' => $uid]);


        $request->session()->flash('message', 'Procurement is successfully deleted');
        return back();
    }
}
