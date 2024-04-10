@extends('admin::layouts.app')
@section('title', 'Edit Business')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('business.index') }}">Business</a></li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Business</h3>
                <div class="card-tools">
                    <a href="{{ route('business.index') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-list"></i> Business
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- form start -->
<form method="POST" action="{{ route('business.update', $business->id) }}" enctype="multipart/form-data">
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
                                    name="title" value="{{ old('title', $business->title) }}">
                                @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" class="form-control @error('link') is-invalid @enderror" id="link"
                                    name="link" value="{{ old('link', $business->link) }}">
                                @error('link')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    id="description" name="description">{{ old('description', $business->description) }}</textarea>
                                @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="custom-file @error('image') is-invalid @enderror">
                                    <input type="file" class="custom-file-input file-input-preview" id="image"
                                        name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                                @error('image')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-info">Recommended image dimensions: 365 x 549 px</small>
                                <div class="image-container filePreview">
                                    <img src="{{ $business->image_value }}" height="80" class="pl-1 pt-1 preview-file">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <div class="custom-file @error('logo') is-invalid @enderror">
                                    <input type="file" class="custom-file-input file-input-preview" id="logo"
                                        name="logo">
                                    <label class="custom-file-label" for="logo">Choose file</label>
                                </div>
                                @error('logo')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-info">Recommended image dimensions: 260 x 70 px</small>
                                <div class="image-container filePreview">
                                    <img src="{{ $business->logo_value }}" height="80" class="pl-1 pt-1 preview-file">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image_alt_text">Image Alt Text</label>
                                <input type="text" class="form-control @error('image_alt_text') is-invalid @enderror"
                                    id="image_alt_text" name="image_alt_text" value="{{ old('image_alt_text', $business->image_alt_text) }}">
                                @error('image_alt_text')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="logo_alt_text">Logo Alt Text</label>
                                <input type="text" class="form-control @error('logo_alt_text') is-invalid @enderror"
                                    id="logo_alt_text" name="logo_alt_text" value="{{ old('logo_alt_text', $business->logo_alt_text) }}">
                                @error('logo_alt_text')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sort_order">Sort Order</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror"
                                    id="sort_order" name="sort_order" placeholder="0" min="0"
                                    value="{{ old('sort_order', $business->sort_order) }}">
                                @error('sort_order')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status"
                                    name="status">
                                    <option value="1" {{ old('status', $business->status) == '1' ? 'selected' : '' }}>Enable
                                    </option>
                                    <option value="0" {{ old('status', $business->status) == '0' ? 'selected' : '' }}>Disable
                                    </option>
                                </select>
                                @error('status')
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
    $('#description')
        .summernote({
            minHeight: 200
        })
})
</script>
@endpush