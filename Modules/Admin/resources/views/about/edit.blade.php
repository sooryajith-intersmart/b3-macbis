@extends('admin::layouts.app')
@section('title', 'Edit About Page')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit About Page</h3>
            </div>
        </div>
    </div>
</div>
<!-- form start -->
<form method="POST" action="{{ route('about.update', $about->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                    name="title" value="{{ old('title', $about->title) }}">
                                @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    id="description"
                                    name="description">{{ old('description', $about->description) }}</textarea>
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
                                <small class="form-text text-info">Recommended image dimensions: 723 x 720 px</small>
                                <div class="image-container filePreview">
                                    <img src="{{ $about->image_value }}" height="80" class="pl-1 pt-1 preview-file">
                                </div>
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