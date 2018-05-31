<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My menu') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="{{ asset('plugins/respond.min.js') }}"></script>
    <script src="{{ asset('plugins/excanvas.min.js') }}"></script>
    <script src="{{ asset('plugins/ie8.fix.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/js.cookie.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/jquery-repeater/jquery.repeater.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('scripts/app.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('scripts/form-repeater.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('scripts/components-date-time-pickers.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('scripts/layout.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('scripts/demo.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('scripts/quick-nav.min.js') }}" type="text/javascript"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
{{Html::style('plugins/font-awesome/css/font-awesome.min.css')}}
{{Html::style('plugins/simple-line-icons/simple-line-icons.min.css')}}
{{Html::style('plugins/bootstrap/css/bootstrap.min.css')}}
{{Html::style('plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}
{{Html::style('plugins/select2/css/select2.css')}}
{{Html::style('plugins/select2/css/select2-bootstrap.min.css')}}

<!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
@yield('css')
<!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
{{Html::style('css/components-md.min.css')}}
{{Html::style('css/plugins-md.min.css')}}
<!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
{{Html::style('css/layout.min.css')}}
{{Html::style('css/themes/default.min.css')}}
{{Html::style('css/custom.min.css')}}
<!-- END THEME LAYOUT STYLES -->


</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'My menu') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
<!-- END INNER FOOTER -->
<!-- END FOOTER -->
<!--[if lt IE 9]>
{{Html::script('plugins/respond.min.js')}}
{{Html::script('plugins/excanvas.min.js')}}
{{Html::script('plugins/ie8.fix.min.js')}}
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
{{Html::script('plugins/jquery.min.js')}}
{{Html::script('plugins/bootstrap/js/bootstrap.min.js')}}
{{Html::script('plugins/js.cookie.min.js')}}
{{Html::script('plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}
{{Html::script('plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}
{{Html::script('plugins/jquery.blockui.min.js')}}
{{Html::script('plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}
{{Html::script('plugins/select2/js/select2.js')}}
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
{{Html::script('scripts/app.js')}}
<!-- END THEME GLOBAL SCRIPTS -->
@yield('js')
<!-- BEGIN THEME LAYOUT SCRIPTS -->
{{Html::script('scripts/layout.min.js')}}
{{Html::script('scripts/demo.min.js')}}
{{Html::script('scripts/quick-sidebar.min.js')}}
<!-- END THEME LAYOUT SCRIPTS -->
</body>
</html>

