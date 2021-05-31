@extends('layouts.website', ['pageTitle' => 'Payment failed | Aksharam'])


@section('content')
@include('components.header', ['pageTitle' => 'Payment failed', 'pageSubTitle' => 'Try again', 'links' => [
    0 => [
        'label' => 'Aksharam',
        'url' => 'javascript:void(0)'
    ],
    1 => [
        'label' => 'Payment',
        'url' => 'javascript:void(0)'
    ],  
    2 => [
        'label' => 'Failed',
        'url' => 'javascript:void(0)'
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
                        Sorry! Your payment was failed
                    </div>
                    <div class="card-body">
                        <p>We were unable to handle your request. Please try again using the link below:</p>
                        <a href="{{ route('aksharam.payment') }}" class="button button-rounded">Try again</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection