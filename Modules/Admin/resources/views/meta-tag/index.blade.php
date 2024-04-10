@extends('admin::layouts.app')
@section('title', 'Meta Tags')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Page</th>
                                <th>Meta Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($meta_tags as $meta_tag)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $meta_tag->page_value }}</td>
                                    <td>{{ $meta_tag->meta_title }}</td>
                                    <td>
                                        <a href="{{ route('meta-tag.edit', base64_encode($meta_tag->id)) }}"
                                            class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top"
                                            data-original-title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No data found.</td>
                                </tr>
                            @endforelse
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
            var options = {
                // buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"]
            };
            initializeDataTable(options);
        });
    </script>
@endpush
