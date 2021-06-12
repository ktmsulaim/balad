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

    public function getDataColumns($type, $key = 'columns')
    {
        $data = [
            'columns' => ['amount', 'currency', 'transaction_id', 'created_at', 'status'],
            'searchable' => ['amount', 'transaction_id'],
            'render' => [
                ['key' => 'amount', 'label' => 'Amount'],
                ['key' => 'currency', 'label' => 'Currency'],
                ['key' => 'transaction_id', 'label' => 'Transaction ID'],
                ['key' => 'status', 'label' => 'Status'],
                ['key' => 'created_at', 'label' => 'Date'],
            ]
        ];

        if ($type == 'full') {
            return $data;
        } else {
            return $data[$key];
        }
        
    }
}
