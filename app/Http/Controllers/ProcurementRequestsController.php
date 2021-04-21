<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProcurementRequest;
use Carbon\Carbon;
use DB;
use Auth;
use App\ActivityLog;
use Excel;
use Barryvdh\DomPDF\Facade as PDF;

class ProcurementRequestsController extends Controller
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
            if (\Auth::user()->can('view_procurement_request')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $procurementrequests = DB::table('procurement_requests')
        ->join('projects', 'procurement_requests.project_id', '=', 'projects.id')
        ->join('kind_procurements', 'procurement_requests.kind_procurement_id', '=', 'kind_procurements.id')
        ->join('budget_expenditures', 'procurement_requests.budget_expenditure_id', '=', 'budget_expenditures.id')
        ->join('users', 'procurement_requests.user_id', '=', 'users.id')
        ->select(
        'procurement_requests.id',
        'procurement_requests.request_number',
        'procurement_requests.date_request',
        'procurement_requests.budget_line',
        'procurement_requests.decription_items',
        'procurement_requests.quantity',
        'procurement_requests.delivery_within',
        'procurement_requests.administrator_signature_attachments',
        'procurement_requests.checked_status',
        'users.first_name',
        'users.last_name',
        'users.email',
        'users.phone_number',
        'projects.project_name',
        'kind_procurements.kind_procurement_name',
        'budget_expenditures.budget_expenditure_name',
        'procurement_requests.created_at')
        ->latest()
        ->get();

        return view('procurementRequest.index')->with('procurementrequests', $procurementrequests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = DB::table('projects')->get();

        $procurements = DB::table('kind_procurements')->get();

        $expenditures  = DB::table('budget_expenditures')->get();

        return view('procurementRequest.create')
        ->with('projects', $projects)
        ->with('procurements', $procurements)
        ->with('expenditures', $expenditures);
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
            if (\Auth::user()->can('create_procurement_request')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $this->validate(request(), [
            'request_number' => 'required',
            'project_id' => 'required',
            'date_request' => 'required',
            'kind_procurement_id' => 'required',
            'budget_line' => 'required',
            'decription_items' => 'required',
            'quantity' => 'required',
            'budget_expenditure_id' => 'required',
            'delivery_within' => 'required',
            'administrator_signature_attachments' => 'required|mimes:doc,png,gif,jpeg,jpg,pdf,txt|max:2048',
            'checked_status' => 'required',
            // 'other_attachments' => 'required|mimes:doc,png,gif,jpeg,jpg,pdf,txt|max:2048',


        ]);

        $projects  = DB::table('projects')->select('id', 'project_name')->where('id', '=', $request->project_id)->value('id');

        $procurements  = DB::table('kind_procurements')->select('id', 'kind_procurement_name')->where('id', '=', $request->kind_procurement_id)->value('id');

        $expenditures  = DB::table('budget_expenditures')->select('id', 'budget_expenditure_name')->where('id', '=', $request->budget_expenditure_id)->value('id');

        $procurementrequest = new ProcurementRequest();
        $procurementrequest->request_number = $request->request_number;
        $procurementrequest->project_id = $projects;
        $procurementrequest->date_request = $request->date_request;
        $procurementrequest->kind_procurement_id = $procurements;
        $procurementrequest->budget_line = $request->budget_line;
        $procurementrequest->decription_items = $request->decription_items;
        $procurementrequest->quantity = $request->quantity;
        $procurementrequest->budget_expenditure_id = $expenditures;
        $procurementrequest->delivery_within = $request->delivery_within;
        $procurementrequest->user_id = Auth::user()->id;
        $procurementrequest->administrator_signature_attachments = $request->administrator_signature_attachments->store('Adminsignature', 'public');
        $procurementrequest->checked_status = $request->checked_status;
        // $procurementrequest->other_attachments = $request->other_attachments->store('Othersignature', 'public');
        $st = $procurementrequest->save();

        if (!$st) {
            return redirect()->back()->with('message', 'Failed to insert Procurement request data');
        } else {
            return redirect()->back()->with('message', 'Procurement request is successfully added');
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
    public function destroy($id)
    {
        //
    }
}
