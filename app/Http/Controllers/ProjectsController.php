<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Carbon\Carbon;
use DB;
use Auth;
use App\ActivityLog;
use Excel;
use Barryvdh\DomPDF\Facade as PDF;

class ProjectsController extends Controller
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
            if (\Auth::user()->can('view_project')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $projects = Project::all();

        return view('manageProject.index')->with('projects', $projects);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manageProject.create');
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
            if (\Auth::user()->can('create_project')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $this->validate(request(), [
            'project_name' => 'required|string|max:255',
        ]);

        $project = new Project();
        $project->project_name = $request->project_name;
        $st = $project->save();

        if (!$st) {
            return redirect()->back()->with('message', 'Failed to insert Project data');
        } else {
            return redirect()->back()->with('message', 'Project is successfully added');
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
            if (\Auth::user()->can('delete_project')) {
                return $next($request);
            }
            return redirect()->back();
        });

        $uid = \Auth::id();
        $project = Project::findOrFail($id);
        $project->delete();
        ActivityLog::where('changetype', 'Delete Project')->update(['user_id' => $uid]);


        $request->session()->flash('message', 'Project is successfully deleted');
        return back();
    }
}
