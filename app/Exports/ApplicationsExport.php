<?php

namespace App\Exports;

use App\Models\Application;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ApplicationsExport implements FromView
{

    protected $type;

    public function __construct($type) {
        $this->type = $type;
    }

    public function view(): View
    {
        return view('exports.applications', [
            'applications' => $this->type == 'active' ? Application::active()->get() : Application::where('status', 0)->get()
        ]);
    }
}
