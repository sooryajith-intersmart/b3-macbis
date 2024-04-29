<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        @hasSection('title')
        @yield('title')
        @else
        @themeSettings('website_name')
        @endif
    </title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <meta name="title" content="@yield('title')">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('frontend/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/images/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('frontend/images/site.webmanifest') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:image" content="@yield('image')" />

    <!-- Twitter -->
    <meta property="twitter:card" content="@yield('card')" />
    <meta property="twitter:url" content="{{ url()->current() }}" />
    <meta property="twitter:title" content="@yield('title')" />
    <meta property="twitter:description" content="@yield('description')" />
    <meta property="twitter:image" content="@yield('image')" />

    <meta name="msapplication-TileColor" content="#000000">
    <meta name="theme-color" content="#ffffff">
    <meta name="mobile-web-app-capable" content="yes">

    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "WebPage",
        "name": "Pioneer",
        "description": "A brief description of your page content."
    }
    </script>

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">

    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>

    </style>

    <!-- <link rel="preload" href="assets/css/critical.min.css" type="text/css" as="style"
        onload="this.onload=null;this.rel='stylesheet';"> -->
    <link rel="preload" href="{{ asset('frontend/css/app.min.css') }}" type="text/css" as="style"
        onload="this.onload=null;this.rel='stylesheet';">
    @stack('css')
</head>

