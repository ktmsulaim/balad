@section('css')
<!-- DataTables -->
< link rel = "stylesheet" href ="{{ asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" > <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
        @endsection

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                            <th>#</th>
                        @foreach ($columns as $column)
                            <th>{{ $column['label'] }}</th>
                        @endforeach
                            <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>

            </table>
        </div>

        @section('js')
        <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/admin/plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
        @endsection
        
        
        @section('custom_scripts')
            const data = @json($columns);
            const columns = Object.entries(data).map((item, i, array) => {
        const data = {
            data: item[1]['key'],
            'searchable': !item[1]['searchable'] ? true : false,
            'orderable': !item[1]['orderable'] ? true : false,
            'render': function (data, type, full, meta) {
                if (Object.keys(item[1]).includes('render')) {
                    return item[1]['render'];
                } else {
                    return data;
                }
            }
        };

        return data;
    })
    
        @if ($action['status'])
            // Action
            columns.push({
            data: 'id',
            'searchable' : false,
            'orderable' : false,
            'render' : function (data, type, full, meta) {
                @foreach($action['links'] as $item => $link)
                return `<a href="/admin/{{ $link }}/${data}"><span class="fa fa-edit"></span></a>`;
                @endforeach
            }
    })
        @endif
    
        $('.table').DataTable({
        "processing" : true,
        "serverSide" : true,
        "ajax" : "{{ $url }}",
        columns,
        "paging" : true,
        "lengthChange" : true,
        "searching" : true,
        "ordering" : true,
        "info" : true,
        "autoWidth" : false,
        "responsive" : true,
        "rowCallback": function (nRow, aData, iDisplayIndex) {
            var oSettings = this.fnSettings ();
            $("td:first", nRow).html(oSettings._iDisplayStart+iDisplayIndex +1);
            return nRow;
       }
    });
    @endsection
