@extends('layouts.admin.app', ['title' => 'Applications'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('components.admin.notification')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ ucfirst($type) }} applications</h3>
                    <div class="card-tools">
                        @if ($type == 'active')
                            <a href="{{ route('admin.applications.index', ['type' => 'inactive']) }}" class="btn btn-tool">Inactive</a>
                        @else
                            <a href="{{ route('admin.applications.index', ['type' => 'active']) }}" class="btn btn-tool">Active</a>
                        @endif
                        <a href="{{ route('admin.applications.export', ['type' => $type]) }}" class="btn btn-tool">Export</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table border">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Time preference</th>
                                    <th>Phone</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function(){
            $('.table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.applications.list', ['type' => $type]) }}",
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                'columns': [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false},
                    {data: 'photo', render: function(data, type, full, meta){
                        return `<img width="40" height="40" src="/storage/${data}" >`;
                    }},
                    {data: 'first_name'},
                    {data: 'last_name'},
                    {data: 'time_preference'},
                    {data: 'phone'},
                    {data: 'age'},
                    {data: 'gender'},
                    {data: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            })
        })
    </script>
@endpush