<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: https://ogp.me/ns#">

<head>
    <!-- HTML Meta Tags -->
    <title>Ervira & Lutfi - The Wedding</title>
    <meta name="description" content="Wedding Invitation of Ervira & Lutfi">
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="title" content="Ervira & Lutfi - The Wedding">
    <meta name="keywords" content="lutfi fitroh hadi, ervira wulandari, wedding, wedding invitation">
    <meta name="author" content="Lutfi Fitroh Hadi">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=5">
    <meta name="format-detection" content="telephone=no">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://lutfiandvira.wedding/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Ervira & Lutfi - The Wedding">
    <meta property="og:description" content="Wedding Invitation of Ervira & Lutfi">
    <meta property="og:image" content="https://lutfiandvira.wedding/images/logo.png">
    <meta property="og:image:secure_url" content="https://lutfiandvira.wedding/images/logo.png">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="">
    <meta property="twitter:url" content="https://lutfiandvira.wedding/">
    <meta name="twitter:title" content="Ervira & Lutfi - The Wedding">
    <meta name="twitter:description" content="Wedding Invitation of Ervira & Lutfi">
    <meta name="twitter:image" content="https://lutfiandvira.wedding/images/logo.png">

    <!-- Meta Tags Generated via https://www.opengraph.xyz -->

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.14.1/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    @env('local')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/invitation-dark.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/logo.ico') }}" />
    @endenv
    @env('production')
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/invitation-dark.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ secure_asset('/images/logo.ico') }}" />
    @endenv

    <!-- CSS -->
    <style>

    </style>
</head>

<body>
    <div id="root">
        <div>

            <div id="audio">
                @include('components.audio')
            </div>

            <div id="cover">
                @include('components.cover')
            </div>

            <div id="mempelai">
                @include('components.mempelai')
            </div>

            <div id="acara" style="background: rgba(0,0,0,.05);">
                @include('components.acara')
            </div>

            <div id="gallery">
                @include('components.gallery')
            </div>

            <div id="gifts" style="background: rgba(0,0,0,.05);">
                @include('components.gifts')
            </div>

            <div id="comments">
                @include('components.comments')
            </div>

            <div id="footer" style="background: rgba(0,0,0,.05);">
                <p class="tw-text-xs tw-text-extralight tw-text-center tw-italic text-thelast">
                    Made with love by Lutfi
                </p>
            </div>

            <hr class="divider-thelast">
        </div>
        <a href=""></a>
        <div id="my_id" uk-modal="" bg-close="false" class="uk-modal uk-flex uk-open" tabindex="0" esc-close="false">
            <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-text-center" id="modal-envelope">

                <div class="tw-mt-20 md:tw-mt-28 tw-ml-14 tw-text-center" style="transform: rotate(-8deg);">
                    <p class="tw-text-base uk-margin-remove-bottom txt-simple">UNTUK: </p>
                    <h2 class="tw-text-black tw-mt-2" style="line-height:1; font-size:28px;">{{ $guest->guest_name }}</h2>
                </div>

                <div class="tw-mt-32 md:tw-mt-40">
                    <button id="play-sound" class="uk-modal-close tw-bg-white tw-text-gray-600 tw-text-xs tw-tracking-widest tw-py-2 tw-px-4 tw-rounded-lg md:tw-w-60" type="button">BUKA UNDANGAN</button>
                </div>

            </div>
        </div>
    </div>
</body>

<!-- JavaScript -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.14.1/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.14.1/dist/js/uikit-icons.min.js"></script>
@env('local')
<script src="{{ asset('js/app.js') }}"></script>
@endenv
@env('production')
<script src="{{ secure_asset('js/app.js') }}"></script>
@endenv

</html>