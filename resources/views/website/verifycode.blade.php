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

                    <form action="{{ route('aksharam.application.verify.post') }}" method="post">
                        @csrf
                        <input type="hidden" name="application_id" value="{{ $application->id }}">

                        <div class="card">
                            <div class="card-header">Enter verification code</div>
                            <div class="card-body">
                                <p>A verication code has been sent to your registered email ({{ $application->email }}). Please enter the received code and make changes to your application. Remember this code can be used only once. You can get unlimited number of verification codes when you request.</p>
                                <div class="form-group">
                                    <label for="code">Verification code</label>
                                    <input type="number" min="0" class="form-control" name="code" value="{{ old('code') }}" required>
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
