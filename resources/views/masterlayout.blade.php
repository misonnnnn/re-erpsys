<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body class="primary-background-2">
    <div id="app">
        <app></app>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('script')
    @yield('style')
</body>
</html>

<style>
    body{
        font-family: "nunito", sans-serif;
        font-size: 12px;
    }
    a {
        color:#777 !important;
        text-decoration: none;

    }
    .primary-background-1 {
        background:#1a1a1a;
    }
    .primary-color-1 {
        color:#1a1a1a;
    }
    .primary-background-2 {
        background:#fcfcfc !important;
    }
    .primary-color-2 {
        color:#fcfcfc !important;
    }
    .primary-background-3 {
        background:#dc3454;
    }
    .primary-color-3 {
        color:#dc3454;
    }
</style>
