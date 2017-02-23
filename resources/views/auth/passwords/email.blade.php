@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="agile-info_w3ls third hvr-buzz-out">
            <h3>{{ trans('layout.reset_password') }}</h3>
            <div class="agile-info_w3ls_grid third">
                <form class="form-horizontal" role="form" method="POST" action="{{ action('Auth\LoginController@logout') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="{{ trans('message.email_address') }}">
                    </div>
                    <button type="submit">{{ trans('message.send_password_reset') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
