<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MaintenanceMonitoringAsset;
use Carbon\Carbon;
use DB;
use Auth;
use App\ActivityLog;
use Excel;
use Barryvdh\DomPDF\Facade as PDF;

class MaintenanceMonitoringAssetsController extends Controller
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
            if (\Auth::user()->can('view_maintenace')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $maintenances = MaintenanceMonitoringAsset::all();

        return view('maintenanceMonitoringAsset.index')->with('maintenances', $maintenances);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenanceMonitoringAsset.create');
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
            if (\Auth::user()->can('create_maintenace')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $this->validate(request(), [
            'date' => 'required',
            'asset_id' => 'required',
            'description_asset' => 'required',
            'state_use' => 'required',
            'cost_centre' => 'required',
            'location' => 'required',
            'summary_ordinary_maintenance' => 'required',
            'summary_extraordinary_maintenance' => 'required',
            'cost' => 'required',
            'supplier_service' => 'required',
            'supplier_invoice' => 'required',
        ]);

        $maintenance = new MaintenanceMonitoringAsset();
        $maintenance->date = $request->date;
        $maintenance->asset_id = $request->asset_id;
        $maintenance->description_asset = $request->description_asset;
        $maintenance->state_use = $request->state_use;
        $maintenance->cost_centre = $request->cost_centre;
        $maintenance->location = $request->location;
        $maintenance->summary_ordinary_maintenance = $request->summary_ordinary_maintenance;
        $maintenance->summary_extraordinary_maintenance = $request->summary_extraordinary_maintenance;
        $maintenance->cost = $request->cost;
        $maintenance->supplier_service = $request->supplier_service;
        $maintenance->supplier_invoice = $request->supplier_invoice;
        $maintenance->user_id = Auth::user()->id;
        $st = $maintenance->save();

        if (!$st) {
            return redirect()->back()->with('message', 'Failed to insert Maintenance monitoring asset data');
        } else {
            return redirect()->back()->with('message', 'Maintenance monitoring assetis successfully added');
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
             if (\Auth::user()->can('delete_maintenance')) {
                 return $next($request);
             }
             return redirect()->back();
         });

         $uid = \Auth::id();
         $maintenance = MaintenanceMonitoringAsset::findOrFail($id);
         $maintenance->delete();
         ActivityLog::where('changetype', 'Delete Maintenance monitoring asset')->update(['user_id' => $uid]);

         $request->session()->flash('message', 'Maintenance monitoring asset is successfully deleted');
         return back();
     }
}
