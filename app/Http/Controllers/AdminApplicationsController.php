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
            $model->data_columns['columns'], // Columns
            $model->data_columns['searchable'], // Searchable columns
            ['status' => $status] // conditions
        ))->draw();

        echo $data;

        exit;
    }
}
