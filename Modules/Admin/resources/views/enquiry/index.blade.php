@extends('admin::layouts.app')
@section('title', 'Enquiries')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            @if ($enquiries->isNotEmpty())
            <div class="card-header">
                <a href="{{ route('enquiry.export') }}" class="btn btn-success btn-sm">
                    <i class="fas fa-download"></i> Export
                </a>
            </div>
            @endif
            <div class="card-body">
                <table id="EnquiryDataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
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
@endsection
@push('js')
<script>
$(document).ready(function() {
    var table = $('#EnquiryDataTable').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        responsive: true,
        lengthMenu: [
            [30, 60, 90, -1],
            [30, 60, 90, 'All']
        ],
        ajax: "{{ route('enquiry.index') }}",
        columns: [{
                data: 'DT_RowIndex',
                searchable: false,
                orderable: false
            },
            {
                data: 'name',
                name: 'name',
            },
            {
                data: 'email',
                name: 'email',
            },
            {
                data: 'phone',
                name: 'phone',
            },
            {
                data: 'message',
                name: 'message',
                render: function(data, type, full, meta) {
                    if (type === 'display') {
                        return data.length > 30 ?
                            '<span data-toggle="tooltip" data-placement="left" data-original-title="' +
                            data + '" data-html="true">' + data.substr(0, 30) + '...</span>' :
                            data;
                    }
                    return data;
                },
            },
            {
                data: 'action',
                name: 'action'
            },
        ],
        language: {
            emptyTable: "No data found."
        },
        initComplete: function() {
            $('[data-toggle="tooltip"]').tooltip();

            // Attach click event listener to delete buttons
            $('#EnquiryDataTable').on('click', '.delete-btn', function(event) {
                event.preventDefault();
                const deleteForm = $(this).closest('form');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this item!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: primary_color,
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteForm.submit();
                    }
                });
            });
        }
    });
});
</script>
@endpush