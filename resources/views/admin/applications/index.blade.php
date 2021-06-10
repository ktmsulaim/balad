@extends('layouts.admin.app', ['title' => 'Applications'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Active applicants</h3>
                </div>
                <div class="card-body">
                    @include('components.admin.table', ['url' => route('admin.applications.list', ['type' => 'inactive', ]),
                        'columns' => (new App\Models\Application)->data_columns['render'],
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection