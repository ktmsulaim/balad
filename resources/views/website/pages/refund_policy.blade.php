@extends('layouts.website', ['pageTitle' => 'Refund Policy | Aksharam'])


@section('content')
@include('components.header', ['pageTitle' => 'Refund Policy', 'pageSubTitle' => '', 'links' => [
    0 => [
        'label' => 'Aksharam',
        'url' => 'javascript:void(0)'
    ],
    1 => [
        'label' => 'Refund Policy',
        'url' => 'javascript:void(0)'
    ],
]])

<section class="section" id="refund-policy">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h4>Financial Policy</h4>
                <ul class="iconlist iconlist-color mb-0">
                    <li><i class="icon-caret-right"></i> Application fee is not refundable at any case</li>
                    <li><i class="icon-caret-right"></i> The tution fee should be paid monthly  within first five days. Otherwise the account of students would be suspended</li>
                    <li><i class="icon-caret-right"></i> The tution fee paid will be refunded as follows in the event of withdrawal from the course</li>
                </ul>
                <div class="mt-4">
                    <ul class="alphabet">
                        <li>90% refund - In the first day of every  month only</li>
                        <li>60% refund - From the first day up to the fifth day of every month.</li>
                        <li>No refund - After fifth day of every month</li>
                    </ul>
                </div>
                <div class="mt-4">
                    <p><b>Note:</b> It will take 5 -7 working days to process the refund and credit the amount to the customers' bank account.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection