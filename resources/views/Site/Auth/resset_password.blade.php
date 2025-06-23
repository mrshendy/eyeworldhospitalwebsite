@extends('site')
@section('content')
	<main id="main">
		
		<div class="activation pd">
			<h4>{{__('forget password')}}</h4>	
			<p>{{__('Please log in to your account so we can create a new password') }}.</p>
			<form class="custom-form">
				<div class="form-control">
					<div class="form-field">
						<label>{{__('phone')}}</label>
						<div class="field">
							<input type="text" name="text" placeholder="+201012345678">
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
				<a href="#">{{__('login')}}</a>
			</p>
		</div>

	</main>


@endsection