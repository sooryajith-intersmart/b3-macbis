@extends('frontend::layouts.app')
@section('title', $metaTags['metaTitle'])
@section('description', $metaTags['metaDescription'])
@section('keywords', $metaTags['metaKeywords'])
@section('image', url('frontend/images/logo.png'))
@section('content')
<div id="pageWrapper" class="blogPage">
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
                        <a class="current" href="{{ route('blogs') }}">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section id="BlogListing">
        <div class="container">
            <div class="tleWrap center">
                <div class="mTle">Blogs</div>
            </div>
            @if($blogs->isNotEmpty())
            <div class="dFlx">
                @foreach($blogs as $blog)
                <div class="item">
                    <div class="blogBx">
                        <div class="imgWrap">
                            <img src="{{ $blog->thumb_image_value }}" width="460" height="280" alt="{{ $blog->thumb_image_alt_text }}">
                        </div>
                        <div class="cntWrap">
                            <div class="tle">{{ $blog->title }}</div>
                            <div class="txt">
                                {!! strip_tags($blog->description) !!}
                            </div>
                            <div class="bttmWrap">
                                <div class="item">
                                    <div class="txt">{{ $blog->posted_date_value }}</div>
                                </div>
                                <div class="item">
                                    <a href="{{ route('blog.details', $blog->slug) }}" class="rMoreBtn">
                                        <span>READ MORE</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
</div>
@endsection