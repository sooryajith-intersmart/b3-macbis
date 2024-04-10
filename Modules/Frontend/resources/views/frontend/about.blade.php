@extends('frontend::layouts.app')
@section('title', $metaTags['metaTitle'])
@section('description', $metaTags['metaDescription'])
@section('keywords', $metaTags['metaKeywords'])
@section('image', url('frontend/images/logo.png'))
@section('content')
<div id="pageWrapper" class="aboutPage">

    <section id="innerBanner">
        <div class="sp-container rgt">
            <div class="dFlx">
                <div class="lftSd">
                    <div class="cntWrap">
                        <h5 class="sHead">{{ $pageBanner['subtitle']}}</h5>
                        <h1 class="mHead">{{ $pageBanner['title']}}</h1>
                    </div>
                </div>
                <div class="rgtSd">
                    <div class="imgWrap">
                        <img src="{{ $pageBanner['image']}}" width="1200" height="590" alt="{{ $pageBanner['imageAltText']}}">
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
                        <a class="current" href="{{ route('about') }}">Our Story</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section id="OurStory">
        <div class="container">
            <div class="dFlx">
                <div class="abtSec">
                    <div class="lftSd">
                        <div class="imgWrap">
                            <img src="{{ $about->image_value }}" width="723" height="720" alt="{{ $about->title }}">
                        </div>
                    </div>
                    <div class="rgtSd wow animate__fadeInUp" data-wow-duration="1.2s">
                        <div class="cntWrap">
                            <div class="tleWrap">
                                <h2 class="mTle">{{ $about->title }}</h2>
                            </div>
                            {!! $about->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection