<?php

namespace App\Http\Controllers;

use App\Datatable;
use App\Models\Application;
use Illuminate\Http\Request;

class AdminApplicationsController extends Controller
{
    public function index()
    {
        return view('admin.applications.index');
    }

    public function listApplications($type = 'active')
    {
        $model = new Application;
        $status = $type == 'active' ? 1 : 0;
        
        $data = (new Datatable($model, 
            $model->getDataColumns('partial'), // Columns
            $model->getDataColumns('partial', 'searchable'), // Searchable columns
            ['status' => $status] // conditions
        ))->draw();

        echo $data;

        exit;
    }

    public function edit(Application $application)
    {
        return view('admin.applications.edit', ['application' => $application]);
    }
}
