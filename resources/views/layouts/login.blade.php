<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="India’s premier online platform for third party confirmation such as Balances, Transaction, Third Party Stocks,Contingent Liabilities,MSME Status etc. ">
    <meta name="author" content="">
    <title>Modart Mumbai | @yield('title') </title>
    <link rel="apple-touch-icon" href="{{ asset("images/apple-touch-icon.png") }}">
    <link rel="shortcut icon" href="{{ asset("images/favicon.ico") }}">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset("global/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("global/css/bootstrap-extend.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/site.min.css")}}">
    <!-- Plugins -->
    <link rel="stylesheet" href="{{asset("global/vendor/animsition/animsition.css")}}">
    <link rel="stylesheet" href="{{asset("global/vendor/asscrollable/asScrollable.css")}}">
    <link rel="stylesheet" href="{{asset("global/vendor/switchery/switchery.css")}}">
    <link rel="stylesheet" href="{{asset("global/vendor/intro-js/introjs.css")}}">
    <link rel="stylesheet" href="{{asset("global/vendor/slidepanel/slidePanel.css")}}">
    <link rel="stylesheet" href="{{asset("global/vendor/flag-icon-css/flag-icon.css")}}">
@yield('head')
<!-- Fonts -->
    <link rel="stylesheet" href="{{asset("global/fonts/web-icons/web-icons.min.css")}}">
    <link rel="stylesheet" href="{{asset("global/fonts/brand-icons/brand-icons.min.css")}}">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <!--[if lt IE 9]>
    <script src="{{ asset("global/vendor/html5shiv/html5shiv.min.js") }}"></script>
    <![endif]-->
    <!--[if lt IE 10]>
    <script src="{{ asset("global/vendor/media-match/media.match.min.js") }}"></script>
    <script src="{{ asset("global/vendor/respond/respond.min.js") }}" ></script>
    <![endif]-->
    <!-- Scripts -->
    <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/9DAE5075-9637-2948-80CB-C94A6C1CBBEA/main.js" charset="UTF-8"></script><script src="{{asset("global/vendor/modernizr/modernizr.js")}}"></script>
    <script src="{{asset("global/vendor/breakpoints/breakpoints.js")}}"></script>
    <script>
        Breakpoints();
    </script>
    <script>
        var base_url = "{{ url("/") }}";
        var one_step_back_url = "{{ url("../") }}";
    </script>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a
        href="https://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Page -->
<div id="errorMesaage"></div>
<div id="mainPage">
    <div class="@yield('class') layout-full">
        <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
             data-animsition-out="fade-out">
            <div class="page-content vertical-align-middle">
                @yield('content')
                <footer class="page-copyright page-copyright-inverse">
                    <p>Application by<a href="https://www.yellowad.in/" class="white" target="_blank">  <img
                    src="{{URL::asset('/images/Yellow.png')}}"
                    height="40" width="40"></a></p>
                    <p>© {{ date("Y") }}. All RIGHT RESERVED.</p>
                    <div class="social">
                        <a class="btn btn-icon btn-pure" target="_blank" href="https://twitter.com/modartmumbai">
                            <i class="icon bd-twitter" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-icon btn-pure" target="_blank" href="https://www.facebook.com/modartmumbai/">
                            <i class="icon bd-facebook" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-icon btn-pure" target="_blank"
                           href="https://www.instagram.com/modartmumbai/">
                            <i class="icon bd-instagram" aria-hidden="true"></i>
                        </a>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</div>

</body>
<script>

    var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
    // Firefox 1.0+
    var isFirefox = typeof InstallTrigger !== 'undefined';
    // Safari 3.0+ "[object HTMLElementConstructor]"
    var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) {
            return p.toString() === "[object SafariRemoteNotification]";
        })(!window['safari'] || safari.pushNotification);
    // Internet Explorer 6-11
    var isIE = /*@cc_on!@*/false || !!document.documentMode;
    // Edge 20+
    var isEdge = !isIE && !!window.StyleMedia;
    // Chrome 1+
    var isChrome = !!window.chrome && !!window.chrome.webstore;
    // Blink e
    if (isIE) {
        document.getElementById("mainPage").innerHTML = "";
        document.getElementById("errorMesaage").innerHTML = "<h3 style='text-align: center;black: white'>Sorry, currently the application is not supported on Internet Explorer.<br/><br/>Please open below link in Google Chrome or Mozilla Firefox</h3><p style='text-align: center;color: blue;word-break: break-all;margin-left: 30%;margin-right: 30%'>" + location.href + "</p>";
    }

</script>

<!-- Core  -->
{{--To use multiple jquery--}}
<script src="{{ asset("global/vendor/jquery/jquery.js")}}"></script>
@yield('jquery')
<script src="{{ asset("global/vendor/bootstrap/bootstrap.js")}}"></script>
<script src="{{ asset("global/vendor/animsition/animsition.js")}}"></script>
<script src="{{ asset("global/vendor/asscroll/jquery-asScroll.js")}}"></script>
<script src="{{ asset("global/vendor/mousewheel/jquery.mousewheel.js")}}"></script>
<script src="{{ asset("global/vendor/asscrollable/jquery.asScrollable.all.js")}}"></script>
<script src="{{ asset("global/vendor/ashoverscroll/jquery-asHoverScroll.js")}}"></script>
@yield('core')
<!-- Plugins -->
<script src="{{ asset("global/vendor/switchery/switchery.min.js")}}"></script>
<script src="{{ asset("global/vendor/intro-js/intro.js")}}"></script>
<script src="{{ asset("global/vendor/screenfull/screenfull.js")}}"></script>
<script src="{{ asset("global/vendor/slidepanel/jquery-slidePanel.js")}}"></script>
<script src="{{ asset("global/vendor/jquery-placeholder/jquery.placeholder.js")}}"></script>
@yield('plugins')
<!-- Scripts -->
<script src="{{ asset("global/js/core.js")}}"></script>
<script src="{{ asset("js/site.js")}}"></script>
<script src="{{ asset("js/sections/menu.js")}}"></script>
<script src="{{ asset("js/sections/menubar.js")}}"></script>
<script src="{{ asset("js/sections/gridmenu.js")}}"></script>
<script src="{{ asset("js/sections/sidebar.js")}}"></script>
<script src="{{ asset("global/js/configs/config-colors.js")}}"></script>
<script src="{{ asset("js/configs/config-tour.js")}}"></script>
<script src="{{ asset("global/js/components/asscrollable.js")}}"></script>
<script src="{{ asset("global/js/components/animsition.js")}}"></script>
<script src="{{ asset("global/js/components/slidepanel.js")}}"></script>
<script src="{{ asset("global/js/components/switchery.js")}}"></script>
<script src="{{ asset("global/js/components/jquery-placeholder.js")}}"></script>
<script src="{{ asset("global/js/components/material.js")}}"></script>
<script>
    $('div.alert').not('.alert-important').delay(10000).fadeOut(350);
</script>
@yield('end_scripts')
</html>
