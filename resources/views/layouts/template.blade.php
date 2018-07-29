<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="name">
    <meta name="author" content="">
    <title>Modart @yield('title', 'Mumbai')</title>
    <link rel="apple-touch-icon" href="{{ asset("images/apple-touch-icon.png")}}">
    <link rel="shortcut icon" href="{{ asset("images/favicon.ico")}}">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset("global/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{ asset("global/css/bootstrap-extend.min.css")}}">
    <link rel="stylesheet" href="{{ asset("css/site.min.css")}}">
    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset("global/vendor/animsition/animsition.css")}}">
    <link rel="stylesheet" href="{{ asset("global/vendor/asscrollable/asScrollable.css")}}">
    <link rel="stylesheet" href="{{ asset("global/vendor/switchery/switchery.css")}}">
    <link rel="stylesheet" href="{{ asset("global/vendor/intro-js/introjs.css")}}">
    <link rel="stylesheet" href="{{ asset("global/vendor/slidepanel/slidePanel.css")}}">
    <link rel="stylesheet" href="{{ asset("global/vendor/flag-icon-css/flag-icon.css")}}">
    <link rel="stylesheet" href="{{ asset("global/vendor/bootstrap-sweetalert/sweet-alert.css")}}">
    <link rel="stylesheet" href="{{ asset("global/vendor/toastr/toastr.css")}}">
    <link rel="stylesheet" href="{{ asset("css/toastr.css")}}">
    <link rel="stylesheet" href="{{ asset("css/v1.css")}}">
    <link rel="stylesheet" href="{{ asset("css/custom.css")}}">
    <link rel="stylesheet" href="{{ asset("css/ribbon.css")}}">


    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset("global/fonts/open-iconic/open-iconic.css")}}">
    <link rel="stylesheet" href="{{ asset("global/fonts/material-design/material-design.css")}}">
    <link rel="stylesheet" href="{{ asset("global/fonts/weather-icons/weather-icons.css")}}">
    <link rel="stylesheet" href="{{ asset("global/fonts/web-icons/web-icons.min.css")}}">
    <link rel="stylesheet" href="{{ asset("global/fonts/brand-icons/brand-icons.min.css")}}">
    <link rel="stylesheet" href="{{ asset("global/fonts/octicons/octicons.min.css")}}">
    <link rel="stylesheet" href="{{ asset("global/fonts/glyphicons/glyphicons.min.css")}}">
    <link rel="stylesheet" href="{{ asset("global/fonts/font-awesome/font-awesome.min.css")}}">
    <link rel="stylesheet" href="{{ asset("global/vendor/angular-ui-select/select.min.css")}}">
    <link rel="stylesheet" href="{{ asset("global/vendor/alertify-js/alertify.css")}}">
 <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Josefin+Sans" />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <style>.form-group .help-block {
            display: none;
        }

        .form-group.has-error .help-block {
            display: block;
        }

    </style>
    <!-- Scripts -->


    <script src="{{ asset("global/vendor/modernizr/modernizr.js")}}"></script>
    <script src="{{ asset("global/vendor/breakpoints/breakpoints.js")}}"></script>
    <script>
        Breakpoints();
    </script>
    @yield('heads')

</head>

<body class="@yield('body-class')">

