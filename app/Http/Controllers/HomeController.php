<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\InsuranceMonitoring;
use Auth;
use DB;
use App\User;
use Charts;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usersCount = DB::select('SELECT COUNT(*) as "usersCount" FROM users');

        $projectsCount = DB::select('SELECT COUNT(*) as "projectsCount" FROM projects');

        $procurementsCount = DB::select('SELECT COUNT(*) as "procurementsCount" FROM kind_procurements');

        $expendituresCount = DB::select('SELECT COUNT(*) as "expendituresCount" FROM budget_expenditures');

        $permissionsCount = DB::select('SELECT COUNT(*) as "permissionsCount" FROM permissions');

        $rolesCount = DB::select('SELECT COUNT(*) as "rolesCount" FROM roles');

        $insurancemonitoringsCount = DB::select('SELECT COUNT(*) as "insurancemonitoringsCount" FROM insurance_monitorings');

        $vehiclelogsCount = DB::select('SELECT COUNT(*) as "vehiclelogsCount" FROM vehicle_log_sheets');

        $maintenancemonitoringsCount = DB::select('SELECT COUNT(*) as "maintenancemonitoringsCount" FROM maintenance_monitoring_assets');

        $procurementrequestsCount = DB::select('SELECT COUNT(*) as "procurementrequestsCount" FROM procurement_requests');

        $purchaseordersCount = DB::select('SELECT COUNT(*) as "purchaseordersCount" FROM purchases_orders');

        $paymentvouchersCount = DB::select('SELECT COUNT(*) as "paymentvouchersCount" FROM payment_vouchers');

        return view('home')
        ->with('usersCount', $usersCount)
        ->with('projectsCount', $projectsCount)
        ->with('procurementsCount', $procurementsCount)
        ->with('expendituresCount', $expendituresCount)
        ->with('permissionsCount', $permissionsCount)
        ->with('rolesCount', $rolesCount)
        ->with('insurancemonitoringsCount', $insurancemonitoringsCount)
        ->with('vehiclelogsCount', $vehiclelogsCount)
        ->with('maintenancemonitoringsCount', $maintenancemonitoringsCount)
        ->with('procurementrequestsCount', $procurementrequestsCount)
        ->with('purchaseordersCount', $purchaseordersCount)
        ->with('paymentvouchersCount', $paymentvouchersCount);

    }
}
