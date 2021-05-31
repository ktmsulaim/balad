<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function getInvoice($type = 'stream')
    {
        $pdf = app('dompdf.wrapper')->loadView('invoice.fee', ['payment' => $this]);

        if ($type == 'stream') {
            return $pdf->stream('invoice.pdf');
        }

        if ($type == 'download') {
            return $pdf->download('invoice.pdf');
        }
    }
}
