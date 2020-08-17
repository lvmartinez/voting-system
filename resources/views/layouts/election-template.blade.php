<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>InfyOm Generator</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Election Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>

    <!-- //for-mobile-apps -->
    <link href="{{ asset('election-template/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{ asset('election-template/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('election-template/css/flexslider.css') }}" type="text/css" media="screen" />
    <!---strat-slider---->
    <script type="text/javascript" src="{{ asset('election-template/js/jquery-1.11.1.min.js') }}"></script>
    <!---//-slider---->

    @yield('css')
</head>

<body>

@yield('content')
<div class="footer-top"></div>
<div class="footer">
    <div class="container">
        <div class="footer-copy">
            <p>© 2020 Election. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts.</a></p>
        </div>
    </div>

</div>

<!-- for bootstrap working -->
<script type="text/javascript" src="{{ asset('election-template/js/bootstrap-3.1.1.min.js') }}"></script>
<!-- //for bootstrap working -->
<!-- jQuery 3.1.1 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>

<!-- scroll_top_btn -->
<script type="text/javascript" src="{{ asset('election-template/js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('election-template/js/easing.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {

        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
        };


        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
<!--end scroll_top_btn -->
@stack('scripts')
</body>
</html>
