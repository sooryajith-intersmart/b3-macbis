@extends('admin::layouts.app')
@section('title', 'Edit Page Banner')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('page-banner.index') }}">Page Banner</a></li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Page Banner: {{ $page_banner->page_value }}</h3>
                <div class="card-tools">
                    <a href="{{ route('page-banner.index') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-list"></i> Page Banner
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- form start -->
<form method="POST" action="{{ route('page-banner.update', $page_banner->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subtitle">Subtitle</label>
                                <input type="text" class="form-control @error('subtitle') is-invalid @enderror"
                                    id="subtitle" name="subtitle" value="{{ old('subtitle', $page_banner->subtitle) }}">
                                @error('subtitle')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                    name="title" value="{{ old('title', $page_banner->title) }}">
                                @error('title')
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
                                <small class="form-text text-info">Recommended image dimensions: 1209 x 590 px</small>
                                <div class="image-container filePreview">
                                    <img src="{{ $page_banner->image_value }}" height="80"
                                        class="pl-1 pt-1 preview-file">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image_alt_text">Image Alt Text</label>
                                <input type="text" class="form-control @error('image_alt_text') is-invalid @enderror"
                                    id="image_alt_text" name="image_alt_text"
                                    value="{{ old('image_alt_text', $page_banner->image_alt_text) }}">
                                @error('image_alt_text')
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