@extends('admin::layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $enquiries }}</h3>

                    <p>Enquiries</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-textsms"></i>
                </div>
                <a href="{{ route('enquiry.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection
