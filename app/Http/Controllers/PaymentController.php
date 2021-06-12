<?php

namespace App\Http\Controllers;

use App\Datatable;
use App\Models\Payment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.payments.index");
    }

    public function listPayments(Request $request)
    {
        if ($request->ajax()) {
            $payments = Payment::with('application');

            return DataTables::of($payments)
                ->addIndexColumn()
                // ->editColumn('email', function ($payment) {
                //     return $payment->application->email;
                // })
                // ->editColumn('phone', function ($payment) {
                //     return $payment->application->phone;
                // })
                ->editColumn('amount', function ($payment) {
                    return $payment->amount / 100;
                })
                ->editColumn('status', function ($payment) {
                    return $payment->status == 1 ? '<span class="badge badge-success">Success</span>' : '<span class="badge badge-danger">Failed</span>';
                })
                ->editColumn('created_at', function ($payment) {
                    return $payment->created_at->format('d F, Y g:i A');
                })
                ->rawColumns(['status'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
