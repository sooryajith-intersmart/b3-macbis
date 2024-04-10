@extends('admin::layouts.app')
@section('title', 'Theme Settings')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Key</th>
                            <th>Value</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($theme_settings as $theme_setting)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $theme_setting->key_without_underscore }}</td>
                            @if ($theme_setting->type == 0)
                            <td>{{ $theme_setting->value }}</td>
                            @elseif ($theme_setting->type == 1)
                            <td>
                                <img src="{{ $theme_setting->image }}" class="rounded" alt="logo" width="40">
                            </td>
                            @elseif ($theme_setting->type == 2)
                            <td>
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"
                                        style="color: {{ $theme_setting->value }};"></i>
                                    <i class="fas fa-circle fa-stack-1x"
                                        style="color: {{ $theme_setting->value }};"></i>
                                </span>
                            </td>
                            @endif
                            <td>
                                <a href="{{ route('theme-settings.edit', base64_encode($theme_setting->id)) }}"
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