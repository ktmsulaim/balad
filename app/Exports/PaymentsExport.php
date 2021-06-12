<?php

namespace App\Exports;

use App\Models\Payment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PaymentsExport implements FromView
{
    public function view(): View
    {
        return view('exports.payments', [
            'payments' => Payment::all()
        ]);
    }
}
