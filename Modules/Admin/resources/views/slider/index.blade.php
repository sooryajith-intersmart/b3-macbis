@extends('admin::layouts.app')
@section('title', 'Sliders')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Sliders</h3>
                <div class="card-tools">
                    <a href="{{ route('slider.create') }}" class="btn btn-primary btn-sm">
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
                            <th>Image</th>
                            <th>Sort Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sliders as $slider)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $slider->title }}</td>
                            <td><img src="{{ $slider->image_value }}" class="rounded" alt="" width="40"></td>
                            <td>
                                <input type="text" class="form-control sort-order w-50" placeholder="0"
                                    data-model="Slider" data-id="{{ base64_encode($slider->id) }}" name="sort_order"
                                    value="{{ $slider->sort_order }}">
                            </td>
                            <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input status" id="status{{ base64_encode($slider->id) }}" name="status"
                                        data-model="Slider" value="{{ $slider->status }}"
                                        data-id="{{ base64_encode($slider->id) }}" @checked($slider->status == 1)>
                                    <label class="custom-control-label"
                                        for="status{{ base64_encode($slider->id) }}">{{ $slider->status == 1 ? 'Enabled' : 'Disabled' }}</label>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('slider.edit', base64_encode($slider->id)) }}"
                                    class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top"
                                    data-original-title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('slider.destroy', $slider->id) }}" method="POST"
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