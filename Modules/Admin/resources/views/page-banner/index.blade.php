@extends('admin::layouts.app')
@section('title', 'Page Banner')
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
                                <th>Banner</th>
                                <th>Subtitle</th>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($page_banners as $page_banner)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $page_banner->page_value }}</td>
                                    <td><img src="{{ $page_banner->image_value }}" class="rounded"
                                            alt="" width="40"></td>
                                    <td>{{ $page_banner->subtitle }}</td>
                                    <td>{{ $page_banner->title }}</td>
                                    <td>
                                        <a href="{{ route('page-banner.edit', base64_encode($page_banner->id)) }}"
                                            class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top"
                                            data-original-title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No data found.</td>
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
