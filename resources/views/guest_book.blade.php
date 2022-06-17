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
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('css/invitation-dark.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/logo.ico') }}" />
    @endenv
    @env('production')
    <link rel="stylesheet" href="{{ secure_asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/invitation-dark.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ secure_asset('/images/logo.ico') }}" />
    @endenv

    <!-- CSS -->
    <style>

    </style>
</head>

<body>
    <div id="root" class="uk-container">
        <div class="uk-card uk-card-default uk-margin-top uk-card-body uk-align-center">
            <div id="qr-reader"></div>
        </div>
    </div>

    <div id="modal-guest-book" class="uk-flex-top" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
            <form class="uk-form-horizontal uk-margin-large">
                <legend class="uk-legend">Guest Book</legend>
                <input class="uk-input" id="guest-book-invitation-code" type="hidden" disabled>
                <div class="uk-margin">
                    <label class="uk-form-label" for="guest-book-name">Guest Name</label>
                    <div class="uk-form-controls">
                        <input class="uk-input guestbook-form" id="guest-book-name" type="text" disabled>
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="guest-book-number-of-attendance">Number of Attendance</label>
                    <div class="uk-form-controls">
                        <select class="uk-select guestbook-form" id="guest-book-number-of-attendance">
                        </select>
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="guest-book-address">Address</label>
                    <div class="uk-form-controls">
                        <input class="uk-input guestbook-form" id="guest-book-address" type="text">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

<!-- JavaScript -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.14.1/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.14.1/dist/js/uikit-icons.min.js"></script>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script src="{{ mix('js/guest_book.js') }}"></script>

</html>