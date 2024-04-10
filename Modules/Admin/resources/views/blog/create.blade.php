@extends('admin::layouts.app')
@section('title', 'Create Blog')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('blog.index') }}">Blogs</a></li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create Blog</h3>
                <div class="card-tools">
                    <a href="{{ route('blog.index') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-list"></i> Blogs
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- form start -->
<form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                    name="title" value="{{ old('title') }}">
                                @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    id="description" name="description">{{ old('description') }}</textarea>
                                @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="thumb_image">Thumb Image</label>
                                <div class="custom-file @error('thumb_image') is-invalid @enderror">
                                    <input type="file" class="custom-file-input file-input-preview" id="thumb_image"
                                        name="thumb_image">
                                    <label class="custom-file-label" for="thumb_image">Choose file</label>
                                </div>
                                @error('thumb_image')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-info">Recommended image dimensions: 456 x 290 px</small>
                                <div class="image-container filePreview"></div>
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
                                <small class="form-text text-info">Recommended image dimensions: 1210 x 446 px</small>
                                <div class="image-container filePreview">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="thumb_image_alt_text">Thumb Image Alt Text</label>
                                <input type="text" class="form-control @error('thumb_image_alt_text') is-invalid @enderror" id="thumb_image_alt_text"
                                    name="thumb_image_alt_text" value="{{ old('thumb_image_alt_text') }}">
                                @error('thumb_image_alt_text')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image_alt_text">Image Alt Text</label>
                                <input type="text" class="form-control @error('image_alt_text') is-invalid @enderror" id="image_alt_text"
                                    name="image_alt_text" value="{{ old('image_alt_text') }}">
                                @error('image_alt_text')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" class="form-control @error('meta_title') is-invalid @enderror"
                                    id="meta_title" name="meta_title"
                                    value="{{ old('meta_title') }}">
                                @error('meta_title')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <textarea id="meta_description" name="meta_description"
                                    class="form-control @error('meta_description') is-invalid @enderror">{{ old('meta_description') }}</textarea>
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
                                    name="meta_keywords">{{ old('meta_keywords') }}</textarea>
                                @error('meta_keywords')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status"
                                    name="status">
                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Enable
                                    </option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Disable
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
                    <button type="submit" class="btn btn-primary" id="submitBtn">Create</button>
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