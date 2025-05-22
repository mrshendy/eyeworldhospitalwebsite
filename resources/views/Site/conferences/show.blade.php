@extends('site')

@section('content')


	<main id="main">

		<!-- Achievement Section -->
		<article class="achievement pd">
			<div class="container">

				<!-- About  -->
				<section class="about flex-start  text-right align-center">
					<div class="col-6 col-md-6 col-sm-12">
						<div class="about-desc">
							<h2 class="main-title">{{ $conference->title }}</h2>
							<p class="main-para">
                                {{ $conference->detail_description }}
                            </p>
						</div>
					</div>
					<div class="col-6 col-md-6 col-sm-12">
						<figure class="about-image">
							<img src="{{ asset('uploads/conferences/' . $conference->img) }}" alt="">
						</figure>
					</div>
				</section>
                <!-- About  -->
			</div>
		</article>

		<!-- current conferences Section -->

		<article class="videos-section pd">
			<div class="container">

				<h2 class="main-title">
					من المؤتمرات العلمية الحالية
				</h2>



				<div class="all-videos-holder height-auto flex-center row-gab-15">

					<div class="col-4 col-md-6 col-sm-12">
						<div class="text-box ">
							<div class="device-image">
								<img src="../images/medical/conferences/1.svg" alt="">
							</div>
							<h4>دور الذكاء الاصطناعي في الطب الحديث</h4>
							<p class="feedback">
								يناقش المؤتمر تطبيقات الذكاء الاصطناعي في الطب، وكيفية استخدامه لتحسين تشخيص الأمراض
								وتخصيص العلاجات.
							</p>
							<p class="time-date">
								<img src="../images/medical/conferences/calendar.svg" alt="" width="32">
								<span>15-17 يناير 2025</span>
							</p>
							<a href="#" class="show-profile">
							عرض الكتب
							</a>
						</div>
					</div>

					<div class="col-4 col-md-6 col-sm-12">
						<div class="text-box ">
							<div class="device-image">
								<img src="../images/medical/conferences/2.svg" alt="">
							</div>
							<h4>مستقبل الجراحة بالروبوت والتكنولوجيا الحديثة</h4>
							<p class="feedback">
								مؤتمر يتناول التطورات الحديثة في الجراحة الروبوتية وكيفية تحسين دقة العمليات الجراحية باستخدام أحدث التقنيات.
							</p>
							<p class="time-date">
								<img src="../images/medical/conferences/calendar.svg" alt="" width="32">
								<span>15-17 يناير 2025</span>
							</p>
							<a href="#" class="show-profile">
							عرض الكتب
							</a>
						</div>
					</div>

					<div class="col-4 col-md-6 col-sm-12">
						<div class="text-box">
							<div class="device-image">
								<img src="../images/medical/conferences/3.svg" alt="">
							</div>
							<h4>
								الابتكارات في علاج الأمراض العصبية
							</h4>
							<p class="feedback">
								يسلط المؤتمر الضوء على الأبحاث الحديثة في علاج الأمراض العصبية وكيفية استخدام التقنيات الحديثة لتحسين العلاجات المتاحة.
							</p>
							<p class="time-date">
								<img src="../images/medical/conferences/calendar.svg" alt="" width="32">
								<span>15-17 يناير 2025</span>
							</p>
							<a href="#" class="show-profile">
							عرض الكتب
							</a>
						</div>
					</div>

				</div>


			</div>
		</article>
		<!-- current conferences Section -->

		<!-- previous conferences Section -->

		<article class="videos-section pd">
			<div class="container">

				<h2 class="main-title">
					من المؤتمرات العلمية السابقة
				</h2>



				<div class="all-videos-holder height-auto flex-center row-gab-15">

					<div class="col-4 col-md-6 col-sm-12">
						<div class="text-box ">
							<div class="device-image">
								<img src="../images/medical/conferences/4.svg" alt="">
							</div>
							<h4>علاج السرطان: التوجهات المستقبلية</h4>
							<p class="feedback">
								استعرض المؤتمر أحدث الأساليب في علاج السرطان وكيفية دمج العلاجات التقليدية مع الابتكارات الطبية الحديثة.
							</p>
							<p class="time-date">
								<img src="../images/medical/conferences/calendar.svg" alt="" width="32">
								<span>15-17 يناير 2025</span>
							</p>
							<a href="#" class="show-profile">
							عرض الكتب
							</a>
						</div>
					</div>

					<div class="col-4 col-md-6 col-sm-12">
						<div class="text-box ">
							<div class="device-image">
								<img src="../images/medical/conferences/5.svg" alt="">
							</div>
							<h4>جراحة القلب: الابتكارات والتقنيات الجديدة</h4>
							<p class="feedback">
								كان هذا المؤتمر منصة للتبادل العلمي حول أحدث تقنيات جراحة القلب وكيفية تحسين نتائج العمليات الجراحية. 
							</p>
							<p class="time-date">
								<img src="../images/medical/conferences/calendar.svg" alt="" width="32">
								<span>15-17 يناير 2025</span>
							</p>
							<a href="#" class="show-profile">
							عرض الكتب
							</a>
						</div>
					</div>

					<div class="col-4 col-md-6 col-sm-12">
						<div class="text-box">
							<div class="device-image">
								<img src="../images/medical/conferences/6.svg" alt="">
							</div>
							<h4>
								مستقبل الطب الشخصي: الجينات والعلاج
							</h4>
							<p class="feedback">
							تناول المؤتمر موضوع الطب الشخصي باستخدام تقنيات الجينات لتخصيص العلاجات حسب احتياجات كل مريض.
							</p>
							<p class="time-date">
								<img src="../images/medical/conferences/calendar.svg" alt="" width="32">
								<span>15-17 يناير 2025</span>
							</p>
							<a href="#" class="show-profile">
							عرض الكتب
							</a>
						</div>
					</div>

				</div>


			</div>
		</article>

		<!-- previous conferences Section -->


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
										<img src="../images/contact/user.svg">
										<input type="text" name="name" placeholder="| برجاء كتابة اسمك هنا">
									</div>
								</div>
								<div class="form-field">
									<label>اكتب بريدك الإلكتروني</label>
									<div class="field">
										<img src="../images/contact/sms.svg">
										<input type="email" name="email" placeholder="| example@email.com">
									</div>
								</div>
							</div>
							<div class="form-control">
								<div class="form-field">
									<label>اكتب رسالتك</label>
									<div class="field">
										<img src="../images/contact/message-text.svg">
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
							<img src="../images/contact/main.svg" alt="">
						</figure>
					</div>
				</div>
			</div>
		</article>
		<!-- Contact us Section -->


	</main>

    @include('components.contact-us')

@endsection
