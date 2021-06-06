@extends('layouts.website', ['pageTitle' => 'Payment | Aksharam'])


@section('content')
@include('components.header', ['pageTitle' => 'Payment', 'pageSubTitle' => 'Credit Cards & UPI Support', 'links' => [
    0 => [
        'label' => 'Aksharam',
        'url' => 'javascript:void(0)'
    ],
    1 => [
        'label' => 'Payment',
        'url' => route('aksharam.payment')
    ]
]])

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
							<li class="col-sm-6 col-lg-4 ui-tabs-active">
								<a href="javascript:void(0)" class="i-circled i-bordered i-alt mx-auto">2</a>
								<h5>Make Payment</h5>
							</li>
                            <li class="col-sm-6 col-lg-4">
								<a href="javascript:void(0)" class="i-circled i-bordered i-alt mx-auto">3</a>
								<h5>Complete</h5>
							</li>
						</ul>
                    </div>
                </div>

                <div class="payment-data">
                    <h4>Hi, {{ $application->fullName() }}</h4>

                    <div class="card">
                        <div class="card-header">
                            Make payment securely with Razorpay
                        </div>
                        <div class="card-body">
                            <p>Application procssing fee of USD100 for all students is Non-refundable</p>
                            <form action="{{ route('aksharam.payment.proccess') }}" method="post" class="m-0">
                                @csrf
                                {{-- <button id="rzp-button1" class="button button-rounded">Pay $100</button> --}}
                                <script src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="{{ env('RAZOR_KEY') }}"
                                            data-amount="10000"
                                            data-currency="USD"
                                            data-buttontext="Pay 100 USD"
                                            data-name="Balad International"
                                            data-description="Aksharam International Malayalam Academy"
                                            data-image="{{ asset('img/logo.png') }}"
                                            data-prefill.name="{{ $application->fullName() }}"
                                            data-prefill.email="{{ $application->email }}"
                                            data-prefill.contact="{{ $application->phone }}"
                                            data-theme.color="#0d6965">
                                    </script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection