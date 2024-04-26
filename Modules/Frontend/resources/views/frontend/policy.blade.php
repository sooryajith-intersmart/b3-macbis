@extends('frontend::layouts.app')
@section('title', $policy->meta_title)
@section('description', $policy->meta_description)
@section('keywords', $policy->meta_keywords)
@section('image', url('frontend/images/logo.png'))
@section('content')
<div id="pageWrapper" class="privacyPolicy">
    <section id="innerBanner">
        <div class="sp-container rgt">
            <div class="dFlx">
                <div class="lftSd">
                    <div class="cntWrap">
                        <h5 class="sHead">{{ $policy->page_banner_subtitle }}</h5>
                        <h1 class="mHead">{{ $policy->page_banner_title }}</h1>
                    </div>
                </div>
                <div class="rgtSd">
                    <div class="imgWrap">
                        <img src="{{ $policy->page_banner_image_value }}" width="1209" height="590" alt="{{ $policy->page_banner_image_alt_text }}">
                    </div>
                </div>
            </div>
        </div>
        <div id="Breadcrumb">
            <div class="container">
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <a class="current" href="{{ route('policy', $policy->slug) }}">{{ $policy->title }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section id="content">
        <div class="container">
            <div class="tleWrap center wow animate__fadeInDown" data-wow-duration="1s">
                <h2 class="mTle">{{ $policy->title }}</h2>
            </div>
            {!! $policy->content !!}
        </div>
    </section>
</div>
@endsection