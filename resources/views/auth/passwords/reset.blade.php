@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="agile-info_w3ls third hvr-buzz-out">
            <h3>{{ trans('layout.reset_password') }}</h3>
            <div class="agile-info_w3ls_grid third">
                <form class="form-horizontal" role="form" method="POST" action="{{ action('Auth\ForgotPasswordController@showLinkRequestForm') }}">
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus placeholder="{{ trans('message.email_address') }}">
                    <input id="password" type="password" class="form-control" name="password" required placeholder="{{trans('message.new_password') }}">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="{{ trans('message.confirm_password') }}">
                    <button type="submit">{{ trans('layout.reset_password') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
