<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VehicleLogSheet;
use Carbon\Carbon;
use DB;
use Auth;
use App\ActivityLog;
use Excel;
use Barryvdh\DomPDF\Facade as PDF;

class VehicleLogSheetsController extends Controller
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
            if (\Auth::user()->can('view_vehicle')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $vehicles = VehicleLogSheet::all();

        return view('vehicleLog.index')->with('vehicles', $vehicles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicleLog.create');
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
            if (\Auth::user()->can('create_vehicle')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $this->validate(request(), [
            'month_year' => 'required',
            'vehicle_registration_number' => 'required',
            'date' => 'required',
            'description' => 'required',
            'fuel_cost' => 'required',
            'fuel_litres' => 'required',
            'maintenance_cost' => 'required',
            'maintenance_invoice' => 'required',
            'driver_signature' => 'required|mimes:doc,png,gif,jpeg,jpg,pdf,txt|max:2048',
        ]);

        $vehicle = new VehicleLogSheet();
        $vehicle->month_year = $request->month_year;
        $vehicle->vehicle_registration_number = $request->vehicle_registration_number;
        $vehicle->date = $request->date;
        $vehicle->description = $request->description;
        $vehicle->fuel_cost = $request->fuel_cost;
        $vehicle->fuel_litres = $request->fuel_litres;
        $vehicle->maintenance_cost = $request->maintenance_cost;
        $vehicle->maintenance_invoice = $request->maintenance_invoice;
        $vehicle->driver_signature = $request->driver_signature->store('Driversignature', 'public');
        $vehicle->user_id = Auth::user()->id;
        $st = $vehicle->save();

        if (!$st) {
            return redirect()->back()->with('message', 'Failed to insert Vehicle log sheets data');
        } else {
            return redirect()->back()->with('message', 'Vehicle log sheet is successfully added');
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
             if (\Auth::user()->can('delete_vehicle')) {
                 return $next($request);
             }
             return redirect()->back();
         });

         $uid = \Auth::id();
         $vehicle = VehicleLogSheet::findOrFail($id);
         $vehicle->delete();
         ActivityLog::where('changetype', 'Delete Vehicle log sheet')->update(['user_id' => $uid]);

         $request->session()->flash('message', 'Vehicle log sheet is successfully deleted');
         return back();
     }
}
