<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link rel="icon" href="<%= BASE_URL %>favicon.ico"> -->

    <title>NETIC 360</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.png') }}">
</head>

<body>
    <noscript>
        <strong>Please enable JavaScript to continue.</strong>
    </noscript>
    <div id="app">
    </div>

    <script src="{{ asset(mix('js/app.js')) }}"></script>

</body>

</html>
