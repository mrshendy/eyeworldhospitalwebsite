<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Eye World</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('siteassets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('siteassets//css/main.css')}}">
</head>
<body>
	
	<!-- Header Section -->
	<header>
		<div class="container">
			<div class="flex-start align-center">
				<figure class="logo">
					<a href="">
						<img src="../images/logo.svg" alt="webiste logo">
					</a>
				</figure>
				<nav class="flex-1">
					<ul class="main-menu list-unstyled flex-center">
						<li class="menu-item selected"><a href="#">الرئيسية</a></li>
						<li class="menu-item has-children">
							<a href="#">تخصصاتنا</a>
							<ul class="sub-menu list-unstyled">
								<li><a href="#">طب و جراحة العيون</a></li>
								<li><a href="#">الجلدية</a></li>
								<li><a href="#">الاسنان</a></li>
							</ul>
						</li>
						<li class="menu-item"><a href="#">خدماتنا</a></li>
						<li class="menu-item"><a href="#">فريقنا</a></li>
						<li class="menu-item"><a href="#">أحدث الأجهزة الطبية</a></li>
						<li class="menu-item"><a href="#">السياحة العلاجية</a></li>
						<li class="menu-item"><a href="#">الأطباء</a></li>
					</ul>
				</nav>

				<div class="languages">
					<select name="lang">
						<option selected>En</option>
						<option>عربي</option>
					</select>
				</div>


				<div class="login-btns">
					<a class="login-btn btn" href="">
						<span>تسجيل الدخول</span>
						<i class="fa-solid fa-right-to-bracket"></i>
					</a>
				</div>
				
				<div class="bars">
					<i class="fa-solid fa-bars"></i>
				</div>

				<div class="user-logged-in flex-start">
					<a href="" class="head-icon flex-start align-center">
						<img src="../images/bag.svg">
						<span>السلة</span>
					</a>					

					<a href="" class="head-icon flex-start align-center">
						<img src="../images/profile-circle.svg">
						<span>مرحبا ندى</span>
					</a>
				</div>
			</div>
		</div>
	</header>
	<!-- Header Section -->


	<main id="main">
		
		<!-- sign section -->
		<article class="sign pd">

			<div class="container">

				<span class="pre-title site-color">ابدأ الآن في إنشاء حسابك لتكون دائمًا قريبًا من رعاية صحية عالية الجودة، ولتتمكن من إدارة مواعيدك الصحية بسهولة تامة.</span>
				<h2 class="main-title">قم بإنشاء حساب كمريض للوصول السريع إلى أفضل خدمات الرعاية الصحية والتشخيصية التي تناسب احتياجاتك وتضمن لك أفضل رعاية طبية.</h2>
				<p class="main-para"> يسعدنا أن نرحب بك في منصتنا الطبية! قم بإنشاء حساب كمريض لتتمكن من الوصول إلى أفضل الخدمات الصحية المتكاملة. بمجرد إنشاء حسابك، يمكنك حجز المواعيد، متابعة استشاراتك الطبية، والاستفادة من العروض والخدمات الصحية المتميزة. نحن هنا لتوفير الرعاية الصحية بأعلى المعايير لك ولعائلتك.</p>

				<section class="login pdt">

					<div class="tabs flex-center">
						<div data-class=".log-patient" class="active">التسجيل كمريض</div>
						<div data-class=".log-doctor">التسجيل كطبيب</div>
					</div>
					<div class="sign-box-title">
						<h2> سجل الدخول عبر</h2>
						<div class="social-login">
							<a href="#"><img src="../images/login/facebook.svg"></a>
							<a href="#"><img src="../images/login/google.svg"></a>
						</div>
					</div>

					<div class="or">
						<span>أو</span>
					</div>

					<div class="form-holder">
						<div class="log-doctor">
							<form class="custom-form text-right" action="">
												

								<div class="form-control">
									<div class="form-field">
										<label>اكتب بريدك الإلكتروني</label>
										<div class="field">
											<input type="email" name="email" placeholder="example@email.com">
										</div>
									</div>			
								</div>
								<div class="form-control">
									<div class="form-field">
										<label>كلمة المرور</label>
										<div class="field">
											<input type="password" name="password" placeholder="">
											<img class="eye" src="../images/login/eye.svg">
										</div>
									</div>			
								</div>

								<div class="form-control">
									<div class="form-field flex-between align-center">
										<span>
											<input type="checkbox" name=""> تذكرني
										</span>
										<a href="#">
											نسيت كلمة السر؟
										</a>
									</div>
								</div>
								<div class="form-control">
									<input type="submit" class="btn w-100" name="register" value="تسجيل الدخول">
								</div>
								<a href="#" class="have-not-account">ليس لديك حساب؟ أنشيء حساب</a>
							</form>
						</div>
						<div class="log-patient active">
							<form class="custom-form text-right"  action="">
												

								<div class="form-control">
									<div class="form-field">
										<label>الاسم</label>
										<div class="field">
											<input type="text" name="text" placeholder="محمد الشريف">
										</div>
									</div>			
								</div>			

								<div class="form-control">
									<div class="form-field">
										<label>اكتب بريدك الإلكتروني</label>
										<div class="field">
											<input type="email" name="email" placeholder="example@email.com">
										</div>
									</div>			
								</div>
								<div class="form-control">

									<div class="form-field">
										<label>الدولة</label>
										<div class="field">
											<input type="text" name="text" placeholder="مصر">
										</div>
									</div>	

									<div class="form-field">
										<label>رقم الهاتف</label>
										<div class="field">
											<input type="text" name="text" placeholder="+201012345678">
										</div>
									</div>			

								</div>
								<div class="form-control">
									<div class="form-field">
										<label>كلمة المرور</label>
										<div class="field">
											<input type="password" name="password" placeholder="">
											<img class="eye" src="../images/login/eye.svg">
										</div>
									</div>			
								</div>

								<div class="form-control">
									<div class="form-field flex-between align-center">
										<span>
											<input type="checkbox" name=""> تذكرني
										</span>
		
									</div>
								</div>
								<div class="form-control">
									<input type="submit" class="btn w-100" name="register" value="تسجيل الدخول">
								</div>
								<a href="#" class="have-not-account">لديك حساب؟  <span class="site-color"> تسجيل الدخول  </span></a>
							</form>
						</div>

					</div>
				</section>
			</div>

		</article>
		<!-- sign section -->


	</main>

	<!-- Footer -->

	<footer class="pd">
		<div class="container">
			<div class="flex-between">
				<div class="col-6 col-md-6 col-sm-12">
					<div class="footer-content">
						<div class="footer-logo">
						<img src="../images/footer/footer-logo.svg" alt="">
						</div>
						<h2 class="footer-title">مستشفى دنيا العيون هي الرائدة في تقديم خدمات طبية متكاملة ومتطورة لتلبية احتياجاتكم الصحية</h2>
						<p class="footer-desc">
							مستشفى دنيا العلوم هي وجهتك الأولى في مجال طب العيون، حيث نقدم خدمات متكاملة تبدأ من التشخيص الدقيق إلى العلاجات المتطورة. فريقنا يتكون من نخبة من الأطباء المتخصصين في كافة مجالات طب العيون، ويعملون باستخدام أحدث الأجهزة لتقديم أفضل رعاية صحية ممكنة لمرضانا.
						</p>
					</div>
				</div>
				<div class="col-3 col-md-6 col-sm-12">
					<ul class="list-unstyled footer-contact">
						<li>
							<div class="flex-start align-center">
								<img src="../images/footer/location.svg" alt="">
								<strong>العنوان : </strong>
							</div>
							<p>12 مصدق، الدقي، الدقي، محافظة الجيزة 12611</p>
						</li>		

						<li>
							<div class="flex-start align-center">
								<img src="../images/footer/call.svg" alt="">
								<strong>رقم الهاتف : </strong>
							</div>
							<p>01234567890 ،  01234567890</p>
						</li>		

						<li>
							<div class="flex-start align-center">
								<img src="../images/footer/msg.svg" alt="">
								<strong>االبريد الإلكتروني: </strong>
							</div>
							<p>info@eyeworldhospital.com</p>
						</li>
					</ul>
				</div>
				<div class="col-3 col-md-6 col-sm-12">
					<ul class="list-unstyled footer-contact">
						<li>
							<div class="flex-start align-center">
								<img src="../images/footer/msg2.svg" alt="">
								<strong>تواصل معنا</strong>
							</div>
						</li>		

						<li>
							<div class="flex-start align-center">
								<img src="../images/footer/stickynote.svg" alt="">
								<strong>الأسئلة الشائعة </strong>
							</div>
						</li>		

						<li>
							<div class="flex-start align-center">
								<img src="../images/footer/verify.svg" alt="">
								<strong>الشروط والأحكام </strong>
							</div>
						</li>		
						<li>
							<div class="flex-start align-center">
								<img src="../images/footer/stickynote.svg" alt="">
								<strong>سياسة الخصوصية</strong>
							</div>
						</li>
					</ul>
				</div>

			</div>
		</div>
	</footer>
	<!-- Footer -->
	<!-- Footer Bottom -->
	<article class="footer-bottom">
		<div class="container flex-between align-center">
			<p class="copyright">جميع حقوق النشر محفوظة لدي دنيا العيون @ 2025</p>
			<div class="socials flex-center align-center">
				<a href="#"><img src="../images/footer/youtube.svg"></a>
				<a href="#"><img src="../images/footer/instagram.svg"></a>
				<a href="#"><img src="../images/footer/snap.svg"></a>
				<a href="#"><img src="../images/footer/twitter.svg"></a>
				<a href="#"><img src="../images/footer/facebook.svg"></a>
			</div>
		</div>
	</article>
	<!-- Footer Bottom -->



	<!-- Scripts -->
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="{{asset('siteassets//js/owl.carousel.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('siteassets//js/main.js')}}"></script>

</body>
</html>