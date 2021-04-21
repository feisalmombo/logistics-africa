<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchasesOrder;
use Carbon\Carbon;
use DB;
use Auth;
use App\ActivityLog;
use Excel;
use Barryvdh\DomPDF\Facade as PDF;

class PurchaseOrdersController extends Controller
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
            if (\Auth::user()->can('view_order')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $purchases = PurchasesOrder::all();

        return view('purchaseOrder.index')->with('purchases', $purchases);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = DB::table('projects')->get();

        return view('purchaseOrder.create')
        ->with('projects', $projects);
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
            if (\Auth::user()->can('create_order')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $this->validate(request(), [
            'date' => 'required',
            'to' => 'required',
            'reference_number' => 'required',
            'code' => 'required',
            'decription_items' => 'required',
            'quantity' => 'required',
            'unit_price' => 'required',
            'amount' => 'required',
            'invoice_to' => 'required',
            'tin_number' => 'required',
            'invoice_address' => 'required',
            'project_id' => 'required',
            'delivery_date' => 'required',
            'delivery_address' => 'required',
            'terms_delivery' => 'required',
            'terms_payment' => 'required',
            'signature_attachments' => 'required|mimes:doc,png,gif,jpeg,jpg,pdf,txt|max:2048',
            'status' => 'required',

        ]);

        $projects  = DB::table('projects')->select('id', 'project_name')->where('id', '=', $request->project_id)->value('id');


        $purchase = new PurchasesOrder();
        $purchase->date = $request->date;
        $purchase->to = $request->to;
        $purchase->reference_number = $request->reference_number;
        $purchase->code = $request->code;
        $purchase->decription_items = $request->decription_items;
        $purchase->quantity = $request->quantity;
        $purchase->unit_price = $request->unit_price;
        $purchase->amount = $request->amount;
        $purchase->invoice_to = $request->invoice_to;

        $purchase->invoice_to = $request->invoice_to;
        $purchase->tin_number = $request->tin_number;
        $purchase->invoice_address = $request->invoice_address;
        $purchase->project_id = $projects;
        $purchase->delivery_date = $request->delivery_date;
        $purchase->delivery_address = $request->delivery_address;
        $purchase->terms_delivery = $request->terms_delivery;
        $purchase->terms_payment = $request->terms_payment;
        $purchase->terms_payment = $request->terms_payment;
        $purchase->user_id = Auth::user()->id;
        $purchase->signature_attachments = $request->signature_attachments->store('Signature', 'public');
        $purchase->status = $request->status;
        $st = $purchase->save();

        if (!$st) {
            return redirect()->back()->with('message', 'Failed to insert Purchase order data');
        } else {
            return redirect()->back()->with('message', 'Purchase ordr is successfully added');
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
