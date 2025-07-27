@extends('site')

@section('content')
<main id="main">
    <div class="activation pd">
        <h4>{{__('Reset Password')}}</h4>
        <form class="custom-form" method="POST" action="{{ route('Site.password.reset.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">

            <div class="form-control">
                <div class="form-field">
                    <label>{{__('New Password')}}</label>
                    <div class="field">
                        <input type="password" name="password" required>
                    </div>
                </div>
                <div class="form-field">
                    <label>{{__('Confirm Password')}}</label>
                    <div class="field">
                        <input type="password" name="password_confirmation" required>
                    </div>
                </div>
            </div>
            <button class="reset_password btn btn-outline-success" type="submit" class="btn w-100">{{__('Reset')}}</button>
        </form>
    </div>
</main>
@endsection
