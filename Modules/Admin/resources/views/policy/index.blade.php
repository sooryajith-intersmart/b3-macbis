@extends('admin::layouts.app')
@section('title', 'Policy')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <!-- <div class="card-header">
                <h3 class="card-title">Policy</h3>
                <div class="card-tools">
                    <a href="{{ route('policy.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Create
                    </a>
                </div>
            </div> -->
            <div class="card-body">
                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($policies as $policy)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $policy->title }}</td>
                            <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input status" id="status{{ base64_encode($policy->id) }}" name="status"
                                        data-model="Policy" value="{{ $policy->status }}"
                                        data-id="{{ base64_encode($policy->id) }}" @checked($policy->status == 1)>
                                    <label class="custom-control-label"
                                        for="status{{ base64_encode($policy->id) }}">{{ $policy->status == 1 ? 'Enabled' : 'Disabled' }}</label>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('policy.edit', base64_encode($policy->id)) }}"
                                    class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top"
                                    data-original-title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- <form action="{{ route('policy.destroy', $policy->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm delete-btn" data-toggle="tooltip"
                                        data-placement="top" data-original-title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form> -->
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