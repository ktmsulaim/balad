@extends('layouts.website', ['pageTitle' => 'Terms of Service | Aksharam'])


@section('content')
@include('components.header', ['pageTitle' => 'Terms of Service', 'pageSubTitle' => '', 'links' => [
    0 => [
        'label' => 'Aksharam',
        'url' => 'javascript:void(0)'
    ],
    1 => [
        'label' => 'Terms of Service',
        'url' => 'javascript:void(0)'
    ],
]])

@endsection