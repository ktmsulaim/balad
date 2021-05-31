@extends('layouts.website', ['pageTitle' => 'Privacy Policy | Aksharam'])


@section('content')
@include('components.header', ['pageTitle' => 'Privacy Policy', 'pageSubTitle' => '', 'links' => [
    0 => [
        'label' => 'Aksharam',
        'url' => 'javascript:void(0)'
    ],
    1 => [
        'label' => 'Privacy Policy',
        'url' => 'javascript:void(0)'
    ],
]])

@endsection