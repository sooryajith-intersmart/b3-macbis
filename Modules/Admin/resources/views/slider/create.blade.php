@extends('admin::layouts.app')
@section('title', 'Create Slider')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('slider.index') }}">Sliders</a></li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create Slider</h3>
                <div class="card-tools">
                    <a href="{{ route('slider.index') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-list"></i> Sliders
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- form start -->
<form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                                @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ old('link') }}">
                                @error('link')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="custom-file @error('image') is-invalid @enderror">
                                    <input type="file" class="custom-file-input file-input-preview" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                                @error('image')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-info">Recommended image dimensions: 500 x 1678 px</small>
                                <div class="image-container filePreview">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sort_order">Sort Order</label>
                                <input type="number" class="form-control @error('sort_order') is-invalid @enderror" id="sort_order" name="sort_order" placeholder="0" min="0" value="{{ old('sort_order') }}">
                                @error('sort_order')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
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