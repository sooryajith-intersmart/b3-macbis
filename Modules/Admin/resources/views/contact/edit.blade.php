@extends('admin::layouts.app')
@section('title', 'Edit Contact Page')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Contact Page</h3>
            </div>
        </div>
    </div>
</div>
<!-- form start -->
<form method="POST" action="{{ route('contact.update', $contact->id) }}">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="registered_address">Registered Address</label>
                                <textarea class="form-control @error('registered_address') is-invalid @enderror"
                                    id="registered_address"
                                    name="registered_address">{{ old('registered_address', $contact->registered_address) }}</textarea>
                                @error('registered_address')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="head_office_address">Head Office Address</label>
                                <textarea class="form-control @error('head_office_address') is-invalid @enderror"
                                    id="head_office_address"
                                    name="head_office_address">{{ old('head_office_address', $contact->head_office_address) }}</textarea>
                                @error('head_office_address')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="registered_address_map_link">Registered Address Map Link</label>
                                <input type="text" class="form-control @error('registered_address_map_link') is-invalid @enderror" id="registered_address_map_link"
                                    name="registered_address_map_link" value="{{ old('registered_address_map_link', $contact->registered_address_map_link) }}">
                                @error('registered_address_map_link')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="head_office_address_map_link">Head Office Address Map Link</label>
                                <input type="text" class="form-control @error('head_office_address_map_link') is-invalid @enderror" id="head_office_address_map_link"
                                    name="head_office_address_map_link" value="{{ old('head_office_address_map_link', $contact->head_office_address_map_link) }}">
                                @error('head_office_address_map_link')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                    name="phone" value="{{ old('phone', $contact->phone) }}">
                                @error('phone')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" value="{{ old('email', $contact->email) }}">
                                @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="facebook_link">Facebook Link</label>
                                <input type="text" class="form-control @error('facebook_link') is-invalid @enderror" id="facebook_link"
                                    name="facebook_link" value="{{ old('facebook_link', $contact->facebook_link) }}">
                                @error('facebook_link')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="instagram_link">Instagram Link</label>
                                <input type="text" class="form-control @error('instagram_link') is-invalid @enderror" id="instagram_link"
                                    name="instagram_link" value="{{ old('instagram_link', $contact->instagram_link) }}">
                                @error('instagram_link')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="twitter_link">Twitter Link</label>
                                <input type="text" class="form-control @error('twitter_link') is-invalid @enderror" id="twitter_link"
                                    name="twitter_link" value="{{ old('twitter_link', $contact->twitter_link) }}">
                                @error('twitter_link')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="linkedin_link">LinkedIn Link</label>
                                <input type="text" class="form-control @error('linkedin_link') is-invalid @enderror" id="linkedin_link"
                                    name="linkedin_link" value="{{ old('linkedin_link', $contact->linkedin_link) }}">
                                @error('linkedin_link')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pinterest_link">Pinterest Link</label>
                                <input type="text" class="form-control @error('pinterest_link') is-invalid @enderror" id="pinterest_link"
                                    name="pinterest_link" value="{{ old('pinterest_link', $contact->pinterest_link) }}">
                                @error('pinterest_link')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="youtube_link">YouTube Link</label>
                                <input type="text" class="form-control @error('youtube_link') is-invalid @enderror" id="youtube_link"
                                    name="youtube_link" value="{{ old('youtube_link', $contact->youtube_link) }}">
                                @error('youtube_link')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="map_link">Map Link (iFrame)</label>
                                <input type="text" class="form-control @error('map_link') is-invalid @enderror" id="map_link"
                                    name="map_link" value="{{ old('map_link', $contact->map_link) }}">
                                @error('map_link')
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