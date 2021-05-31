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

@endsection