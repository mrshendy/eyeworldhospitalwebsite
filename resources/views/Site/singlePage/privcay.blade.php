@extends('site')

@section('content')
	<main id="main">

		<!-- Banner -->
		 <article class="banner">
            <img src="{{asset('uploads/medical-devices/banner.jpg')}}">
        </article>
		<!-- Banner -->

		<article class="single">
			<div class="container">
				<h2 class="main-title">سياسة الخصوصية</h2>

				 <p>نحن في دنيا العلوم نحترم خصوصيتك ونعمل على حماية معلوماتك الشخصية وفقًا لأعلى معايير الأمان. تشرح هذه السياسة كيفية جمع واستخدام وحماية البيانات التي يتم جمعها منك عند استخدامك لخدماتنا.</p>

				        <h2>1. المعلومات التي نجمعها</h2>
				        <ul>
				            <li><strong>المعلومات الشخصية:</strong> مثل الاسم، العنوان، رقم الهاتف، وعنوان البريد الإلكتروني.</li>
				            <li><strong>المعلومات التقنية:</strong> مثل عنوان الـ IP، نوع المتصفح، ونظام التشغيل.</li>
				            <li><strong>المعلومات الأخرى:</strong> مثل البيانات التي تقدمها عند التفاعل مع خدماتنا أو طلب الدعم.</li>
				        </ul>

				        <h2>2. كيفية استخدام المعلومات</h2>
				        <ul>
				            <li>تحسين وتخصيص خدماتنا.</li>
				            <li>التواصل معك لتقديم التحديثات والعروض.</li>
				            <li>معالجة الطلبات أو المعاملات المتعلقة بالخدمات.</li>
				            <li>تحسين تجربة المستخدم ودعم العملاء.</li>
				        </ul>

				        <h2>3. حماية المعلومات</h2>
				        <p>نحن نتخذ كافة التدابير اللازمة لحماية معلوماتك الشخصية من الوصول غير المصرح به باستخدام تقنيات الأمان الحديثة.</p>

				        <h2>4. مشاركة المعلومات مع أطراف ثالثة</h2>
				        <p>نحن لا نبيع أو نؤجر معلوماتك الشخصية، ولكن قد نشاركها في حالات محددة مثل تنفيذ الخدمات أو الامتثال للمتطلبات القانونية.</p>

				        <h2>5. ملفات تعريف الارتباط (الكوكيز)</h2>
				        <p>نستخدم الكوكيز لتحسين تجربتك. يمكنك التحكم بها عبر إعدادات المتصفح.</p>

				        <h2>6. الوصول إلى معلوماتك وتحديثها</h2>
				        <p>يحق لك الوصول إلى معلوماتك الشخصية وتحديثها أو حذفها عند الحاجة.</p>

				        <h2>7. التعديلات على سياسة الخصوصية</h2>
				        <p>قد نقوم بتحديث هذه السياسة من وقت لآخر، وسيتم نشر أي تغييرات هنا.</p>

				        <h2>8. حماية الأطفال</h2>
				        <p>خدماتنا غير موجهة للأطفال تحت سن 13 عامًا، ولن نقوم بجمع بياناتهم عن قصد.</p>

				        <h2>9. التواصل معنا</h2>
				        <p>إذا كان لديك أي استفسارات، يمكنك الاتصال بنا عبر البريد الإلكتروني أو الهاتف.</p>

				        <p><strong>نحن ملتزمون بحماية خصوصيتك وضمان أن بياناتك الشخصية يتم معالجتها وفقًا لأعلى المعايير الأمنية.</strong></p>
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

    @include('components.contact-us')
@endsection
