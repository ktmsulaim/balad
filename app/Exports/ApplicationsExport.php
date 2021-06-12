<?php

namespace App\Exports;

use App\Models\Application;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ApplicationsExport implements FromView
{

    public function view(): View
    {
        return view('exports.applications', [
            'applications' => Application::active()->get()
        ]);
    }
}
