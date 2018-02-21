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
        <div class="navbar-fixed">

            <nav>
                <div class="nav-wrapper">
                  <a href="/home" class="brand-logo right">Parallel</a>

                  @if(Auth::check())
                  <ul id="nav-mobile" class="left">
                    <li><a href="/admin">Admin</a></li>
                    <li><a href="/schools">Schools</a></li>
                    <li><a href="/students">Students</a></li>
                    <li><a href="/teachers">Teachers</a></li>
                    <li><a href="/classes">Class</a></li>
                    <li><a href="/sections">Sections</a></li>
                    <li><a href="/admissions">Admissions</a></li>
                    <li><a href="/payments">Payments</a></li>
                  </ul>
                  @endif


                </div>
            </nav>
        </div>


        <!-- content -->
        <div class="container">
            <div class="row">

                <div class="col s3">
                <!-- Grey navigation panel -->
                 @if(Auth::check())
                  <ul id="" class="" >
                    <li>
                        <div class="row">
                            <div class="col">
                                {{Auth::user()->name}}
                            </div>
                            <div>
                                <a href="/logout">logout</a>
                            </div>
                        </div>
                    </li>
                    
                    <li>Users</li>
                    <li><div class="divider"></div></li>
                    <li>
                        <ul>
                            <li ><a href="/users" class="valign-wrapper"><i class="material-icons">people</i> All User</a></li>

                            <li ><a href="/user/add" class="valign-wrapper "><i class="material-icons">add</i> Add User</a></li>
                        </ul>
                    </li>
                    <li><div class="divider"></div></li>

                    <li>Schools</li>
                    <li><div class="divider"></div></li>
                    <li>
                        <ul>
                            <li ><a href="/schools" class="valign-wrapper"><i class="material-icons">people</i> All Schools</a></li>

                            <li ><a href="/user/add" class="valign-wrapper "><i class="material-icons">add</i> Add School</a></li>
                        </ul>
                    </li>
                    <li><div class="divider"></div></li>

                    <li>Admissions</li>
                    <li><div class="divider"></div></li>
                    <li>
                        <ul>
                            <li ><a href="/admissions" class="valign-wrapper"><i class="material-icons">people</i> All Admissions</a></li>

                            <li ><a href="/admission/add" class="valign-wrapper "><i class="material-icons">add</i> New Admission</a></li>
                        </ul>
                    </li>
                    <li><div class="divider"></div></li>
                  </ul>

                @endif
                </div>

                <div class="col s9">
                    <div class="row">
                    </div>
                    <div class="row">
                        <?php
                            $rootUrls = ['schools','students','teachers','classes','sections', 'login'];
                        ?>
                       @if(!in_array(Request::path(), $rootUrls))
                        <i class="material-icons back-btn" title="back" onclick="backbtnclick()">arrow_back</i>
                       @endif
                    </div>
                    <div class="row">
                        @yield('content-title')
                    </div>
                    <div class="row">
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
</body>
</html>
