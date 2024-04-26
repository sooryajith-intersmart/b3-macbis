@extends('admin::layouts.app')
@section('title', 'Edit Policy')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('policy.index') }}">Policy</a></li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Policy</h3>
                <div class="card-tools">
                    <a href="{{ route('policy.index') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-list"></i> Policy
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- form start -->
<form method="POST" action="{{ route('policy.update', $policy->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                    name="title" value="{{ old('title', $policy->title) }}">
                                @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status"
                                    name="status">
                                    <option value="1" {{ old('status', $policy->status) == '1' ? 'selected' : '' }}>
                                        Enable
                                    </option>
                                    <option value="0" {{ old('status', $policy->status) == '0' ? 'selected' : '' }}>
                                        Disable
                                    </option>
                                </select>
                                @error('status')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" id="content"
                                    name="content">{{ old('content', $policy->content) }}</textarea>
                                @error('content')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Page Banner</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="page_banner_subtitle">Subtitle</label>
                                <input type="text"
                                    class="form-control @error('page_banner_subtitle') is-invalid @enderror"
                                    id="page_banner_subtitle" name="page_banner_subtitle"
                                    value="{{ old('page_banner_subtitle', $policy->page_banner_subtitle) }}">
                                @error('page_banner_subtitle')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="page_banner_title">Title</label>
                                <input type="text" class="form-control @error('page_banner_title') is-invalid @enderror"
                                    id="page_banner_title" name="page_banner_title"
                                    value="{{ old('page_banner_title', $policy->page_banner_title) }}">
                                @error('page_banner_title')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="page_banner_image">Image</label>
                                <div class="custom-file @error('page_banner_image') is-invalid @enderror">
                                    <input type="file" class="custom-file-input file-input-preview"
                                        id="page_banner_image" name="page_banner_image">
                                    <label class="custom-file-label" for="page_banner_image">Choose file</label>
                                </div>
                                @error('page_banner_image')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-info">Recommended image dimensions: 1209 x 590 px</small>
                                <div class="image-container filePreview">
                                    <img src="{{ $policy->page_banner_image_value }}" height="80"
                                        class="pl-1 pt-1 preview-file">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="page_banner_image_alt_text">Image Alt Text</label>
                                <input type="text"
                                    class="form-control @error('page_banner_image_alt_text') is-invalid @enderror"
                                    id="page_banner_image_alt_text" name="page_banner_image_alt_text"
                                    value="{{ old('page_banner_image_alt_text', $policy->page_banner_image_alt_text) }}">
                                @error('page_banner_image_alt_text')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Meta Tags</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" class="form-control @error('meta_title') is-invalid @enderror"
                                    id="meta_title" name="meta_title"
                                    value="{{ old('meta_title', $policy->meta_title) }}">
                                @error('meta_title')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <textarea id="meta_description" name="meta_description"
                                    class="form-control @error('meta_description') is-invalid @enderror">{{ old('meta_description', $policy->meta_description) }}</textarea>
                                @error('meta_description')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="meta_keywords">Meta Keywords</label>
                                <textarea class="form-control @error('meta_keywords') is-invalid @enderror"
                                    id="meta_keywords"
                                    name="meta_keywords">{{ old('meta_keywords', $policy->meta_keywords) }}</textarea>
                                @error('meta_keywords')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
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
@push('js')
<script>
$(function() {
    // Summernote
    $('#content')
        .summernote({
            minHeight: 200
        })
})
</script>
@endpush