@extends('frontend::layouts.app')
@section('title', '404 - Page Not Found')
@section('content')
<div id="pageWrapper" class="errorPage NOBanner">
    <section>
        <div class="container">
            <div class="row">
                <div class="page_cntnt">
                    <h1 class="head_one">404</h1>
                    <h3 class="head_two">PAGE NOT FOUND</h3>
                    <h4 class="head_three">THE PAGE YOU ARE LOOKING FOR IS NOT FOUND</h4>
                    <p>The page you are looking for does not exist. It may have been moved, or removed altogether. </p>
                    <p>Perhaps you can return back to the site’s homepage and see if you can find what you are looking
                        for.</p>
                    <a href="{{ route('home') }}" class="btn hoveranim">
                        <span>Back to homepage</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection