<!doctype html>
<html>
<head>
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="stylesheet" href="css/app.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>IT Ambassador | 2017</title>
</head>
<body>
    <div id="app">

    </div>
</body>
<script src="{{asset('js/app.js')}}"></script>
<style>
    @import url("https://fonts.googleapis.com/css?family=Roboto:300,700");
    @font-face {
        font-family: code;
        font-weight: 400;
        src: url("font/code_b.otf"), url("font/code_l.otf");
    }
    @font-face {
        font-family: code;
        font-weight: 700;
        src: url("font/code_b.otf"), url("font/code_l.otf");
    }

    @font-face {
        font-family: cloud;
        font-weight: 400;
        src: url("font/Cloud-Light.otf");
    }
    @font-face {
        font-family: cloud;
        font-weight: bold;
        src: url("font/Cloud-Bold.otf");
    }
</style>
</html>