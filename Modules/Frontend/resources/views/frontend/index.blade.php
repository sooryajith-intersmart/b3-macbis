@extends('frontend::layouts.app')
@section('title', $metaTags['metaTitle'])
@section('description', $metaTags['metaDescription'])
@section('keywords', $metaTags['metaKeywords'])
@section('image', url('frontend/images/logo.png'))
@push('css')
<style>
.grecaptcha-badge {
    visibility: hidden;
}
</style>
@endpush
@section('content')
<div id="pageWrapper">

    <section id="MainBanner">
        <div class="sp-container rgt">
            <div class="dFlx">
                <div class="lftSd">
                    <div class="cntWrap">
                        <!-- <h5 class="sHead"> </h5> -->
                        <h1 class="mHead">{{ $home->section_one_title }}</h1>
                        <div class="btnWrap wow animate__fadeInDown" data-wow-duration="1.2s">
                            <a href="javascript:void(0)" class="baseBtn hoveranim">
                                <span>GET STARTED</span>
                            </a>
                        </div>
                    </div>
                </div>
                @if(!empty($first_sliders) && !empty($second_sliders) && !empty($third_sliders) &&
                !empty($fourth_sliders))
                <div class="rgtSd">
                    <div class="sliderWrap">
                        @if(!empty($first_sliders))
                        <div class="item">
                            <div class="swiper homeBanner1">
                                <div class="swiper-wrapper">
                                    @foreach($first_sliders as $first_slider)
                                    <div class="swiper-slide">
                                        <a href="{{ $first_slider->link }}" target="_blank">
                                            <div class="imgWrap">
                                                <img src="{{ $first_slider->image_value }}" width="300" height="1000"
                                                    alt="{{ $first_slider->image__alt_text }}">
                                                <div class="bttmWrap">
                                                    <div class="tle">{{ $first_slider->title }}</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(!empty($second_sliders))
                        <div class="item">
                            <div class="swiper homeBanner2">
                                <div class="swiper-wrapper">
                                    @foreach($second_sliders as $second_slider)
                                    <div class="swiper-slide">
                                        <a href="{{ $second_slider->link }}" target="_blank">
                                            <div class="imgWrap">
                                                <img src="{{ $second_slider->image_value }}" width="300" height="1000"
                                                    alt="{{ $second_slider->image__alt_text }}">
                                                <div class="bttmWrap">
                                                    <div class="tle">{{ $second_slider->title }}</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(!empty($third_sliders))
                        <div class="item">
                            <div class="swiper homeBanner3">
                                <div class="swiper-wrapper">
                                    @foreach($third_sliders as $third_slider)
                                    <div class="swiper-slide">
                                        <a href="{{ $third_slider->link }}" target="_blank">
                                            <div class="imgWrap">
                                                <img src="{{ $third_slider->image_value }}" width="300" height="1000"
                                                    alt="{{ $third_slider->image__alt_text }}">
                                                <div class="bttmWrap">
                                                    <div class="tle">{{ $third_slider->title }}</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(!empty($fourth_sliders))
                        <div class="item">
                            <div class="swiper homeBanner4">
                                <div class="swiper-wrapper">
                                    @foreach($fourth_sliders as $fourth_slider)
                                    <div class="swiper-slide">
                                        <a href="{{ $fourth_slider->link }}" target="_blank">
                                            <div class="imgWrap">
                                                <img src="{{ $fourth_slider->image_value }}" width="300" height="1000"
                                                    alt="{{ $fourth_slider->image__alt_text }}">
                                                <div class="bttmWrap">
                                                    <div class="tle">{{ $fourth_slider->title }}</div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    <section id="About">
        <div class="container">
            <div class="aboutBx wow animate__fadeInUp" data-wow-duration="1.2s">
                <div class="lftSd">
                    <div class="tleWrap">
                        <h6 class="sTle"> About</h6>
                        <h2 class="mTle"><img src="{{ asset('frontend/images/logo.png') }}" alt="logo"> Group</h2>
                    </div>
                </div>
                <div class="rgtSd">
                    <div class="cntWrap">
                        <p>
                            Ever since its inception four decades ago, and reinforcing the ancestorial business arena,
                            B3 grew into a conglomerate with different business entities.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if($businesses->isNotEmpty())
    <section id="Business">
        <div class="container">
            <div class="tleWrap center wow animate__fadeInDown" data-wow-duration="1s">
                <h2 class="mTle">{{ $home->section_two_title }}</h2>
            </div>
            <div class="splide businessSlide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($businesses as $business)
                        <li class="splide__slide wow animate__fadeInUp" data-wow-duration="1s">
                            <div class="busiBx">
                                <div class="imgWrap">
                                    <img src="{{ $business->image_value }}" width="510" height="280"
                                        alt="{{ $business->image_alt_text }}">
                                    <div class="tle">{{ $business->title }}</div>
                                </div>
                                <div class="cntWrap">
                                    <div class="cntWraper">
                                        {!! $business->description !!}
                                    </div>
                                    <div class="logoWrap">
                                        <img src="{{ $business->logo_value }}" width="260px" height="45px"
                                            alt="{{ $business->logo_alt_text }}">
                                    </div>
                                </div>
                                <a href="{{ $business->link }}" target="_blank" class="visitBtn">
                                    <span>VISIT WEBSITE</span>
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13.561" height="13.741"
                                            viewBox="0 0 13.561 13.741">
                                            <g id="arrow" transform="translate(-1618.5 -845.716)">
                                                <path id="Path_166" data-name="Path 166" d="M25,0H37.84"
                                                    transform="translate(1593.5 852.421)" fill="none" stroke="#fff"
                                                    stroke-width="1" />
                                                <path id="Path_165" data-name="Path 165"
                                                    d="M6270.4,849.083l6.773,6.246L6270.4,862.1"
                                                    transform="translate(-4645.837 -3)" fill="none" stroke="#fff"
                                                    stroke-width="1" />
                                            </g>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    @endif
    <section id="OurStory">
        <div class="container">
            <div class="dFlx">
                <div class="lftSd">
                    <div class="imgWrap">
                        <img src="{{ $home->section_three_image_value }}" width="723" height="720"
                            alt="{{ $home->section_three_title }}">
                    </div>
                    <!-- <div class="galGrid">
                        <div class="galRow">
                            <div class="galCol wow animate__fadeInLeft" data-wow-duration="1s">
                                <div class="galItem">
                                    <div class="imgWrap">
                                        <img src="assets/images/story-1.jpg" alt="our story">
                                    </div>
                                </div>
                                <div class="galItem">
                                    <div class="imgWrap">
                                        <img src="assets/images/story-2.jpg" alt="our story">
                                    </div>
                                </div>
                            </div>
                            <div class="galCol wow animate__fadeInRight" data-wow-duration="1.2s">
                                <div class="galItem">
                                    <div class="imgWrap">
                                        <img src="assets/images/story-3.jpg" alt="our story">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="galRow">
                            <div class="galCol wow animate__fadeInLeft" data-wow-duration="1.2s">
                                <div class="galItem">
                                    <div class="imgWrap">
                                        <img src="assets/images/story-4.jpg" alt="our story">
                                    </div>
                                </div>
                            </div>
                            <div class="galCol wow animate__fadeInUp" data-wow-duration="1s">
                                <div class="galItem">
                                    <div class="imgWrap">
                                        <img src="assets/images/story-5.jpg" alt="our story">
                                    </div>
                                </div>
                                <div class="galItem">
                                    <div class="imgWrap">
                                        <img src="assets/images/story-6.jpg" alt="our story">
                                    </div>
                                </div>
                            </div>
                            <div class="galCol wow animate__fadeInRight" data-wow-duration="1.2s">
                                <div class="galItem">
                                    <div class="imgWrap">
                                        <img src="assets/images/story-7.jpg" alt="our story">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="rgtSd wow animate__fadeInUp" data-wow-duration="1.2s">
                    <div class="cntWrap">
                        <div class="tleWrap">
                            <h2 class="mTle">{{ $home->section_three_title }}</h2>
                        </div>
                        {!! $home->section_three_description !!}
                        <div class="btnWrap">
                            <a href="{{ route('about') }}" class="viewBtn">
                                <span>READ MORE</span>
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.883 21.598">
                                        <g id="Group_4" data-name="Group 4"
                                            transform="translate(-1054.246 1277.886) rotate(-90)">
                                            <path id="Path_9" data-name="Path 9"
                                                d="M1277.525,1090.64l-10.437,10.954-10.437-10.954"
                                                transform="translate(0 -26.191)" fill="none" stroke="#000"
                                                stroke-width="1"></path>
                                            <path id="Path_10" data-name="Path 10" d="M1293.877,1053.246V1074.4"
                                                transform="translate(-26.79 1)" fill="none" stroke="#000"
                                                stroke-width="1"></path>
                                        </g>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($blogs->isNotEmpty())
    <section id="Blogs">
        <div class="container">
            <div class="flxTle wow animate__fadeInUp" data-wow-duration="1s">
                <div class="tleWrap">
                    <div class="mTle">{{ $home->section_five_title }}</div>
                </div>
                <div class="rgtSd">
                    <div class="btnWrap">
                        <a href="{{ route('blogs') }}" class="viewBtn">
                            <span>VIEW ALL BLOG</span>
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21.883 21.598">
                                    <g id="Group_4" data-name="Group 4"
                                        transform="translate(-1054.246 1277.886) rotate(-90)">
                                        <path id="Path_9" data-name="Path 9"
                                            d="M1277.525,1090.64l-10.437,10.954-10.437-10.954"
                                            transform="translate(0 -26.191)" fill="none" stroke="#000"
                                            stroke-width="1" />
                                        <path id="Path_10" data-name="Path 10" d="M1293.877,1053.246V1074.4"
                                            transform="translate(-26.79 1)" fill="none" stroke="#000"
                                            stroke-width="1" />
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
                                    <img src="{{ $blog->thumb_image_value }}" width="460" height="280"
                                        alt="{{ $blog->thumb_image_alt_text }}">
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

    <section id="HelpYou">
        <div class="dElmtWrap">
            <div class="dElmt">
                <img src="{{ asset('frontend/images/dElmt-help.png') }}" width="350" height="350" alt="dElmt-help">
            </div>
        </div>
        <div class="container">
            <div class="dFlx">
                <div class="lftSd wow animate__fadeInLeft" data-wow-duration="1s">
                    <div class="tleWrap">
                        <p class="txt">{{ $home->section_four_subtitle }}</p>
                        <h2 class="mTle">{{ $home->section_four_title }}</h2>
                    </div>
                </div>
                <div class="rgtSd wow animate__fadeInRight" data-wow-duration="1.2s">
                    <form method="POST" action="{{ route('enquiry') }}" id="contact-form">
                        @csrf
                        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <div class="form-group">
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="NAME"
                                        value="{{ old('name') }}">
                                    @error('name', 'enquiry')
                                    <div class="help-block danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="EMAIL"
                                        value="{{ old('email') }}">
                                    @error('email', 'enquiry')
                                    <div class="help-block danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <input type="tel" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror" placeholder="PHONE"
                                        value="{{ old('phone') }}">
                                    @error('phone', 'enquiry')
                                    <div class="help-block danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control @error('phone') is-invalid @enderror"
                                        placeholder="MESSAGE" rows="3">{{ old('message') }}</textarea>
                                    @error('message', 'enquiry')
                                    <div class="help-block danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="btnWrap">
                                    <button type="button" class="baseBtn baseBtn2 hoveranim submit-btn">
                                        <span>ENQUIRY</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@push('js')
