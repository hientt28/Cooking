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
                    @if (Auth::guest())
                        <ul class="nav navbar-right" id="item">
                            <a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span>&nbsp;
                            {{ trans('layout.login') }}</a>
                        </ul>
                    @else
                        <ul class="nav navbar-nav">
                            <li class="list-item"><a href="#" class="active">{{ trans('layout.home') }}</a></li>
                            <li class="list-item"><a href="#">{{ trans('layout.blog') }}</a></li>
                            <li class="list-item"><a href="#">{{ trans('layout.method') }}</a></li>
                            <li class="list-item"><a href="#">{{ trans('layout.mailUs') }}</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li role="presentation" class="dropdown"> 
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">
                                    <img src="images/default.png" alt="" class="avatar">
                                    {{ Auth::user()->name }}<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">{{ trans('layout.profile') }}</a></li>
                                    <li><a href="{{ route('logout') }}">{{ trans('layout.logout') }}</a></li>
                                </ul>
                            </li>
                        </ul>
                    @endif
                </nav>   
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </div>
</div>
