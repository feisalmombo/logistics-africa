<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
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

        return view('home')
        ->with('usersCount', $usersCount)
        ->with('projectsCount', $projectsCount)
        ->with('procurementsCount', $procurementsCount)
        ->with('expendituresCount', $expendituresCount)
        ->with('permissionsCount', $permissionsCount)
        ->with('rolesCount', $rolesCount);
    }
}