<!--[if IE]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a target="_blank"
                                                                                        href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
                data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"
                data-toggle="collapse">
            <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>


        {{--<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">--}}
        {{--<div class="navbar-header">--}}
        {{--<button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"--}}
        {{--data-toggle="menubar">--}}
        {{--<span class="sr-only">Toggle navigation</span>--}}
        {{--<span class="hamburger-bar"></span>--}}
        {{--</button>--}}
        {{--<button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"--}}
        {{--data-toggle="collapse">--}}
        {{--<i class="icon wb-more-horizontal" aria-hidden="true"></i>--}}
        {{--</button>--}}


        {{--<div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">--}}
        {{--<img class="navbar-brand-logo" src="{{ asset("/images/logo.png")}}">--}}
        {{--<img src="{{ asset("/images/logo.png") }}" height="1"--}}
        {{--class="pull-up" style="margin:0 10px 10px 0">--}}
        {{--title="Mod Art">--}}
        {{--<span class="navbar-brand-text"> MOD ART</span>--}}
        {{--</div>--}}
    </div>
    <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
            <!-- Navbar Toolbar -->
            <ul class="nav navbar-toolbar">
                <li class="hidden-float" id="toggleMenubar">
                    <a data-toggle="menubar" href="#" role="button">
                        <i class="icon hamburger hamburger">
                            <span class="sr-only">Toggle menubar</span>
                            <span class="hamburger-bar"></span>
                        </i>
                    </a>
                </li>
            </ul>
            <!-- Navbar Toolbar Right -->
            <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                <li class="dropdown"></li>
                <?php
                //                if (\Illuminate\Support\Facades\Auth::user()->hasRole(['auditor_admin', 'auditor_sub_admin'])) {
                //                    $settings = asset('auditor/edit');
                //                    $profile = asset('auditor/profile');
                //                } else if(\Illuminate\Support\Facades\Auth::user()->hasRole(['auditee_admin', 'auditee_sub_admin'])){
                //                    $settings = asset('auditee/edit');
                //                    $profile = asset('auditee/profile');
                //                } else if(Auth::guest()){
                //                } else {}
                ?>
                @if (Auth::guest())
                    <li role="presentation"><a href="https://modart.in" target="_blank" title="Help"><i
                                    class="icon wb-help-circle" aria-hidden="true"></i></a></li>
                    <li><a href="{{ asset('/login')}}">Login</a></li>
                @else
                    <li><a href="javascript:void(0)">Hello, {{ ucwords(strtolower(Auth::user()->full_name)) }}</a></li>
                    {{--@include('layouts.notification')--}}
                    <li class="dropdown">
                        <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#"
                           aria-expanded="false"
                           data-animation="scale-up" role="button">
                                <span class="avatar avatar-online">
                                    @include('common.image', ['image'=> Auth::user()->picture, 'url'=>Auth::user()->pictureUrl, 'onlyImage'=>true])
                                    {{--<i class="site-menu-icon wb-user-circle " aria-hidden="true"></i>--}}
                                    <i></i>
                                </span>

                        </a>
                        <ul class="dropdown-menu" role="menu">
                             {{--<li role="presentation">--}}
                                {{--<a href="{{ asset("/user/edit-profile")}}" role="menuitem"><i--}}
                                            {{--class="icon md-account"--}}
                                            {{--aria-hidden="true"></i>--}}
                                    {{--Profile</a>--}}
                            {{--</li>--}}
                            <li role="presentation">
                                @if(Auth::user()->role == "Faculty")
                                    <a href="{{ asset('/confirm_pass_fac')}}" role="menuitem"><i class="icon md-card"
                                                                                                 aria-hidden="true"></i>
                                        Update Password</a>
                                @elseif(Auth::user()->role == "STD")
                                    <a href="{{ asset('/confirm_pass_stud')}}" role="menuitem"><i class="icon md-card"
                                                                                                 aria-hidden="true"></i>
                                        Update Password</a>
                                @endif
                            </li>
                                {{--<li role="presentation">--}}
                                {{--<a href="{{ $settings or 'javascript: void(0);' }}" role="menuitem"><i--}}
                                            {{--class="icon md-settings"--}}
                                            {{--aria-hidden="true"></i> Settings</a>--}}
                            {{--</li>--}}
                            <li class="divider" role="presentation"></li>
                            <li role="presentation">
                                <a href="{{ url('/logout')}}" target="_self">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    {{--<div class="navbar-search-overlap collapse" id="site-navbar-notification" aria-expanded="true" style="background-color:#f3f7f9;width: 60%;margin-left: 102px;margin-top: 10px;">--}}
    {{--<form role="search">--}}
    {{--<div class="form-group">--}}
    {{--<div class="input-search">--}}
    {{--<i class="input-search-icon" aria-hidden="true"></i>--}}
    {{--<label class="form-control">--}}
    {{--<p style="margin-top: 10px;">--}}
    {{--We need your permission to enable desktop notifications.--}}
    {{--<a href="" class="btn btn-primary" id="enable-notification" style="height: 32px;">Enable</a>--}}
    {{--<a href="" class="btn btn-default waves-effect waves-light" id="disable-notification" style="height: 32px;">Disable</a>--}}
    {{--</p>--}}
    {{--</label>--}}
    {{----}}
    {{--<!--<input type="text" class="form-control" name="site-search" placeholder="Search...">-->--}}
    {{--<button type="button" class="input-search-close icon md-close collapsed" data-target="#site-navbar-notification" data-toggle="collapse" aria-label="Close" aria-expanded="false"></button>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}
    <!-- End Navbar Collapse -->
    </div>
</nav>

@include('layouts.sidebar')
<!-- Page -->
@yield('page')
<!-- End Page -->
<!-- Footer -->
<footer class="site-footer">
    <div class="site-footer-legal">&copy; {{ date('Y')}} <a
                href="http://modart.in/" target="_blank">Mod Art</a></div>
    <div class="site-footer-right">
       Created by <a href="https://www.yellowad.in/" target="_blank" ><img
                    src="{{URL::asset('/images/Yellow.png')}}"
                    height="30" width="30"></a>
    </div>
</footer>
<!-- Core  -->
<script src="{{ asset("global/vendor/jquery/jquery.js")}}"></script>
<script src="{{ asset("global/vendor/bootstrap/bootstrap.js")}}"></script>
<script src="{{ asset("global/vendor/animsition/animsition.js")}}"></script>
<script src="{{ asset("global/vendor/asscroll/jquery-asScroll.js")}}"></script>
<script src="{{ asset("global/vendor/mousewheel/jquery.mousewheel.js")}}"></script>
<script src="{{ asset("global/vendor/asscrollable/jquery.asScrollable.all.js")}}"></script>
<script src="{{ asset("global/vendor/ashoverscroll/jquery-asHoverScroll.js")}}"></script>
<!-- Plugins -->
<script src="{{ asset("global/vendor/switchery/switchery.min.js")}}"></script>
<script src="{{ asset("global/vendor/intro-js/intro.js")}}"></script>
<script src="{{ asset("global/vendor/screenfull/screenfull.js")}}"></script>
<script src="{{ asset("global/vendor/slidepanel/jquery-slidePanel.js")}}"></script>
<script src="{{ asset("global/vendor/moment/moment.js")}}"></script>
<script src="{{ asset("global/vendor/skycons/skycons.js")}}"></script>
<script src="{{ asset("global/vendor/matchheight/jquery.matchHeight-min.js")}}"></script>
<script src="{{ asset("global/vendor/bootbox/bootbox.js")}}"></script>
<script src="{{ asset("global/vendor/bootstrap-sweetalert/sweet-alert.js")}}"></script>
<script src="{{ asset("global/vendor/toastr/toastr.js")}}"></script>
<!-- Scripts -->
<script src="{{ asset("global/js/core.js")}}"></script>
<script src="{{ asset("js/site.js")}}"></script>
<script src="{{ asset("js/sections/menu.js")}}"></script>
<script src="{{ asset("js/sections/menubar.js")}}"></script>
<script src="{{ asset("js/sections/gridmenu.js")}}"></script>
{{--<script src="{{ asset("js/sections/sidebar.js")}}"></script>--}}
<script src="{{ asset("global/js/configs/config-colors.js")}}"></script>
<script src="{{ asset("js/configs/config-tour.js")}}"></script>
<script src="{{ asset("global/js/components/asscrollable.js")}}"></script>
<script src="{{ asset("global/js/components/animsition.js")}}"></script>
<script src="{{ asset("global/js/components/slidepanel.js")}}"></script>
<script src="{{ asset("global/js/components/switchery.js")}}"></script>
<script src="{{ asset("global/js/components/matchheight.js")}}"></script>
<script src="{{ asset("global/js/components/bootbox.js")}}"></script>
<script src="{{ asset("global/js/components/bootstrap-sweetalert.js")}}"></script>
<script src="{{ asset("global/js/components/toastr.js")}}"></script>
<script src="{{ asset("js/taffy-min.js")}}"></script>
<script src="{{ asset("js/panel-loader.js")}}"></script>
<script src="{{ asset("angular/angular.min.js")}}"></script>
<script src="{{ asset("angular/angular-sanitize.js")}}"></script>
<script src="{{ asset("angular/ng-infinite-scroll.min.js")}}"></script>
<script src="{{ asset("js/ngBootbox.js")}}"></script>
<script src="{{ asset("js/case.min.js")}}"></script>
<script src="{{ asset("js/CaseFilter.min.js")}}"></script>
<script src="{{ asset("js/js.cookie.js")}}"></script>

{{--<!-- sidebar new from augment  ->--}}
{{--<!-- Custom CSS -->--}}
{{--<link rel="stylesheet" href="{{ asset("js/sidebar/css/style.css")}}">--}}
{{--<!-- Graph CSS -->--}}
{{--<link rel="stylesheet" href="{{ asset("js/sidebar/css/font-awesome.css")}}">--}}
{{--<!-- jQuery -->--}}
{{--<link rel="stylesheet" href="{{ asset("//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400")}}">--}}
{{--<!-- lined-icons -->--}}
{{--<link rel="stylesheet" href="{{ asset("js/sidebar/css/icon-font.min.css")}}">--}}
{{--<!-- //lined-icons -->--}}
{{--<script src="{{ asset("js/sidebar/js/jquery-1.10.2.min.js")}}"></script>--}}
{{--<script src="{{ asset("js/sidebar/js/amcharts.js")}}"></script>--}}
{{--<script src="{{ asset("js/sidebar/js/serial.js")}}"></script>--}}
{{--<script src="{{ asset("js/sidebar/js/light.js")}}"></script>--}}
{{--<script src="{{ asset("js/sidebar/js/radar.js")}}"></script>--}}
{{--<link rel="stylesheet" href="{{ asset("js/sidebar/css/fabochart.css")}}">--}}
{{--<!--clock init-->--}}
{{--<script src="{{ asset("js/sidebar/js/css3clock.js")}}"></script>--}}
{{--<!--Easy Pie Chart-->--}}
{{--<!--skycons-icons-->--}}
{{--<script src="{{ asset("js/sidebar/js/skycons.js")}}"></script>--}}
{{--<script src="{{ asset("js/sidebar/js/protovis-d3.2.js")}}"></script>--}}
{{--<script src="{{ asset("js/sidebar/js/vix.js")}}"></script>--}}
{{--<script src="{{ asset("js/sidebar/js/fabochart.js")}}"></script>--}}
{{--<script src="{{ asset("js/sidebar/js/Chart.js")}}"></script>--}}
{{--<!--js -->--}}
{{--<link rel="stylesheet" href="{{ asset("js/sidebar/css/vroom.css")}}">--}}
{{--<script src="{{ asset("js/sidebar/js/vroom.js")}}"></script>--}}
{{--<script src="{{ asset("js/sidebar/js/TweenLite.min.js")}}"></script>--}}
{{--<script src="{{ asset("js/sidebar/js/CSSPlugin.min.js")}}"></script>--}}
{{--<script src="{{ asset("js/sidebar/js/jquery.nicescroll.js")}}"></script>--}}
{{--<script src="{{ asset("js/sidebar/js/scripts.js")}}"></script>--}}
{{--<!-- Bootstrap Core JavaScript -->--}}
{{--<script src="{{ asset("js/sidebar/js/bootstrap.min.js")}}"></script>--}}
{{--<!-- sidebar ends here -->--}}


@if ( Config::get('app.debug') )
    <script src="{{ asset("js/commons.js")}}"></script>
@else
    <script src="{{ url('/').elixir("js/commons.js")}}"></script>
@endif
<script src="{{ asset("global/vendor/angular-ui-select/select.min.js")}}"></script>
<script src="{{ asset("global/vendor/alertify-js/alertify.js")}}"></script>
<script src="{{ asset("global/js/components/alertify-js.js")}}"></script>
<script>
    $('div.alert').not('.alert-important').delay(10000).fadeOut(350);
</script>
<script src="{{asset("global/js/components/jvectormap.js") }}"></script>
<script src="{{asset("examples/js/dashboard/v1.js") }}"></script>
{{--<script>--}}
{{--(function (document, window, $) {--}}
{{--'use strict';--}}
{{--var Site = window.Site;--}}
{{--$(document).ready(function () {--}}
{{--Site.run();--}}
{{--});--}}
{{--})(document, window, jQuery);--}}
{{--$('#flash-overlay-modal').modal();--}}
{{--var firmway = angular.module('firmway', ['CaseFilter', 'ngBootbox', 'ui.select', 'ngSanitize', 'infinite-scroll'], function ($interpolateProvider, $locationProvider) {--}}
{{--$locationProvider.html5Mode({--}}
{{--enabled: true,--}}
{{--requireBase: false--}}
{{--});--}}
{{--$interpolateProvider.startSymbol('<%');--}}
{{--$interpolateProvider.endSymbol('%>');--}}
{{--});--}}
{{--firmway.directive('fileModel', ['$parse', function ($parse) {--}}
{{--return {--}}
{{--restrict: 'A',--}}
{{--link: function (scope, element, attrs) {--}}
{{--var model = $parse(attrs.fileModel);--}}
{{--var modelSetter = model.assign;--}}
{{--element.bind('change', function () {--}}
{{--scope.$apply(function () {--}}
{{--modelSetter(scope, element[0].files[0]);--}}
{{--});--}}
{{--});--}}
{{--}--}}
{{--};--}}
{{--}]);--}}
{{--firmway.directive('showErrors', function ($timeout) {--}}
{{--return {--}}
{{--restrict: 'A',--}}
{{--require: '^form',--}}
{{--link: function (scope, el, attrs, formCtrl) {--}}
{{--// find the text box element, which has the 'name' attribute--}}
{{--var inputEl = el[0].querySelector("[name]");--}}
{{--// convert the native text box element to an angular element--}}
{{--var inputNgEl = angular.element(inputEl);--}}
{{--// get the name on the text box--}}
{{--var inputName = inputNgEl.attr('name');--}}
{{--// only apply the has-error class after the user leaves the text box--}}
{{--var blurred = false;--}}
{{--inputNgEl.bind('blur', function () {--}}
{{--blurred = true;--}}
{{--el.toggleClass('has-error', formCtrl[inputName].$invalid);--}}
{{--});--}}
{{--scope.$watch(function () {--}}
{{--return formCtrl[inputName].$invalid--}}
{{--}, function (invalid) {--}}
{{--// we only want to toggle the has-error class after the blur--}}
{{--// event or if the control becomes valid--}}
{{--if (!blurred && invalid) {--}}
{{--return--}}
{{--}--}}
{{--el.toggleClass('has-error', invalid);--}}
{{--});--}}
{{--scope.$on('show-errors-check-validity', function () {--}}
{{--el.toggleClass('has-error', formCtrl[inputName].$invalid);--}}
{{--});--}}
{{--scope.$on('show-errors-reset', function () {--}}
{{--$timeout(function () {--}}
{{--el.removeClass('has-error');--}}
{{--}, 0, false);--}}
{{--});--}}
{{--}--}}
{{--}--}}
{{--});--}}
{{--</script>--}}
{{--<script>--}}
{{--var environment = "{{ config('app.env') }}";--}}
{{--var user_id = "{{ Auth::guest() ? "" : Auth::user()->id  }}";--}}

{{--//Set cookie--}}
{{--function setCookie(cname, cvalue, exdays) {--}}
{{--var d = new Date();--}}
{{--d.setTime(d.getTime() + (exdays*24*60*60*1000));--}}
{{--var expires = "expires="+d.toUTCString();--}}
{{--document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";--}}
{{--}--}}

{{--//Get cookie by name--}}
{{--function getCookie(name) {--}}
{{--var nameEQ = name + "=";--}}
{{--var ca = document.cookie.split(';');--}}
{{--for (var i = 0; i < ca.length; i++) {--}}
{{--var c = ca[i];--}}
{{--while (c.charAt(0) == ' ')--}}
{{--c = c.substring(1);--}}
{{--if (c.indexOf(nameEQ) != -1)--}}
{{--return c.substring(nameEQ.length, c.length);--}}
{{--}--}}
{{--return null;--}}
{{--}--}}

{{--var notification_cookie = environment + '_notification_user_' + user_id;--}}

{{--if(user_id !== "" && !getCookie(notification_cookie)){ //If there is no cookie set,--}}
{{--$("#site-navbar-notification").addClass("in");--}}
{{--}--}}

{{--$("#enable-notification").on('click', function(){--}}
{{--Notification.requestPermission().then(function(result) {--}}
{{--if (result === 'denied') {--}}
{{--setCookie(notification_cookie, 0, 365); // blocked for 1 year--}}
{{--$("#site-navbar-notification").removeClass("in");--}}
{{--return;--}}
{{--}--}}
{{--if (result === 'granted') {--}}
{{--setCookie(notification_cookie, 1, 365); // grant for 1 year--}}
{{--$("#site-navbar-notification").removeClass("in");--}}
{{--return;--}}
{{--}--}}
{{--});--}}
{{--}--}}
{{--);--}}

{{--$("#disable-notification").on('click', function(){--}}
{{--setCookie(notification_cookie, 0, 30); //blocked for 30 days--}}
{{--$("#site-navbar-notification").removeClass("in");--}}
{{--}--}}
{{--);--}}
{{--</script>--}}
{{--@yield('scripts')--}}
{{--@yield('last_script')--}}
{{--<script src="https://www.gstatic.com/firebasejs/4.1.2/firebase.js"></script>--}}
{{--<script src="{{ asset("js/firebase_token.js")}}"></script>--}}
{{--@if ( Config::get('app.debug') )--}}
{{--<script src="{{ asset("js/controllers/notificationCtrl.js") }}"></script>--}}
{{--@else--}}
{{--<script src="{{ asset(elixir("js/controllers/notificationCtrl.js"))}}"></script>--}}
{{--@endif--}}

</body>

{{--<script>
    {{--var base_url = "{{ url("/") }}";--}}
{{--var java_url = "{{ config('app.java_url') }}";--}}
{{--var one_step_back_url = "{{ url("../") }}";--}}

{{--var isOpera = (!!window.opr && !!opr.addons) || !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;--}}
{{--// Firefox 1.0+--}}
{{--var isFirefox = typeof InstallTrigger !== 'undefined';--}}
{{--// Safari 3.0+ "[object HTMLElementConstructor]"--}}
{{--var isSafari = /constructor/i.test(window.HTMLElement) || (function (p) {--}}
{{--return p.toString() === "[object SafariRemoteNotification]";--}}
{{--})(!window['safari'] || safari.pushNotification);--}}
{{--// Internet Explorer 6-11--}}
{{--var isIE = /*@cc_on!@*/false || !!document.documentMode;--}}
{{--// Edge 20+--}}
{{--var isEdge = !isIE && !!window.StyleMedia;--}}
{{--// Chrome 1+--}}
{{--var isChrome = !!window.chrome && !!window.chrome.webstore;--}}
{{--// Blink e--}}
{{--var isConfirmation = location.pathname.toString().indexOf('confirmation') > -1;--}}
{{--if ((isIE && !isConfirmation) || (isIE && isConfirmation && document.documentMode < 10)) {--}}
{{--document.getElementById("homeNav").innerHTML = "";--}}
{{--document.getElementById("errorMessage").innerHTML = "<h3 style='text-align: center;color: black'>Sorry, currently the application is not supported on Internet Explorer.<br/><br/>Please open below link in Google Chrome or Mozilla Firefox</h3><br/><p style='text-align: center;color: blue;word-break: break-all;margin-left: 30%;margin-right: 30%'>" + location.href + "</p>";--}}
{{--}--}}
{{--</script>--}}
{{--@if(Config::get('app.env') =="production" )--}}
{{--@if (Auth::guest())--}}
{{--<!--Start of Tawk.to Script-->--}}
{{--<script type="text/javascript">--}}
{{--var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();--}}
{{--(function () {--}}
{{--var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];--}}
{{--s1.async = true;--}}
{{--s1.src = 'https://embed.tawk.to/59d336f9c28eca75e4623bfd/default';--}}
{{--s1.charset = 'UTF-8';--}}
{{--s1.setAttribute('crossorigin', '*');--}}
{{--s0.parentNode.insertBefore(s1, s0);--}}
{{--})();--}}
{{--</script>--}}
{{--<!--End of Tawk.to Script-->--}}
{{--@endif--}}
{{--@endif--}}
</html>
