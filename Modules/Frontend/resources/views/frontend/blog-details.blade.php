@extends('frontend::layouts.app')
@section('title', $blog_single->meta_title)
@section('description', $blog_single->meta_description)
@section('keywords', $blog_single->meta_keywords)
@section('image', $blog_single->image)
@section('content')
<div id="pageWrapper" class="blogPage detail">

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
                        <a href="{{ route('blogs') }}">Blog</a>
                    </li>
                    <li>
                        <a class="current" href="{{ route('blog.details', $blog_single->slug) }}">{{ $blog_single->title }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section id="BlogDetail">
        <div class="container">
            <div class="cntWrap">
                <img src="{{ $blog_single->image_value }}" width="460" height="280" alt="{{ $blog_single->image_alt_text }}">
                <h2>{{ $blog_single->title }}</h2>
                {!! $blog_single->description !!}
            </div>
        </div>
    </section>

    @if($blogs->isNotEmpty())
    <section id="Blogs">
        <div class="container">
            <div class="flxTle wow animate__fadeInUp" data-wow-duration="1s">
                <div class="tleWrap">
                    <div class="mTle">Latest Blogs</div>
                </div>
                <div class="rgtSd">
                    <div class="btnWrap">
                        <a href="{{ route('blogs') }}" class="viewBtn">
                            <span>VIEW ALL BLOG</span>
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.883 21.598">
                                    <g id="Group_4" data-name="Group 4" transform="translate(-1054.246 1277.886) rotate(-90)">
                                        <path id="Path_9" data-name="Path 9" d="M1277.525,1090.64l-10.437,10.954-10.437-10.954" transform="translate(0 -26.191)" fill="none" stroke="#000" stroke-width="1" />
                                        <path id="Path_10" data-name="Path 10" d="M1293.877,1053.246V1074.4" transform="translate(-26.79 1)" fill="none" stroke="#000" stroke-width="1" />
                                    </g>
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="splide blogSlide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($blogs as $blog)
                        <li class="splide__slide wow animate__fadeInUp" data-wow-duration="1s">
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
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    @endif
</div>
@endsection
@push('js')
<!-- SPLIDE --->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/css/splide.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/js/splide.min.js"></script>

<script>
    $(document).ready(function() {
        var blogSlide = new Splide('.blogSlide', {
            type: 'splide',
            perPage: 3,
            rewind: true,
            arrows: false,
            pagination: false,
            autoplay: true,
            perMove: 1,
            gap: 45,
            breakpoints: {
                1200: {
                    gap: 35,
                },
                992: {
                    gap: 25,
                },
                576: {
                    perPage: 2.2,
                    gap: 20,
                },
                376: {
                    perPage: 1.2,
                    gap: 15,
                },
            }
        });
        blogSlide.mount();
    });
</script>
@endpush