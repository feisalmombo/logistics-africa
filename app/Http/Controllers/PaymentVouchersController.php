<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentVoucher;
use Carbon\Carbon;
use DB;
use Auth;
use App\ActivityLog;
use Excel;
use Barryvdh\DomPDF\Facade as PDF;

class PaymentVouchersController extends Controller
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
            if (\Auth::user()->can('view_voucher')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $payments = PaymentVoucher::all();

        return view('paymentVouchers.index')->with('payments', $payments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = DB::table('projects')->get();

        return view('paymentVouchers.create')
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
            if (\Auth::user()->can('create_voucher')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $this->validate(request(), [
            'project_id' => 'required',
            'country_office' => 'required',
            'date' => 'required',
            'beneficiary_name' => 'required',
            'beneficiary_address' => 'required',
            'cash_payment' => 'required',
            'amount_words' => 'required',
            'cheque_number' => 'required',
            'bank_name' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'rate' => 'required',
            'profoma_invoice_amount' => 'required',
            'signature_attachments' => 'required|mimes:doc,png,gif,jpeg,jpg,pdf,txt|max:2048',
            'approved_status' => 'required',
            'payee_signature' => 'required|mimes:doc,png,gif,jpeg,jpg,pdf,txt|max:2048',

        ]);

        $projects  = DB::table('projects')->select('id', 'project_name')->where('id', '=', $request->project_id)->value('id');

        $payment = new PaymentVoucher();

        $payment->project_id = $projects;
        $payment->country_office = $request->country_office;
        $payment->date = $request->date;
        $payment->beneficiary_name = $request->beneficiary_name;
        $payment->beneficiary_address = $request->beneficiary_address;
        $payment->cash_payment = $request->cash_payment;
        $payment->amount_words = $request->amount_words;
        $payment->cheque_number = $request->cheque_number;
        $payment->bank_name = $request->bank_name;
        $payment->quantity = $request->quantity;
        $payment->description = $request->description;
        $payment->rate = $request->rate;
        $payment->profoma_invoice_amount = $request->profoma_invoice_amount;
        $payment->user_id = Auth::user()->id;
        $payment->signature_attachments = $request->signature_attachments->store('ApprovedSignature', 'public');
        $payment->approved_status = $request->approved_status;
        $payment->payee_signature = $request->payee_signature->store('PayeeSignature', 'public');

        $st = $payment->save();

        if (!$st) {
            return redirect()->back()->with('message', 'Failed to insert Payment voucher data');
        } else {
            return redirect()->back()->with('message', 'Payment voucher is successfully added');
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
