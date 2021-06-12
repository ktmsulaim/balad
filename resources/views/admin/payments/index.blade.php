@extends('layouts.admin.app', ['title' => 'Payments'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('components.admin.notification')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Payment log</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.payments.export') }}" class="btn btn-tool">Export</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table border">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Amount</th>
                                    <th>Currency</th>
                                    <th>Transaction ID</th>
                                    <th>Status</th>
                                    <th>Date</th>
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
            "ajax": "{{ route('admin.payments.list') }}",
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            'columns': [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false},
                {data: 'application.email'},
                {data: 'application.phone'},
                {data: 'amount'},
                {data: 'currency'},
                {data: 'transaction_id'},
                {data: 'status'},
                {data: 'created_at'},
            ]
        })
    })
</script>
@endpush