<?php

namespace App\Http\Controllers;

use App\Exports\ApplicationsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ApplicationsExportController extends Controller
{
    public function export()
    {
        return Excel::download(new ApplicationsExport, 'applications.xlsx');
    }
}
