@extends('layouts.website', ['pageTitle' => 'Payment success | Aksharam'])


@section('content')
@include('components.header', ['pageTitle' => 'Payment success', 'pageSubTitle' => 'Thank you', 'links' => [
    0 => [
        'label' => 'Aksharam',
        'url' => 'javascript:void(0)'
    ],
    1 => [
        'label' => 'Payment',
        'url' => 'javascript:void(0)'
    ],  
    2 => [
        'label' => 'Complete',
        'url' => 'javascript:void(0)'
    ]
]])
@php
    $payment = $application->admissionFee(1);
@endphp

<section class="section bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="mb-3">
                    <div id="processTabs" data-plugin="tabs" class="customjs">
						<ul class="process-steps row col-mb-30">
							<li class="col-sm-6 col-lg-4">
								<a href="{{ route('aksharam.apply') }}" class="i-circled i-bordered i-alt mx-auto">1</a>
								<h5>Apply</h5>
							</li>
							<li class="col-sm-6 col-lg-4">
								<a href="javascript:void(0)" class="i-circled i-bordered i-alt mx-auto">2</a>
								<h5>Make Payment</h5>
							</li>
                            <li class="col-sm-6 col-lg-4 ui-tabs-active">
								<a href="javascript:void(0)" class="i-circled i-bordered i-alt mx-auto">3</a>
								<h5>Complete</h5>
							</li>
						</ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Congrats! Your payment was successfull
                    </div>
                    <div class="card-body">
                        <p>Thank you for being part of Aksharam International Malayalam Academy. Your payment was received and the transaction ID is: <b>{{ $payment->transaction_id }}</b></p>
                        <p>We will send you a confirmation email with the payment invoice. Also, you can downlaod it from the link below.</p>
                        <div>
                            <a href="{{ route('aksharam.payment.invoice', ['id' => $payment->id]) }}" class="button button-rounded">Download Invoice</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection