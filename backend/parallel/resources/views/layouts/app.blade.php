<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Parallel</title>

     <!-- Styles -->
    <link href="{{ asset('css/icons.set.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/appStyles.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body>
    <div id="app">
        <!-- <main class="py-4">
            @yield('content')
        </main> -->

        <!-- navbar -->
        <div class="navbar-fixed" id="nav_main">

            <nav class="nav-extended">
                <div class="nav-wrapper">
                  <a href="/home" class="brand-logo right">Parallel </a>
                  <a class="right school-logo"></a>
                  @if(Auth::check())
                  <ul id="nav-mobile" class="left">
                    <li><a href="/admin">Admin</a></li>
                    <li><a href="/school">Schools</a></li>
                    <li><a href="/student">Students</a></li>
                    <li><a href="/teacher">Teachers</a></li>
                    <li><a href="/classes">Class</a></li>
                    <li><a href="/section">Sections</a></li>
                    <li><a href="/admission">Admissions</a></li>
                  </ul>
                  @endif
                </div>
                @if(Auth::check())
                    <div class="nav-content grey">
                      <ul class="tabs tabs-transparent sub-nav">
                        @yield('sub-bar')

                        <li class="right system-tab right-align">
                            <div id="system-clock">
                            </div>
                            <div>
                                logged in as <span id="system_user" class="button-collapse" data-activates="slide-out"></span> | <span class="logout">logout</span>
                            </div>
                        </li>
                      </ul>
                    </div>

                    
                @endif
            </nav>
        </div>
        <ul id="slide-out" class="side-nav">
          <li><a href="#!">First Sidebar Link</a></li>
          <li><a href="#!">Second Sidebar Link</a></li>
        </ul>

        <!-- content -->
        <div class="container">
            <div class="row">
                <!-- @if(Auth::check())
                    <div class="col s3">
                        @yield('sidenav')
                     </div>
                @endif

                <div class="col s9">
                    <div class="row s12">
                        <h5 id="page_title"></h5>
                            <div class="nav-wrapper navcrumb">
                              <div class="col s12" id="page_crumbs">
                              </div>
                            </div>
                    </div> -->
                    <div class="row s12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Scripts -->
    <script
    src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{asset('js/materialize.min.js')}}"></script>
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    <script src="{{ asset('js/appScript.js') }}"></script>
    <script src="{{ asset('lang/lang-en.js') }}"></script>
    <script src="{{ asset('js/routes.js') }}"></script>
    <script src="{{ asset('js/vars.js') }}"></script>
    <script src="{{ asset('js/default.js') }}"></script>

    @yield('pagescript')
</body>
</html>
