<?php

namespace App\Http\Controllers;

use App\Exports\ApplicationsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ApplicationsExportController extends Controller
{
    public function export($type = 'active')
    {
        return Excel::download(new ApplicationsExport($type), 'applications.xlsx');
    }
}
