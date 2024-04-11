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
<div id="pageWrapper" class="contactPage">

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
                        <a class="current" href="{{ route('contact') }}">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section id="Contact">
        <div class="container">
            <div class="dFlx">
                <div class="w50">
                    <div class="tleWrap">
                        <h2 class="mTle">Contact Us</h2>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Sin autem ad animum, falsum est, quod.</p> -->
                    </div>
                    <form method="POST" action="{{ route('enquiry') }}" id="contact-form">
                        @csrf
                        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                        <!-- <div class="action-alert success d-none">Succes Message</div> -->
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="NAME" value="{{ old('name') }}">
                                    @error('name', 'enquiry')
                                    <div class="help-block danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="EMAIL" value="{{ old('email') }}">
                                    @error('email', 'enquiry')
                                    <div class="help-block danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="PHONE" value="{{ old('phone') }}">
                                    @error('phone', 'enquiry')
                                    <div class="help-block danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control @error('phone') is-invalid @enderror" placeholder="MESSAGE" rows="3">{{ old('message') }}</textarea>
                                    @error('message', 'enquiry')
                                    <div class="help-block danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="btnWrap">
                                    <a href="javascript:void(0);" class="baseBtn baseBtn2 hoveranim submit-btn">
                                        <span>SEND</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="w50">
                    <div class="infoWrap">
                        <div class="tleWrap">
                            <h2 class="mTle">Address</h2>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Sin autem ad animum, falsum est, quod.</p> -->
                        </div>
                        <div class="addrsBx">
                            <div class="tl">
                                Registered Address:
                            </div>
                            <p>
                                {{ $registered_address }}
                            </p>
                        </div>
                        <!-- <div class="addrsBx">
                            <div class="tl">
                                Factory Address:
                            </div>
                            <p>
                                B3 Macbis Ltd, III/372 C, Anjilikkadu Road,
                                Aroor, Alappuzha - 688534, Kerala
                            </p>
                        </div> -->
                        <div class="addrsBx">
                            <div class="tl">
                                Head Office Address:
                            </div>
                            <p>
                                {{ $head_office_address }}
                            </p>
                        </div>
                        <ul class="infoUl">
                            <li>
                                <div class="infoBx">
                                    <div class="tle">CONTACT</div>
                                    <a href="tel:{{ $phone }}" class="lgTxt">{{ $phone }}</a>
                                </div>
                            </li>
                            <li>
                                <div class="infoBx">
                                    <div class="tle">EMAIL</div>
                                    <a href="mailto:{{ $email }}" class="txt">{{ $email }}</a>
                                </div>
                            </li>
                            @if($facebook_link || $instagram_link || $twitter_link || $linkedin_link || $pinterest_link ||
                            $youtube_link)
                            <li>
                                <div class="infoBx">
                                    <div class="tle">CONNECTED</div>
                                    <ul class="ftSocialUl">
                                        @if($facebook_link)
                                        <li>
                                            <a href="{{ $facebook_link }}" target="_blank">
                                                <svg id="Group_180" data-name="Group 180" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="19.059" viewBox="0 0 18 19.059">
                                                    <defs>
                                                        <clipPath id="clip-path">
                                                            <rect id="Rectangle_93" data-name="Rectangle 93" width="18" height="19.059" transform="translate(0 0)" />
                                                        </clipPath>
                                                    </defs>
                                                    <g id="Group_179" data-name="Group 179" transform="translate(0 0)" clip-path="url(#clip-path)">
                                                        <path id="Path_142" data-name="Path 142" d="M15.882,0H2.346A2.346,2.346,0,0,0,0,2.346V15.886a2.345,2.345,0,0,0,2.346,2.343H9.737V11.179H7.37V8.42H9.737V6.391a3.314,3.314,0,0,1,3.539-3.635,20.01,20.01,0,0,1,2.122.107v2.46H13.949c-1.143,0-1.364.545-1.364,1.339V8.42H15.32l-.356,2.759H12.586v7.049h3.3a2.346,2.346,0,0,0,2.346-2.346V2.346A2.346,2.346,0,0,0,15.882,0" transform="translate(-0.039 0.338)" />
                                                    </g>
                                                </svg>
                                                <div class="smTxt">FACEBOOK</div>
                                            </a>
                                        </li>
                                        @endif
                                        @if($instagram_link)
                                        <li>
                                            <a href="{{ $instagram_link }}" target="_blank">
                                                <svg id="instagram" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                    <path id="Path_1" data-name="Path 1" d="M10,1.8c2.67,0,2.987.01,4.041.058a4.412,4.412,0,0,1,3.007,1.093A4.383,4.383,0,0,1,18.14,5.959C18.188,7.013,18.2,7.33,18.2,10s-.01,2.987-.058,4.041a4.433,4.433,0,0,1-1.093,3.007,4.381,4.381,0,0,1-3.007,1.093c-1.054.048-1.371.058-4.041.058s-2.987-.01-4.041-.058a4.465,4.465,0,0,1-3.007-1.093A4.407,4.407,0,0,1,1.86,14.041C1.812,12.987,1.8,12.67,1.8,10s.01-2.987.058-4.041A4.448,4.448,0,0,1,2.952,2.952,4.392,4.392,0,0,1,5.959,1.86C7.013,1.812,7.33,1.8,10,1.8M10,0C7.284,0,6.943.012,5.877.06a6.18,6.18,0,0,0-4.2,1.618A6.17,6.17,0,0,0,.06,5.877C.012,6.943,0,7.284,0,10s.012,3.057.06,4.123a6.187,6.187,0,0,0,1.618,4.2,6.175,6.175,0,0,0,4.2,1.618C6.943,19.988,7.284,20,10,20s3.057-.012,4.123-.06a6.184,6.184,0,0,0,4.2-1.618,6.167,6.167,0,0,0,1.618-4.2c.048-1.067.06-1.408.06-4.123s-.012-3.057-.06-4.123a6.183,6.183,0,0,0-1.618-4.2A6.181,6.181,0,0,0,14.123.06C13.057.012,12.716,0,10,0Z" transform="translate(0 0)" />
                                                    <path id="Path_2" data-name="Path 2" d="M10.408,5.838a4.57,4.57,0,1,0,4.57,4.57A4.57,4.57,0,0,0,10.408,5.838Zm0,7.536a2.966,2.966,0,1,1,2.966-2.966A2.967,2.967,0,0,1,10.408,13.374Z" transform="translate(-0.408 -0.408)" />
                                                    <circle id="Ellipse_1" data-name="Ellipse 1" cx="1.44" cy="1.44" r="1.44" transform="translate(13.753 3.367)" />
                                                </svg>
                                                <div class="smTxt">INSTAGRAM</div>
                                            </a>
                                        </li>
                                        @endif
                                        @if($twitter_link)
                                        <li>
                                            <a href="{{ $twitter_link }}" target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                                    <g id="twitter" transform="translate(0)">
                                                        <path id="Path_7262" data-name="Path 7262" d="M300.984,246.541l4.051,5.794h-1.662l-3.305-4.728h0l-.485-.694-3.861-5.523h1.662l3.116,4.457Z" transform="translate(-291.382 -237.849)" />
                                                        <path id="Path_7263" data-name="Path 7263" d="M16.055,0H1.945A1.945,1.945,0,0,0,0,1.945v14.11A1.945,1.945,0,0,0,1.945,18h14.11A1.945,1.945,0,0,0,18,16.055V1.945A1.945,1.945,0,0,0,16.055,0ZM11.481,15.264,8.136,10.4,3.948,15.264H2.866L7.656,9.7,2.866,2.726H6.519l3.167,4.61,3.966-4.61h1.082L10.167,8.035h0l4.967,7.229Z" />
                                                    </g>
                                                </svg>
                                                <div class="smTxt">TWITTER</div>
                                            </a>
                                        </li>
                                        @endif
                                        @if($linkedin_link)
                                        <li>
                                            <a href="{{ $linkedin_link }}" target="_blank">
                                                <svg id="linkedin-logo" xmlns="http://www.w3.org/2000/svg" width="17.292" height="17.292" viewBox="0 0 17.292 17.292">
                                                    <g id="post-linkedin">
                                                        <path id="Path_7264" data-name="Path 7264" d="M15.562,0H1.729A1.734,1.734,0,0,0,0,1.729V15.562a1.734,1.734,0,0,0,1.729,1.729H15.562a1.734,1.734,0,0,0,1.729-1.729V1.729A1.734,1.734,0,0,0,15.562,0ZM5.187,14.7H2.594V6.917H5.187Zm-1.3-9.251A1.556,1.556,0,1,1,5.447,3.891,1.55,1.55,0,0,1,3.891,5.447ZM14.7,14.7H12.1V10.116a1.3,1.3,0,0,0-2.594,0V14.7H6.917V6.917H9.51V7.954a2.793,2.793,0,0,1,2.161-1.21A3.063,3.063,0,0,1,14.7,9.77Z" />
                                                    </g>
                                                </svg>
                                                <div class="smTxt">LINKEDIN</div>
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            @if($map_link)
            <div class="fullSd">
                <div class="mapWrap">
                    <iframe src="{{ $map_link }}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            @endif
        </div>
    </section>
</div>
@endsection
@push('js')
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
        var buttonAfterText = "SEND";
        $this.html("<span>" + buttonAfterText + "</span>");
        $this.prop("disabled", false);
    }
</script>
@endpush