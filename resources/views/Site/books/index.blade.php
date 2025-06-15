@extends('site')
@section('content')
	<main id="main">
		
		<!-- Banner -->
		<article class="banner">
			<img src="{{asset('siteassets/images/specializations/main.svg')}}">
		</article>
		<!-- Banner -->

		<!-- Achievement Section -->
		<article class="achievement pd">
			<div class="container">

				<!-- About  -->
				<section class="about flex-start  text-right align-center">
					<div class="col-6 col-md-6 col-sm-12">
						<div class="about-desc">
							<span class="pre-title site-color">استكشف مجموعتنا الواسعة من الكتب العلمية المتنوعة في مجالات متعددة، وابدأ رحلتك في التعلم والنمو الآن، اختر الكتاب المناسب واطلبه بسهولة!</span>
							<h2 class="main-title">استمتع باكتشاف أفضل الكتب العلمية في مختلف التخصصات مع إمكانية إضافتها إلى سلة المشتريات لشراء الكتاب بسهولة.</h2>
							<p class="main-para">
								نقدم لكم مجموعة واسعة من الكتب العلمية المتميزة في مختلف المجالات التي تساعدك على تطوير معرفتك وتوسيع آفاقك. اختر من بين كتبنا المتنوعة التي تغطي العديد من المواضيع مثل الطب، التكنولوجيا، والعلوم الإنسانية. يمكنك إضافة الكتب المفضلة إلى سلتك وشراءها بسهولة لتبدأ القراءة في أي وقت.
							</p>
						</div>
					</div>
					<div class="col-6 col-md-6 col-sm-12">
						<figure class="about-image">
							<img src="{{asset('siteassets/images/medical/categories/main.svg')}}" alt="">
						</figure>
					</div>
				</section>
				<!-- About  -->

	
					

			</div>
		</article>

		<!-- Achievement Section -->

		<article class="videos-section pd">
			<div class="container">
		
				<h2 class="main-title">
					من فئات الكتب العلمية
				</h2>
		
			
	
				<div class="all-videos-holder height-auto flex-center row-gab-15">

					@foreach ($bookTopics as $topic)
						<div class="col-4 col-md-6 col-sm-12">
							<div class="text-box text-center">
								<div class="device-image">
									<img src="{{asset('siteassets/images/medical/categories/' . $topic->id . '.svg')}}" alt="">
								</div>
								<h4>{{ $topic->name }}</h4>
								<p class="feedback">
									{{ $topic->description }}
								</p>
								<a href="#" class="show-profile">
									عرض الكتب
								</a>
							</div>
						</div>
					@endforeach
	

				</div>
			
				
			</div>
		</article>


		<!-- Contact us Section -->
		<article class="contact-us pd">
			<div class="container">
				<span class="pre-title site-color">نحن هنا للاستماع إليك ومساعدتك في كل ما تحتاجه!</span>
				<h2 class="main-title">اتصل بنا الآن لتحصل على الدعم والمساعدة في أي وقت  <br>يناسبك تمامًا</h2>
				<p class="main-para">فريقنا المتخصص في خدمتك دائمًا. إذا كانت لديك أي استفسارات أو تحتاج إلى مساعدة، نحن هنا للرد على جميع أسئلتك وتقديم الدعم الكامل. سواء عبر الهاتف أو البريد الإلكتروني أو من خلال تطبيقنا، نحن متاحون لضمان راحتك وتحقيق أفضل تجربة ممكنة.</p>

				<div class="flex-center align-center pdt">
					<div class="col-6 col-md-6 col-sm-12">
						<form class="custom-form" action="">
							<div class="form-control">
								<div class="form-field">
									<label>اكتب اسمك</label>
									<div class="field">
										<img src="{{asset('siteassets/images/contact/user.svg')}}">
										<input type="text" name="name" placeholder="| برجاء كتابة اسمك هنا">
									</div>
								</div>			
								<div class="form-field">
									<label>اكتب بريدك الإلكتروني</label>
									<div class="field">
										<img src="{{asset('siteassets/images/contact/sms.svg')}}">
										<input type="email" name="email" placeholder="| example@email.com">
									</div>
								</div>
							</div>			
							<div class="form-control">
								<div class="form-field">
									<label>اكتب رسالتك</label>
									<div class="field">
										<img src="{{asset('siteassets/images/contact/message-text.svg')}}">
										<textarea name="msg" placeholder="| على سبيل المثال: أريد التواصل معك"></textarea>
									</div>
								</div>			
							
							</div>
							<div class="form-control">
								<input type="submit" class="btn" name="send" value="ارسال">
							</div>
						</form>
					</div>
					<div class="col-6 col-md-6 col-sm-12">
						<figure class="contact-image">
							<img src="{{asset('siteassets/images/contact/main.svg')}}" alt="">
						</figure>
					</div>
				</div>
			</div>
		</article>
		<!-- Contact us Section -->


	</main>
@endsection