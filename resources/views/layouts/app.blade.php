<!doctype html>
<html lang="{{str_replace('-','_',app()->getLocale())}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no,viewport-fit=cover">
    <title>遇事不决，量子力学。</title>
    <link rel="stylesheet" href="{{asset('/libs/fomantic-ui/2.8.7/semantic.css')}}">
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
    @stack('styles')
    <link rel="shortcut icon" href="{{asset('/logo.png')}}" type="image/png" />
    <link rel="icon" href="{{ asset('/logo.png') }}" type="image/png" />
    <link rel="apple-touch-icon" href="{{ asset('/apple-touch-icon.png') }}">
</head>
<body>
    <header>
        @include('includes.navbar')
    </header>
    <main class="ui container">
        @yield("content")
    </main>
    <footer>
        @include('includes.footer')
    </footer>
<script src="{{asset('/libs/jquery/3.5.1/jquery.js')}}"></script>
<script src="{{asset('/libs/fomantic-ui/2.8.7/semantic.js')}}"></script>
<script src="{{mix('/js/app.js')}}"></script>
    @stack('scripts')
</body>
</html>
