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
                                    <a href="{{ route('aksharam.apply') }}"
                                        class="i-circled i-bordered i-alt mx-auto">1</a>
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
                    <div class="card mb-4">
                        <div class="card-header">
                            Account summary
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="image">
                                        <img src="{{ $payment->application->photo() }}" alt="Applicant photo" width="150"
                                            class="img-fluid">
                                        <p class="mt-2">#{{ $payment->application->id }}</p>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="table-responsive">
                                        <table class="table border">
                                            <tr>
                                                <th width="180">Full name</th>
                                                <td>{{ $payment->application->fullName() }}</td>
                                            </tr>
                                            <tr>
                                                <th>Gender</th>
                                                <td>{{ $payment->application->gender }}</td>
                                            </tr>
                                            <tr>
                                                <th>DOB</th>
                                                <td>{{ $payment->application->dob }}</td>
                                            </tr>
                                            <tr>
                                                <th>Age</th>
                                                <td>{{ $payment->application->getAge() }}</td>
                                            </tr>
                                            <tr>
                                                <th>Name of guardian <br>--- Relationship</th>
                                                <td>{{ $payment->application->name_of_guardian }} <br>
                                                    {{ $payment->application->relationship_with_guardian }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{ $payment->application->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Phone</th>
                                                <td>{{ $payment->application->phone }}</td>
                                            </tr>
                                            <tr>
                                                <th>Secondary Phone</th>
                                                <td>{{ $payment->application->phone2 }}</td>
                                            </tr>
                                            <tr>
                                                <th>Whatsapp</th>
                                                <td>{{ $payment->application->whatsapp_number }}</td>
                                            </tr>
                                            <tr>
                                                <th>Country</th>
                                                <td>{{ $payment->application->country }}</td>
                                            </tr>
                                            <tr>
                                                <th>--- Address</th>
                                                <td>
                                                    {{ $payment->application->address_line1 }} <br>
                                                    {{ $payment->application->address_line2 }} <br>
                                                    {{ $payment->application->post }} <br>
                                                    {{ $payment->application->state }} <br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Address in India</th>
                                                <td>{{ $payment->application->address_in_india }}</td>
                                            </tr>
                                            <tr>
                                                <th>Time preference</th>
                                                <td>{{ $payment->application->getTimePreference() }}</td>
                                            </tr>
                                            <tr>
                                                <th>Learnt Malaylam before?</th>
                                                <td>{{ $payment->application->learnt_malayalam_before == 1 ? 'Yes' : 'No' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>How did you know about AKSHARAM?</th>
                                                <td>{{ $payment->application->know_about_aksharam }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            Payement info
                        </div>
                        <div class="card-body">
                            <p>Thank you for being part of Aksharam International Malayalam Academy. Your payment was
                                received and the transaction ID is: <b>{{ $payment->transaction_id }}</b></p>
                            <p>We will send you a confirmation email with the payment invoice. Also, you can download it
                                from the link below.</p>
                            <div>
                                <a href="{{ route('aksharam.payment.invoice', ['id' => $payment->id]) }}"
                                    class="button button-rounded">Download Invoice</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
