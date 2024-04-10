@extends('admin::layouts.app')
@section('title', 'Blogs')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Blogs</h3>
                <div class="card-tools">
                    <a href="{{ route('blog.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Create
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Title</th>
                            <th>Thumb Image</th>
                            <th>Posted Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($blogs as $blog)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $blog->title }}</td>
                            <td><img src="{{ $blog->thumb_image_value }}" class="rounded" alt="" width="40"></td>
                            <td>{{ $blog->posted_date_value }}</td>
                            <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input status" id="status{{ base64_encode($blog->id) }}" name="status"
                                        data-model="Blog" value="{{ $blog->status }}"
                                        data-id="{{ base64_encode($blog->id) }}" @checked($blog->status == 1)>
                                    <label class="custom-control-label"
                                        for="status{{ base64_encode($blog->id) }}">{{ $blog->status == 1 ? 'Enabled' : 'Disabled' }}</label>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('blog.edit', base64_encode($blog->id)) }}"
                                    class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top"
                                    data-original-title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('blog.destroy', $blog->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm delete-btn" data-toggle="tooltip"
                                        data-placement="top" data-original-title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
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