<body class="<?= basename($_SERVER["SCRIPT_FILENAME"], '.php') == '404' ? 'darkHead' : '' ?>">
    <header id="Header">
        <div id="HeaderMain">
            <div class="container">
                <div class="mainFlx">
                    <div class="lSide">
                        <a href="{{ route('home') }}" class="logo">
                            <img src="{{ asset('frontend/images/logo.png') }}" alt="logo" width="135" height="40">
                        </a>
                    </div>
                    <div class="RSide">
                        <div class="modal fade" id="HeaderPOP" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" role="dialog" aria-labelledby="HeaderPOPLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <a href="{{ route('home') }}" class="mobLogo" aria-label="Logo">
                                            <img src="{{ asset('frontend/images/logo.png') }}" alt="Mainlogo">
                                        </a>
                                        <div class="accordion" id="AccordMenu">
                                            <div class="accordion-item">
                                                <div class="accordion-header">
                                                    <a href="{{ route('home') }}"
                                                        class="accordion-button {{ Nav::isRoute('home') }}">
                                                        HOME</a>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <div class="accordion-header">
                                                    <a href="{{ route('about') }}"
                                                        class="accordion-button {{ Nav::isRoute('about') }}">
                                                        OUR STORY
                                                    </a>
                                                </div>
                                            </div>
                                            @if($blog_exists)
                                            <div class="accordion-item">
                                                <div class="accordion-header">
                                                    <a href="{{ route('blogs') }}"
                                                        class="accordion-button {{ Nav::isRoute(['blogs', 'blog.details']) }}">
                                                        BLOG
                                                    </a>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="accordion-item">
                                                <div class="accordion-header">
                                                    <a href="{{ route('contact') }}"
                                                        class="accordion-button {{ Nav::isRoute('contact') }}">
                                                        CONTACT US
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="menuIcon">
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#HeaderPOP">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="viewport">
        @yield('content')
    </div>

    <footer id="Footer">
        <div class="ftMain">
            <div class="container">
                <div class="ftAccordion accordion-flush accordion" id="ftAcco">
                    <div class="Col">
                        <div class="itemWrap">
                            <a href="{{ route('home') }}" class="logoWrap">
                                <img src="{{ asset('frontend/images/logo.png') }}" alt="logo" width="220" height="85">
                            </a>
                        </div>
                    </div>
                    <div class="Col">
                        <div class="itemWrap">
                            <h4 class="ftTle">ADDRESS</h4>
                            <ul class="infoUl">
                                <li>
                                    <div class="itemWrap">
                                        <ul class="ftUl">
                                            <li>
                                                <div class="infoBx">
                                                    <div class="ftTxt"><b>Registered Address:</b> </div>
                                                    <div class="ftTxt">
                                                        {{ $registered_address }}
                                                    </div>
                                                </div>
                                            </li>
                                            @if($registered_address_map_link)
                                            <li>
                                                <div class="infoBx">
                                                    <a href="{{ $registered_address_map_link }}" class="locBtn">
                                                        <span>See Map</span>
                                                        <span class="icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.791"
                                                                height="12.628" viewBox="0 0 12.791 12.628">
                                                                <g id="Group_4" data-name="Group 4"
                                                                    transform="translate(-1054.246 1268.917) rotate(-90)">
                                                                    <path id="Path_9" data-name="Path 9"
                                                                        d="M1268.555,1090.64l-5.952,6.247-5.952-6.247"
                                                                        transform="translate(0 -30.575)" fill="none"
                                                                        stroke="#000" stroke-width="1"></path>
                                                                    <path id="Path_10" data-name="Path 10"
                                                                        d="M1293.877,1053.246v12.065"
                                                                        transform="translate(-31.274 1)" fill="none"
                                                                        stroke="#000" stroke-width="1"></path>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </li>
                                <!-- <li>
                                <div class="itemWrap">
                                    <ul class="ftUl">
                                        <li>
                                            <div class="infoBx">
                                                <div class="ftTxt"><b>Factory Address:</b> </div>
                                                <div class="ftTxt">
                                                    B3 Macbis Ltd, III/372 C, Anjilikkadu Road, Aroor, Alappuzha -
                                                    688534, Kerala
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="infoBx">
                                                <a href="javascript:void(0)" class="locBtn">
                                                    <span>See Map</span>
                                                    <span class="icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12.791"
                                                            height="12.628" viewBox="0 0 12.791 12.628">
                                                            <g id="Group_4" data-name="Group 4"
                                                                transform="translate(-1054.246 1268.917) rotate(-90)">
                                                                <path id="Path_9" data-name="Path 9"
                                                                    d="M1268.555,1090.64l-5.952,6.247-5.952-6.247"
                                                                    transform="translate(0 -30.575)" fill="none"
                                                                    stroke="#000" stroke-width="1"></path>
                                                                <path id="Path_10" data-name="Path 10"
                                                                    d="M1293.877,1053.246v12.065"
                                                                    transform="translate(-31.274 1)" fill="none"
                                                                    stroke="#000" stroke-width="1"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li> -->
                                <li>
                                    <div class="itemWrap">
                                        <ul class="ftUl">
                                            <li>
                                                <div class="infoBx">
                                                    <div class="ftTxt"><b>Head Office Address:</b> </div>
                                                    <div class="ftTxt">
                                                        {{ $head_office_address }}
                                                    </div>
                                                </div>
                                            </li>
                                            @if($head_office_address_map_link)
                                            <li>
                                                <div class="infoBx">
                                                    <a href="{{ $head_office_address_map_link }}" class="locBtn">
                                                        <span>See Map</span>
                                                        <span class="icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="12.791"
                                                                height="12.628" viewBox="0 0 12.791 12.628">
                                                                <g id="Group_4" data-name="Group 4"
                                                                    transform="translate(-1054.246 1268.917) rotate(-90)">
                                                                    <path id="Path_9" data-name="Path 9"
                                                                        d="M1268.555,1090.64l-5.952,6.247-5.952-6.247"
                                                                        transform="translate(0 -30.575)" fill="none"
                                                                        stroke="#000" stroke-width="1"></path>
                                                                    <path id="Path_10" data-name="Path 10"
                                                                        d="M1293.877,1053.246v12.065"
                                                                        transform="translate(-31.274 1)" fill="none"
                                                                        stroke="#000" stroke-width="1"></path>
                                                                </g>
                                                            </svg>
                                                        </span>
                                                    </a>
                                                </div>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="Col">
                        <div class="itemWrap">
                            <h4 class="ftTle">CONTACT US</h4>
                            <ul class="ftUl">
                                <li>
                                    <div class="infoBx">
                                        <a href="tel:{{ $phone }}" class="ftTxt">{{ $phone }}</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="infoBx">
                                        <a href="mailto:{{ $email }}" class="ftTxt">{{ $email }}</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @if($facebook_link || $instagram_link || $twitter_link || $linkedin_link || $pinterest_link ||
                    $youtube_link)
                    <div class="Col">
                        <div class="itemWrap">
                            <h4 class="ftTle">CONNECTED</h4>
                            <ul class="ftSocialUl">
                                @if($facebook_link)
                                <li>
                                    <a href="{{ $facebook_link }}" target="_blank">
                                        <svg id="Group_180" data-name="Group 180" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="19.059"
                                            viewBox="0 0 18 19.059">
                                            <defs>
                                                <clipPath id="clip-path">
                                                    <rect id="Rectangle_93" data-name="Rectangle 93" width="18"
                                                        height="19.059" transform="translate(0 0)" />
                                                </clipPath>
                                            </defs>
                                            <g id="Group_179" data-name="Group 179" transform="translate(0 0)"
                                                clip-path="url(#clip-path)">
                                                <path id="Path_142" data-name="Path 142"
                                                    d="M15.882,0H2.346A2.346,2.346,0,0,0,0,2.346V15.886a2.345,2.345,0,0,0,2.346,2.343H9.737V11.179H7.37V8.42H9.737V6.391a3.314,3.314,0,0,1,3.539-3.635,20.01,20.01,0,0,1,2.122.107v2.46H13.949c-1.143,0-1.364.545-1.364,1.339V8.42H15.32l-.356,2.759H12.586v7.049h3.3a2.346,2.346,0,0,0,2.346-2.346V2.346A2.346,2.346,0,0,0,15.882,0"
                                                    transform="translate(-0.039 0.338)" />
                                            </g>
                                        </svg>
                                        <div class="txt">FACEBOOK</div>
                                    </a>
                                </li>
                                @endif
                                @if($instagram_link)
                                <li>
                                    <a href="{{ $instagram_link }}" target="_blank">
                                        <svg id="instagram" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20">
                                            <path id="Path_1" data-name="Path 1"
                                                d="M10,1.8c2.67,0,2.987.01,4.041.058a4.412,4.412,0,0,1,3.007,1.093A4.383,4.383,0,0,1,18.14,5.959C18.188,7.013,18.2,7.33,18.2,10s-.01,2.987-.058,4.041a4.433,4.433,0,0,1-1.093,3.007,4.381,4.381,0,0,1-3.007,1.093c-1.054.048-1.371.058-4.041.058s-2.987-.01-4.041-.058a4.465,4.465,0,0,1-3.007-1.093A4.407,4.407,0,0,1,1.86,14.041C1.812,12.987,1.8,12.67,1.8,10s.01-2.987.058-4.041A4.448,4.448,0,0,1,2.952,2.952,4.392,4.392,0,0,1,5.959,1.86C7.013,1.812,7.33,1.8,10,1.8M10,0C7.284,0,6.943.012,5.877.06a6.18,6.18,0,0,0-4.2,1.618A6.17,6.17,0,0,0,.06,5.877C.012,6.943,0,7.284,0,10s.012,3.057.06,4.123a6.187,6.187,0,0,0,1.618,4.2,6.175,6.175,0,0,0,4.2,1.618C6.943,19.988,7.284,20,10,20s3.057-.012,4.123-.06a6.184,6.184,0,0,0,4.2-1.618,6.167,6.167,0,0,0,1.618-4.2c.048-1.067.06-1.408.06-4.123s-.012-3.057-.06-4.123a6.183,6.183,0,0,0-1.618-4.2A6.181,6.181,0,0,0,14.123.06C13.057.012,12.716,0,10,0Z"
                                                transform="translate(0 0)" />
                                            <path id="Path_2" data-name="Path 2"
                                                d="M10.408,5.838a4.57,4.57,0,1,0,4.57,4.57A4.57,4.57,0,0,0,10.408,5.838Zm0,7.536a2.966,2.966,0,1,1,2.966-2.966A2.967,2.967,0,0,1,10.408,13.374Z"
                                                transform="translate(-0.408 -0.408)" />
                                            <circle id="Ellipse_1" data-name="Ellipse 1" cx="1.44" cy="1.44" r="1.44"
                                                transform="translate(13.753 3.367)" />
                                        </svg>
                                        <div class="txt">INSTAGRAM</div>
                                    </a>
                                </li>
                                @endif
                                @if($twitter_link)
                                <li>
                                    <a href="{{ $twitter_link }}" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 18 18">
                                            <g id="twitter" transform="translate(0)">
                                                <path id="Path_7262" data-name="Path 7262"
                                                    d="M300.984,246.541l4.051,5.794h-1.662l-3.305-4.728h0l-.485-.694-3.861-5.523h1.662l3.116,4.457Z"
                                                    transform="translate(-291.382 -237.849)" />
                                                <path id="Path_7263" data-name="Path 7263"
                                                    d="M16.055,0H1.945A1.945,1.945,0,0,0,0,1.945v14.11A1.945,1.945,0,0,0,1.945,18h14.11A1.945,1.945,0,0,0,18,16.055V1.945A1.945,1.945,0,0,0,16.055,0ZM11.481,15.264,8.136,10.4,3.948,15.264H2.866L7.656,9.7,2.866,2.726H6.519l3.167,4.61,3.966-4.61h1.082L10.167,8.035h0l4.967,7.229Z" />
                                            </g>
                                        </svg>
                                        <div class="txt">TWITTER</div>
                                    </a>
                                </li>
                                @endif
                                @if($linkedin_link)
                                <li>
                                    <a href="{{ $linkedin_link }}" target="_blank">
                                        <svg id="linkedin-logo" xmlns="http://www.w3.org/2000/svg" width="17.292"
                                            height="17.292" viewBox="0 0 17.292 17.292">
                                            <g id="post-linkedin">
                                                <path id="Path_7264" data-name="Path 7264"
                                                    d="M15.562,0H1.729A1.734,1.734,0,0,0,0,1.729V15.562a1.734,1.734,0,0,0,1.729,1.729H15.562a1.734,1.734,0,0,0,1.729-1.729V1.729A1.734,1.734,0,0,0,15.562,0ZM5.187,14.7H2.594V6.917H5.187Zm-1.3-9.251A1.556,1.556,0,1,1,5.447,3.891,1.55,1.55,0,0,1,3.891,5.447ZM14.7,14.7H12.1V10.116a1.3,1.3,0,0,0-2.594,0V14.7H6.917V6.917H9.51V7.954a2.793,2.793,0,0,1,2.161-1.21A3.063,3.063,0,0,1,14.7,9.77Z" />
                                            </g>
                                        </svg>
                                        <div class="txt">LINKEDIN</div>
                                    </a>
                                </li>
                                @endif
                                @if($pinterest_link)
                                <li>
                                    <a href="{{ $pinterest_link }}" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1"
                                            x="0px" y="0px" viewBox="0 0 455 455"
                                            style="enable-background:new 0 0 455 455;" xml:space="preserve">
                                            <path style="fill-rule:evenodd;clip-rule:evenodd;"
                                                d="M0,0v455h455V0H0z M251.83,297.635c-19.57,0-37.973-10.516-44.227-22.557  c0,0-10.516,41.691-12.71,49.78c-7.84,28.437-30.926,56.874-32.684,59.176c-1.229,1.649-4.013,1.105-4.324-1.026  c-0.482-3.656-6.379-39.497,0.545-68.728c3.469-14.701,23.272-98.627,23.272-98.627s-5.771-11.543-5.771-28.624  c0-26.85,15.556-46.856,34.939-46.856c16.474,0,24.377,12.337,24.377,27.177c0,16.521-10.516,41.318-15.977,64.216  c-4.511,19.212,9.598,34.831,28.546,34.831c34.332,0,57.371-43.993,57.371-96.138c0-39.684-26.678-69.397-75.292-69.397  c-54.867,0-89.075,40.96-89.075,86.649c0,15.805,4.667,26.928,11.963,35.499c3.345,4.014,3.765,5.585,2.613,10.143  c-0.917,3.344-2.862,11.309-3.765,14.529c-1.151,4.559-4.931,6.191-9.053,4.496c-25.217-10.329-37.009-37.989-37.009-69.164  C105.569,131.619,148.832,70,234.874,70c69.101,0,114.557,50.013,114.557,103.667C349.431,244.635,309.995,297.635,251.83,297.635z" />

                                        </svg>
                                        <div class="txt">PINTEREST</div>
                                    </a>
                                </li>
                                @endif
                                @if($youtube_link)
                                <li>
                                    <a href="{{ $youtube_link }}" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="682pt"
                                            viewBox="-21 -117 682.66672 682" width="682pt">
                                            <path
                                                d="m626.8125 64.035156c-7.375-27.417968-28.992188-49.03125-56.40625-56.414062-50.082031-13.703125-250.414062-13.703125-250.414062-13.703125s-200.324219 0-250.40625 13.183593c-26.886719 7.375-49.03125 29.519532-56.40625 56.933594-13.179688 50.078125-13.179688 153.933594-13.179688 153.933594s0 104.378906 13.179688 153.933594c7.382812 27.414062 28.992187 49.027344 56.410156 56.410156 50.605468 13.707031 250.410156 13.707031 250.410156 13.707031s200.324219 0 250.40625-13.183593c27.417969-7.378907 49.03125-28.992188 56.414062-56.40625 13.175782-50.082032 13.175782-153.933594 13.175782-153.933594s.527344-104.382813-13.183594-154.460938zm-370.601562 249.878906v-191.890624l166.585937 95.945312zm0 0" />
                                        </svg>
                                        <div class="txt">YOUTUBE</div>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="ftBttm">
            <div class="container">
                <div class="dFlx">
                    <div class="lftSd">
                        <p class="ftTxt">© <?= date('Y') ?> B3. ALL RIGHTS RESERVED.</p>
                    </div>
                    @if($policies->isNotEmpty())
                    <div class="social">
                        <div class="middleBx">
                            <div class="cmnLinks">
                                <ul>
                                    @foreach($policies as $policy)
                                    <li>
                                        <a href="{{ route('policy', $policy->slug) }}">{{  $policy->title }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="rgtSd">
                        <p class="ftTxt">DESIGNED BY: <a href="https://www.intersmartsolution.com/" target="_blank">
                                <span>INTER SMART</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- <ul id="fixedRgt">
    <li>
        <a class="Call" href="tel:+971-551400227">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
                <g id="Group_310" data-name="Group 310" transform="translate(-3)">
                    <g id="Group_311" data-name="Group 311" transform="translate(3)">
                        <path id="Path_847" data-name="Path 847" d="M20,0A20,20,0,1,1,0,20,20,20,0,0,1,20,0Z" fill="#1db2eb" />
                        <g id="phone-call" transform="translate(31.674 19.964) rotate(135)">
                            <g id="Group_11" data-name="Group 11">
                                <path id="Path_23" data-name="Path 23" d="M16.126,12.179,13.81,9.863a1.54,1.54,0,0,0-2.564.579,1.576,1.576,0,0,1-1.82.993,7.141,7.141,0,0,1-4.3-4.3,1.5,1.5,0,0,1,.993-1.82A1.54,1.54,0,0,0,6.7,2.75L4.381.434a1.652,1.652,0,0,0-2.233,0L.576,2.006C-1,3.66.742,8.044,4.629,11.931s8.271,5.707,9.925,4.053l1.571-1.571A1.652,1.652,0,0,0,16.126,12.179Z" fill="#fff" />
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
        </a>
    </li>
    <li>
        <a class="Whatsapp" href="www.whatsapp.com">
            <svg xmlns="http://www.w3.org/2000/svg" width="35.764" height="35.759" viewBox="0 0 35.764 35.759">
                <g id="Group_309" data-name="Group 309" transform="translate(-8)">
                    <g id="Group_216" data-name="Group 216" transform="translate(8)">
                        <ellipse id="Ellipse_25" data-name="Ellipse 25" cx="13.481" cy="12.941" rx="13.481" ry="12.941" transform="translate(4.314 4.938)" fill="#fff" />
                        <g id="Layer_2" data-name="Layer 2">
                            <g id="Color">
                                <g id="_08.Whatsapp" data-name="08.Whatsapp">
                                    <path id="Icon" d="M53.888,36A17.879,17.879,0,0,0,39.41,64.361L38.492,70.1,44.054,68.8A17.879,17.879,0,1,0,53.888,36Zm9.5,25.286-1.9,1.9c-2,2-7.313-.2-12.019-4.917s-6.817-10.012-4.912-11.993l1.9-1.9a2,2,0,0,1,2.7,0l2.807,2.8a1.864,1.864,0,0,1-.7,3.1,1.819,1.819,0,0,0-1.2,2.208,8.648,8.648,0,0,0,5.212,5.207,1.909,1.909,0,0,0,2.186-1.216,1.868,1.868,0,0,1,3.129-.7l2.8,2.807a2,2,0,0,1,0,2.7Z" transform="translate(-36.015 -36)" fill="#519f34" />
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
        </a>
    </li>
    <li>
        <a class="Mail" href="mailto:info@pioneerprojectsme.com">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
                <g id="Group_312" data-name="Group 312" transform="translate(-4)">
                    <g id="Group_311" data-name="Group 311" transform="translate(4)">
                        <path id="Path_149" data-name="Path 149" d="M20,0A20,20,0,1,1,0,20,20,20,0,0,1,20,0Z" fill="#4256a0" />
                        <g id="email" transform="translate(10.059 12.555)">
                            <path id="Path_24" data-name="Path 24" d="M11.6,176.927a2.99,2.99,0,0,1-3.323,0L.132,171.5Q.065,171.451,0,171.4v8.9a1.83,1.83,0,0,0,1.83,1.83H18.052a1.83,1.83,0,0,0,1.83-1.83v-8.9c-.043.032-.087.064-.133.094Z" transform="translate(0 -167.242)" fill="#fff" />
                            <path id="Path_25" data-name="Path 25" d="M.779,67.551l8.147,5.432a1.826,1.826,0,0,0,2.031,0L19.1,67.551a1.744,1.744,0,0,0,.779-1.455,1.832,1.832,0,0,0-1.83-1.83H1.83A1.832,1.832,0,0,0,0,66.1a1.744,1.744,0,0,0,.779,1.454Z" transform="translate(0 -64.266)" fill="#fff" />
                        </g>
                    </g>
                </g>
            </svg>
        </a>
    </li>
</ul> -->

    <!-- MODAL -->
    <!-- <div class="modal fade cModal" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="11.521" height="11.794" viewBox="0 0 11.521 11.794">
                        <g id="close" transform="translate(-178.039 -176.195)">
                            <path id="Path_103420" data-name="Path 103420" d="M188.313,187.772l-4.519-4.6-4.518,4.6a.722.722,0,0,1-1.035-1.008l4.508-4.672-4.5-4.618a.72.72,0,0,1,1.029-1.008l4.519,4.6,4.52-4.649a.726.726,0,1,1,1.04,1.012l-4.534,4.664,4.533,4.663a.728.728,0,0,1-1.04,1.018Z" />
                        </g>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="formTle">
                    <div class="mTle" id="pOutlineModalLabel">Enquiry</div>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ex eorum enim scriptis </p>
                </div>
                <form action="">
                    <div class="action-alert success d-none">Succes Message</div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" placeholder="Full Name" name="name" autofocus>
                                <div class="help-block danger d-none">Invalid Input</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="Address" placeholder="Email Address" name="Address" autofocus>
                                <div class="help-block danger d-none">Invalid Input</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="Phone" placeholder="Phone Number" name="Phone" autofocus>
                                <div class="help-block danger d-none">Invalid Input</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <a href="javascript:void(0)" class="baseBtn baseBtn4 hoveranim">
                                <span>Submit</span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->

    <!-- Google Tag Manager -->
    <script async="true">
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-T7C88L3');
    </script>
    <!-- End Google Tag Manager -->

    <!-- CUSTOM --->
    <script type="text/javascript" src="{{ asset('frontend/js/app.min.js') }}" defer></script>

    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T7C88L3" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- BOOTSTRAP --->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- WOW -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
    // WOW
    if ($(".wow").length) {
        var wow = new WOW({
            boxClass: "wow",
            animateClass: "animate__animated",
            mobile: true,
            live: true,
        });
        wow.init();
    }
    </script>
    <!-- Toastr messages -->
    @include('frontend::layouts.toastr-messages')
    @stack('js')
</body>

</html>