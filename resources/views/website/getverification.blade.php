@extends('layouts.website', ['pageTitle' => 'Edit application | Aksharam'])


@section('content')
    @include('components.header', ['pageTitle' => 'Edit application', 'pageSubTitle' => 'Update your personal info', 'links'
    => [
    0 => [
    'label' => 'Aksharam',
    'url' => 'javascript:void(0)'
    ],
    1 => [
    'label' => 'Application',
    'url' => route('aksharam.apply')
    ],
    2 => [
    'label' => 'Edit',
    'url' => route('aksharam.apply')
    ]
    ]])

    <section class="section bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    @include('components.any_error')

                    <form action="{{ route('aksharam.application.getcode') }}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header">Get verification code</div>
                            <div class="card-body">
                                <p>Enter your registered email address to get a verification code. You can edit your provided info whenever you want. You can use the received verification code once.</p>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="button button-rounded">Submit</button>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
