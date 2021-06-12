<?php

namespace App\Http\Controllers;

use App\Datatable;
use App\DataTables\ApplicationsDataTable;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

class AdminApplicationsController extends Controller
{
    public function index(Request $request)
    {
        $type = 'active';
        
        if($request->has('type')) {
            $type = $request->get('type');
        }

        return view('admin.applications.index', ['type' => $type]);
    }

    public function listApplications(Request $request, $type = 'active')
    {
        if($request->ajax()) {
            $status = $type == 'active' ? 1 : 0;
            $applications = Application::where('status', $status);

            return DataTables::of($applications)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return "<a href='".route('admin.applications.edit', ['application' => $row->id]) ."'><i class='fa fa-edit fa-fw'></i></a>";
                    })
                    ->editColumn('time_preference', function($user){
                        return $user->getTimePreference();
                    })
                    ->editColumn('created_at', function($user){
                        return $user->created_at->format('d F, Y');
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }

    public function edit(Application $application)
    {
        return view('admin.applications.edit', ['application' => $application]);
    }

    public function update(Request $request, Application $application)
    {
        $application->update($request->all());

        return Redirect::back()->with('success', 'The application has been updated');
    }
}