<!-- SWIPER -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- SPLIDE --->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/css/splide.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/js/splide.min.js"></script>
@if($businesses->isNotEmpty())
<script>
$(document).ready(function() {
    var businessSlide = new Splide('.businessSlide', {
        type: 'loop',
        perPage: 4,
        gap: 5,
        perMove: 1,
        rewind: false,
        arrows: true,
        autoplay: true,
        pagination: false,
        breakpoints: {
            1441: {
                perPage: 3,
                gap: 5,
            },
            576: {
                perPage: 2,
                gap: 3,
            },
            376: {
                perPage: 1,
                gap: 2,
            },
        }
    });
    businessSlide.mount();
});
</script>
@endif
@if($blogs->isNotEmpty())
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
                perMove: 0.8,
            },
            376: {
                perPage: 1.2,
                gap: 15,
                perMove: 0.8,
            },
        }
    });
    blogSlide.mount();
});
</script>
@endif
<script>
$(document).ready(function() {

    var swiper = new Swiper(".homeBanner1", {
        loop: true,
        effect: "cube",
        grabCursor: true,
        autoplay: true,
        cubeEffect: {
            shadow: false,
        },
        autoplay: {
            delay: 2600,
            disableOnInteraction: false
        },
    });
    var swiper = new Swiper(".homeBanner2", {
        loop: true,
        effect: "cube",
        grabCursor: true,
        autoplay: true,
        cubeEffect: {
            shadow: false,
        },
        autoplay: {
            delay: 2700,
            disableOnInteraction: false
        },
    });
    var swiper = new Swiper(".homeBanner3", {
        loop: true,
        effect: "cube",
        grabCursor: true,
        autoplay: "cube",
        cubeEffect: {
            shadow: false,
        },
        autoplay: {
            delay: 2800,
            disableOnInteraction: false
        },
    });
    var swiper = new Swiper(".homeBanner4", {
        loop: true,
        effect: "cube",
        grabCursor: true,
        autoplay: true,
        cubeEffect: {
            shadow: false,
        },
        autoplay: {
            delay: 2900,
            disableOnInteraction: false
        },
    });
});
</script>
<script src="https://www.google.com/recaptcha/api.js?render=6Lfp27YpAAAAAFBo6qRMGMiGHXb3_q2spLeaSjJn"></script>
<script>
$(document).on('click', '.submit-btn', function(e) {
    e.preventDefault();
    buttonDisable($(this))
    var action = 'contact';
    var recaptcha_site_key = '6Lfp27YpAAAAAFBo6qRMGMiGHXb3_q2spLeaSjJn';
    grecaptcha.ready(function() {
        grecaptcha.execute(recaptcha_site_key, {
            action: action
        }).then(function(token) {
            $('#g-recaptcha-response').val(token)
            $('#contact-form').submit()
        }).catch(function(error) {
            console.error('reCAPTCHA verification failed:', error);
            buttonEnable($(this));
        });
    });
});

function buttonDisable($this) {
    var buttonBeforeText = $this.find("span").text().toLowerCase();
    var buttonAfterText = "";

    switch (buttonBeforeText) {
        case "send":
            buttonAfterText = "SENDING...";
            break;
        default:
            buttonAfterText = "SUBMITTING...";
            break;
    }

    $this.html("<span>" + buttonAfterText + "</span>");
    $this.prop("disabled", true);
}

function buttonEnable($this) {
    var buttonAfterText = "ENQUIRY";
    $this.html("<span>" + buttonAfterText + "</span>");
    $this.prop("disabled", false);
}
</script>
@endpush