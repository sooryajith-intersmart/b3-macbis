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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>

    </style>

    <!-- <link rel="preload" href="assets/css/critical.min.css" type="text/css" as="style"
        onload="this.onload=null;this.rel='stylesheet';"> -->
    <link rel="preload" href="{{ asset('frontend/css/app.min.css') }}" type="text/css" as="style" onload="this.onload=null;this.rel='stylesheet';">
</head>

<body>


    <section id="coming">
        <div class="container">
            <div class="row">
                <div class="page_cntnt">
                    <div class="imgB">
                        <img src="{{ asset('frontend/images/Background4.JPG') }}" width="600px" height="600px" alt="business logo">
                    </div>
                    <div class="imgB1">
                        <img src="{{ asset('frontend/images/v-logo-01.png') }}" width="260px" height="45px" alt="business logo">
                    </div>
                    <h4 class="head_three">We're building a virtual culinary haven. <br>Website renovations underway!</h4>
                    <ul>
                        <li>
                            For more queries mailto <a href="mailto:Info@b3group.co.in">Info@b3group.co.in</a>
                        </li>
                    </ul>
                    <a href="{{ route('home') }}" class="btn hoveranim">
                        <span>Back to Homepage</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

</body>

</html>