<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProcurementRequest;
use App\Approved;
use App\User;
use Auth;
use DB;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = count(ProcurementRequest::where([
            ['checked_status', '=', 'Checked']
        ])
            ->join('users', 'procurement_requests.user_id', '=', 'users.id')
            ->select('procurement_requests.id', 'procurement_requests.created_at', 'procurement_requests.request_number', 'users.first_name')->get());

        return $notifications;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notification = ProcurementRequest::where('procurement_requests.id','=',$id)
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
        ->where('procurement_requests.checked_status', '=', "Checked")
        ->latest()
        ->get();

        return view('notification.show')->with('notifications', $notification);
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
        $notification = ProcurementRequest::findOrfail($id);

        if ($notification) {
            if ($notification->checked_status == "Checked") {
                $notification->checked_status = "Approved";
                $notification->save();
            }
        }
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
