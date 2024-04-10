@extends('admin::layouts.app')
@section('title', 'Edit Theme Settings')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('theme-settings.index') }}">Theme Settings</a></li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Theme Setting: {{ $theme_setting->key_without_underscore }}</h3>
                <div class="card-tools">
                    <a href="{{ route('theme-settings.index') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-list"></i> Theme Settings
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- form start -->
<form method="POST" action="{{ route('theme-settings.update', $theme_setting->id) }}" @if ($theme_setting->type == 1)
    enctype="multipart/form-data" @endif>
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="type" value="{{ $theme_setting->type }}">
                            @if ($theme_setting->type == 0)
                            <div class="form-group">
                                <label for="value">Value</label>
                                <input type="text" class="form-control @error('value') is-invalid @enderror" id="value"
                                    name="value" placeholder="Enter Value"
                                    value="{{ old('value', $theme_setting->value) }}">
                                @error('value')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            @elseif ($theme_setting->type == 1)
                            <div class="form-group">
                                <label for="value">Value</label>
                                <div class="custom-file @error('value') is-invalid @enderror">
                                    <input type="file" class="custom-file-input file-input-preview" id="value"
                                        name="value">
                                    <label class="custom-file-label" for="value">Choose file</label>
                                </div>
                                @error('value')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-info">Recommended image dimensions: 300 x 300 px</small>
                                <div class="image-container filePreview">
                                    <img src="{{ $theme_setting->image }}" height="80" class="pl-1 pt-1 preview-file">
                                </div>
                            </div>
                            @elseif ($theme_setting->type == 2)
                            <div class="form-group">
                                <label for="value">Value</label>
                                <input type="color" class="form-control @error('value') is-invalid @enderror" id="value"
                                    name="value" value="{{ old('value', $theme_setting->value) }}">
                                @error('value')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" id="submitBtn">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection