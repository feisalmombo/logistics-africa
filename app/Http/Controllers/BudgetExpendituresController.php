<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BudgetExpenditure;
use Carbon\Carbon;
use DB;
use Auth;
use App\ActivityLog;
use Excel;
use Barryvdh\DomPDF\Facade as PDF;

class BudgetExpendituresController extends Controller
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
            if (\Auth::user()->can('view_expenditure')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $budgets = BudgetExpenditure::all();

        return view('manageBudgetExpenditure.index')->with('budgets', $budgets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manageBudgetExpenditure.create');
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
            if (\Auth::user()->can('create_expenditure')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $this->validate(request(), [
            'budget_expenditure_name' => 'required|string|max:255',
        ]);

        $budget = new BudgetExpenditure();
        $budget->budget_expenditure_name = $request->budget_expenditure_name;
        $st = $budget->save();

        if (!$st) {
            return redirect()->back()->with('message', 'Failed to insert Budget expenditure data');
        } else {
            return redirect()->back()->with('message', 'Budget expenditure is successfully added');
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
            if (\Auth::user()->can('delete_expenditure')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $uid = \Auth::id();
        $budget = BudgetExpenditure::findOrFail($id);
        $budget->delete();
        ActivityLog::where('changetype', 'Delete Budget Expenditure')->update(['user_id' => $uid]);

        $request->session()->flash('message', 'Budget Expenditure is successfully deleted');
        return back();
    }
}
