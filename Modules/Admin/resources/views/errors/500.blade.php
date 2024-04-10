@extends('admin::layouts.app')
@section('title', '500 - Internal Server Error')
@section('content')
    <div class="error-page">
        <h2 class="headline text-danger">500</h2>

        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Something went wrong.</h3>

            <p>
                We will work on fixing that right away.
                Meanwhile, you may <a href="{{ route('admin.dashboard') }}">return to dashboard</a> or try using the search form.
            </p>
        </div>
    </div>
@endsection
