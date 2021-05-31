@extends('layouts.website', ['pageTitle' => 'Payment | Aksharam'])


@section('content')
@include('components.header', ['pageTitle' => 'Payment', 'pageSubTitle' => 'Manually pay the fee', 'links' => [
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
                @include('components.any_error')
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
                    <div class="card">
                        <div class="card-header">
                            Enter your registered email address
                        </div>
                        <div class="card-body">
                            <form action="" method="get">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                                </div>
                                <div>
                                    <button class="button button-rounded">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection