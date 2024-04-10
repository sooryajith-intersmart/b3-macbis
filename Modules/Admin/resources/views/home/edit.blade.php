@extends('admin::layouts.app')
@section('title', 'Edit Home Page')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Home Page</h3>
            </div>
        </div>
    </div>
</div>
<!-- form start -->
<form method="POST" action="{{ route('home.update', $home->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="section_one_title">Slider Title</label>
                                <input type="text" class="form-control @error('section_one_title') is-invalid @enderror"
                                    id="section_one_title" name="section_one_title"
                                    value="{{ old('section_one_title', $home->section_one_title) }}">
                                @error('section_one_title')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="section_two_title">Business Title</label>
                                <input type="text" class="form-control @error('section_two_title') is-invalid @enderror"
                                    id="section_two_title" name="section_two_title"
                                    value="{{ old('section_two_title', $home->section_two_title) }}">
                                @error('section_two_title')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="section_two_title_two">Business Title (In Red Box)</label>
                                <input type="text"
                                    class="form-control @error('section_two_title_two') is-invalid @enderror"
                                    id="section_two_title_two" name="section_two_title_two"
                                    value="{{ old('section_two_title_two', $home->section_two_title_two) }}">
                                @error('section_two_title_two')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="section_three_title">Our Story Title</label>
                                <input type="text"
                                    class="form-control @error('section_three_title') is-invalid @enderror"
                                    id="section_three_title" name="section_three_title"
                                    value="{{ old('section_three_title', $home->section_three_title) }}">
                                @error('section_three_title')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="section_three_description">Our Story Description</label>
                                <textarea class="form-control @error('section_three_description') is-invalid @enderror"
                                    id="section_three_description"
                                    name="section_three_description">{{ old('section_three_description', $home->section_three_description) }}</textarea>
                                @error('section_three_description')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="section_three_image">Our Story Image</label>
                                <div class="custom-file @error('section_three_image') is-invalid @enderror">
                                    <input type="file" class="custom-file-input file-input-preview"
                                        id="section_three_image" name="section_three_image">
                                    <label class="custom-file-label" for="section_three_image">Choose file</label>
                                </div>
                                @error('section_three_image')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="form-text text-info">Recommended image dimensions: 723 x 720 px</small>
                                <div class="image-container filePreview">
                                    <img src="{{ $home->section_three_image_value }}" height="80"
                                        class="pl-1 pt-1 preview-file">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="section_four_subtitle">Enquiry Subtitle</label>
                                <input type="text"
                                    class="form-control @error('section_four_subtitle') is-invalid @enderror"
                                    id="section_four_subtitle" name="section_four_subtitle"
                                    value="{{ old('section_four_subtitle', $home->section_four_subtitle) }}">
                                @error('section_four_subtitle')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="section_four_title">Enquiry Title</label>
                                <input type="text"
                                    class="form-control @error('section_four_title') is-invalid @enderror"
                                    id="section_four_title" name="section_four_title"
                                    value="{{ old('section_four_title', $home->section_four_title) }}">
                                @error('section_four_title')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="section_five_title">Blogs Title</label>
                                <input type="text"
                                    class="form-control @error('section_five_title') is-invalid @enderror"
                                    id="section_five_title" name="section_five_title"
                                    value="{{ old('section_five_title', $home->section_five_title) }}">
                                @error('section_five_title')
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
            $('#section_three_description')
                .summernote({
                    minHeight: 100,
                    height: 100,
                })
        })
    </script>
@endpush
