<!doctype html>
<html>
<head>
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="stylesheet" href="css/app.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>IT3KINGS 15th</title>
</head>
<body>
    <div id="app">

    </div>
</body>
<script src="{{ mix('js/app.js') }}"></script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-105655320-1', 'auto');
    ga('send', 'pageview');
</script>
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