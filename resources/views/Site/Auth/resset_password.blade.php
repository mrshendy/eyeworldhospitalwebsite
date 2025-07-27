@extends('site')
@section('content')
	<main id="main">

		<div class="activation pd">
			<h4>{{__('forget password')}}</h4>
			<p>{{__('Please log in to your account so we can create a new password') }}.</p>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form class="custom-form" method="POST" action="{{ route('Site.resetpassword.send') }}">
                @csrf
				<div class="form-control">
					<div class="form-field">
						<label>{{__('phone')}}</label>
						<div class="field">
                            <input type="text" name="phone" placeholder="+201012345678" required>
						</div>
					</div>
				</div>
				<div class="form-control">
					<div class="form-field">
						<input type="submit" class="btn w-100" name="forgot" value="{{__('send')}}">
					</div>
				</div>
			</form>
			<p class="not-send">
				<span>{{__('Did you remember your password?')}}</span>
				<a href="{{ route('Site.login.index') }}">{{__('login')}}</a>
			</p>
		</div>

	</main>


@endsection
