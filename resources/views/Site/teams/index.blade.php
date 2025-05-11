@extends('site')
@section('content')


	<main id="main">
		
		<!-- Banner -->
		<article class="banner">
			<img src="{{$Specialtie->img}}">
		</article>
		<!-- Banner -->

		<!-- Achievement Section -->
		<article class="achievement pd">
			<div class="container">

				<!-- About  -->
				<section class="about flex-start  text-right align-center">
					<div class="col-6 col-md-6 col-sm-12">
						<div class="about-desc">
							<span class="pre-title site-color"> {{$info->title}}</span>
							<h2 class="main-title">{{$info->sub_title}}</h2>
							<p class="main-para">{{$info->desc}}</p>
						</div>	
					</div>
					<div class="col-6 col-md-6 col-sm-12">
						<figure class="about-image">
							<img src="{{asset('siteassets/images/videos/medical/main.svg')}}" alt="">
						</figure>
					</div>
				</section>
				<!-- About  -->

	
					

			</div>
		</article>
		<!-- Achievement Section -->


		<article class="videos-section pd">
			<div class="container">
				<div class="flex-start">
					<div class="col-3 col-md-6 col-sm-12">
						<div class="aside-tabs">

                            @foreach ($Specialties as $data)
                                <a href="" class="aside-tab flex-between align-center">
                                    <div class="flex-1">
                                        <h3>{{$data->title}}</h3>
                                    </div>
                                    <i class="fa-solid fa-chevron-left"></i>
                                </a>			
                            @endforeach
						</div>
					</div>
					<div class="col-9 col-md-6 col-sm-12">
						<div class="all-videos-holder flex-center row-gab-15">


                            @foreach ($doctors as $row)
                                		<div class="col-6 col-md-6 col-sm-12">
                                    <div class="text-box">
                                        
                                        <img src="../images/videos/medical/persons/1.svg" width="60" height="60" alt="">
                                        <h4>{{$row->name}}</h4>
                                        <p class="feedback">
                                            استشاري أورام العين، من أطباء مصر المميزين في علاج أورام العين باستخدام أحدث التقنيات، وله خبرة كبيرة في علاج الأورام المستعصية والمتقدمة
                                        </p>
                                        <a href="#" class="show-profile">
                                            عرض الملف والحجز
                                        </a>
                                    </div>
                                </div>
                            @endforeach



						</div>
					</div>
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

@endsection