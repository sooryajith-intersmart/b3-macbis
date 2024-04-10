@extends('admin::layouts.app')
@section('title', 'Edit Meta Tag')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('meta-tag.index') }}">Meta Tags</a></li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Meta Tag: {{ $meta_tag->page_value }}</h3>
                    <div class="card-tools">
                        <a href="{{ route('meta-tag.index') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-list"></i> Meta Tags
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- form start -->
    <form method="POST" action="{{ route('meta-tag.update', $meta_tag->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta_title">Meta Title</label>
                                    <input type="text" class="form-control @error('meta_title') is-invalid @enderror"
                                        id="meta_title" name="meta_title"
                                        value="{{ old('meta_title', $meta_tag->meta_title) }}">
                                    @error('meta_title')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea id="meta_description" name="meta_description"
                                        class="form-control @error('meta_description') is-invalid @enderror">{{ old('meta_description', $meta_tag->meta_description) }}</textarea>
                                    @error('meta_description')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta_keywords">Meta Keywords</label>
                                    <textarea class="form-control @error('meta_keywords') is-invalid @enderror" id="meta_keywords" name="meta_keywords">{{ old('meta_keywords', $meta_tag->meta_keywords) }}</textarea>
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
