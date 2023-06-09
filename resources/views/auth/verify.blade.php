@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Подтвердите свой email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Новое письмо подтверждения отправлено на вашу электронную почту') }}
                        </div>
                    @endif

                    {{ __('Чтобы получить доступ к сайту вам необходимо подтвердить введенный email. ') }}
                    {{ __('Если вы не получили письмо подтверждения, ') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('нажмите здесь для повторного отправления') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
