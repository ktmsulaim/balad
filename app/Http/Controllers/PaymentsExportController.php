<?php

namespace App\Http\Controllers;

use App\Exports\PaymentsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PaymentsExportController extends Controller
{
    public function export()
    {
        return Excel::download(new PaymentsExport, 'payments_log.xlsx');
    }
}
