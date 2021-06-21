<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">

        <!-- HTML Meta Tags -->
        <link rel="home" href="">
        <title></title>
        <meta name="description" content="">
        <link rel="canonical" href="{{ $page->getUrl }}" />

        <!-- Google / Search Engine Tags -->
        <meta itemprop="name" content="{{ $page->site_title }}">
        <meta itemprop="description" content="">
        <meta itemprop="image" content="{{ $page->site_image }}">

        <!-- Facebook Meta Tags -->
        <meta property="og:url" content="{{ $page->getUrl }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $page->site_title }}">
        <meta property="og:description" content="">
        <meta property="og:image" content="{{ $page->site_image }}">

        <!-- Twitter Meta Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $page->site_title }}">
        <meta name="twitter:description" content="">
        <meta name="twitter:image" content="{{ $page->site_image }}">
        <meta name="twitter:url" content="{{ $page->getUrl }}">

        <!-- Structured Data -->
        @include('_partials/jsonld')

        <!-- Global site tag (gtag.js) - Google Analytics -->
        @include('_partials/ga')

    </head>
    <body>
        <div id="app">
            @yield('body')
        </div>
        <script src="{{ mix('js/main.js', 'assets/build') }}"></script>
    </body>
</html>
