<!DOCTYPE HTML>
<html ng-app="cookApp">
<head>
    <title>{{ trans('layout.title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,400italic,300italic,600italic,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('bower_components/components-font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet" type="text/css" media="all" />
    <base href="/"/>
</head>

<body>
    <!-- header -->
    <div class="header">
        <div class="container">
            <nav class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="logo">
                        <a class="navbar-brand" href="#">{{ trans('layout.title') }}</a>
                    </div>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                    <nav class="cl-effect-13" id="cl-effect-13">
                        <ul class="nav navbar-nav">
                            <li><a href="#/" class="active">{{ trans('layout.home') }}</a></li>
                            <li><a href="/methods/:id/edit">{{ trans('layout.blog') }}</a></li>
                            <li><a href="/methods/create">{{ trans('layout.createPost') }}</a></li>
                            <li><a href="#">{{ trans('layout.mailUs') }}</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            @if (Auth::guest())
                                <li><a href="userLogin">{{ trans('label.login') }}</a></li>
                                <li><a href="userRegister">{{ trans('label.register') }}</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="users/{{ Auth::user()->id }}"><i class="fa fa-user" aria-hidden="true"></i> {{ trans('layout.profile') }}</a></li>
                                        <li>
                                            <a href="/logout"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                {{ trans('label.logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
        </div>
    </div>
    <div class="container-fluid" >
        <div class="col-md-10 col-md-offset-1">
            <ng-view></ng-view>
        </div>
    </div>
    <!-- JavaScripts -->
    <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('bower_components/angular/angular.min.js')}}"></script>
    <script src="{{ asset('bower_components/angular-route/angular-route.min.js')}}"></script>
    <script src="{{ asset('bower_components/angular-resource/angular-resource.min.js')}}"></script>
    <script src="{{ asset('angularjs/app.js') }}"></script>
    <script src="{{ asset('angularjs/services/UserService.js') }}"></script>
    <script src="{{ asset('angularjs/controllers/ShowProfile.js') }}"></script>
    <script src="{{ asset('angularjs/controllers/EditProfile.js') }}"></script>
    <script src="{{ asset('angularjs/controllers/EditMethod.js') }}"></script>
    <script src="{{ asset('angularjs/controllers/methodController.js') }}"></script>
    <script> var baseUrl = "{{ url('/') }}/";</script>
</body>
</html>
