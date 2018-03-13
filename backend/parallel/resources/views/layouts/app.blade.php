<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(Auth::check())
    <meta name="default-password" content="{{Auth::user()->changepassword}}">
    @endif

    <title>Parallel</title>

     <!-- Styles -->
    <link href="{{ asset('css/icons.set.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/appStyles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/widgets/style.css') }}" rel="stylesheet">
    @if(Auth::check()) <link href="/css/themes/{{Auth::user()->theme}}/style.css" rel="stylesheet"> @endif
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body @if(Auth::check()) class="{{Auth::user()->theme}}" @endif>

  <div id="print_div"></div>

  <!-- Modal Structure -->
  <div id="search_modal" class="modal modal-fixed-header search-page-modal custom-modal">
    <div class="modal-header">
      <div class="row s12">
        <i class="material-icons right close modal-close waves-effect" title="close">close</i>
        <div class="col s12">
          <div class="input-field">
                <input id="search" name="search" type="text" class="validate" onkeyup="search()">
                <label for="search">Search</label>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-content">
      <div class="modal-content-container">
        <div class="col s12">
            <div class="result-container">
            </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="search-page-modal custom-modal">
    <div class="search-container hoverable">
      <i class="material-icons right close" title="close">close</i>
      <div class="row s12">

        <div class="col s12">
          <div class="input-field col s12">
                <input id="search" name="search" type="text" class="validate" onkeyup="search()">
                <label for="search">Search</label>
          </div>
        </div>

        <div class="col s12">
            <div class="result-container">

            </div>
        </div>

      </div>
    </div>
  </div> -->


    <div id="app" class="@if(!Auth::check()) login @endif">
        <!-- <main class="py-4">
            @yield('content')
        </main> -->

        @if(Auth::check())
        <!-- navbar -->
        <div class="navbar-fixed" id="nav_main">

            <nav class="nav-extended">
                <div class="nav-wrapper">
                  <div class="hide-on-med-and-down">
                    <a href="/home" class="brand-logo right">Parallel </a>
                    <a class="right school-logo"></a>
                  </div>
                  @if(Auth::check())
                  <ul id="nav-mobile" class="hide-on-small-only left">
                    <li><a href="/admin">Admin</a></li>
                    <li><a href="/school">School</a></li>
                    <li><a href="/student">Student</a></li>
                    <li><a href="/teacher">Teacher</a></li>
                    <li><a href="/classes">Class</a></li>
                    <li><a href="/section">Section</a></li>
                    <li><a href="/admission">Admission</a></li>
                    <li><a onclick="opensearch()"><i class="material-icons">search</i></a></li>
                  </ul>
                  @endif
                </div>
                
                    <div class="nav-content">
                      <ul class="tabs tabs-transparent sub-nav">
                        @yield('sub-bar')

                        <li class="right system-tab right-align hide-on-small-only">
                            <div id="system-clock">
                            </div>
                            <div >
                                logged in as <span id="system_user" class="button-collapse" data-activates="slide-out"></span>
                            </div>
                        </li>
                      </ul>
                    </div>

                    <!-- change password tutorial structure -->
                    <div class="tap-target change-password" data-activates="system_user">
                      <div class="tap-target-content">
                        <h5>Change Password</h5>
                        <p>Our system detected that you are using a default password. Please click here to change your password</p>
                      </div>
                    </div>
                    
                
            </nav>
        </div>
        <ul id="slide-out" class="side-nav">
          <li>
            <ul class="collapsible sidenav" data-collapsible="accordion">
              <li>
                <div class="row center">
                  <h5>Settings</h5>
                </div>
              </li>
              <li>
                <div class="collapsible-header"><i class="material-icons">account_circle</i>Account</div>
                <div class="collapsible-body">
                  <ul>
                    <!-- onclick="openChangePasswordView()" -->
                    <li><a class="valign-wrapper" onclick="systemSettingsEdit('changePassword')"><i class="material-icons">lock</i> Change Password</a></li>
                  </ul>
                </div>
              </li>
              <li>
                <div class="collapsible-header"><i class="material-icons">settings</i>System</div>
                <div class="collapsible-body">
                    <ul>
                          <li ><a class="valign-wrapper" onclick="systemSettingsEdit('theme')"><i class="material-icons">color_lens</i> Theme</a></li>

                          <!-- <li ><a class="valign-wrapper"><i class="material-icons">add</i> Add User</a></li> -->
                      </ul>
                </div>
              </li>
              <li>
                <div class="collapsible-header" onclick="systemSettingsEdit('widget')"><i class="material-icons">apps</i>Widget</div>
              </li>
              <li>
                <div class="collapsible-header logout"><i class="material-icons">power_settings_new</i>Logout</div>
              </li>
            </ul>
          </li>
          
        </ul>
        @endif

        

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

    <!-- Modal Structure -->
      <div id="edit_modal" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Edit</h4>
          <div class="modal-content-container">
          </div>
        </div>
        <div class="modal-footer">
            <a class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
          <a class="modal-action waves-effect waves-green btn-flat" onclick="saveEdit();">Save</a>
        </div>
      </div>




      @if(!Auth::check()) @include('auth.loginwidget') @endif
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
