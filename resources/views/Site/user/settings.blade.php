@extends('site')

@section('content')
    	<main id="main">




		<article class="videos-section pd">
			<div class="container">


				<div class="flex-start">
                    @include('siteLayout.sidebar')
					<div class="col-10 col-md-6 col-sm-12">
						<div class="all-videos-holder height-auto">

								<div class="flex-between align-center">
									<h4 class="settings-title">بياناتى</h4>

								</div>
								<div class="pdt">
                                    <form method="POST" action="{{ route('Site.user.settings.update') }}">
                                        @csrf
                                        <div class="form-control">
                                            <div class="form-field">
                                                <label>الاسم</label>
                                                <div class="field">
                                                    <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" placeholder="محمد الشريف">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-control">
                                            <div class="form-field">
                                                <label>البريد الإلكترونى</label>
                                                <div class="field">
                                                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" placeholder="example@gmail.com">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-control">
                                            <div class="form-field">
                                                <label>الدولة</label>
                                                <div class="field">
                                                    <input type="text" name="country" value="{{ old('country', Auth::user()->country) }}" placeholder="مصر">
                                                </div>
                                            </div>

                                            <div class="form-field">
                                                <label>رقم الهاتف</label>
                                                <div class="field">
                                                    <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}" placeholder="0123456789">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-control">
                                            <input type="submit"  class="btn" name="" value="تعديل" >
                                        </div>
                                    </form>

								</div>

						</div>
					</div>
				</div>
			</div>
		</article>
            @include('components.contact-us')

	</main>

@endsection
