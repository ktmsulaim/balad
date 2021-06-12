@extends('layouts.admin.app', ['title' => 'Applications'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('components.admin.notification')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Active applicants</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.applications.export') }}" class="btn btn-tool">Export</a>
                    </div>
                </div>
                <div class="card-body">
                    @include('components.admin.table', ['url' => route('admin.applications.list', ['type' => 'active', ]),
                        'columns' => (new App\Models\Application)->getDataColumns('partial', 'render'),
                        'action' => ['status' => true, 'links' => ['edit' => 'applications']],
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection