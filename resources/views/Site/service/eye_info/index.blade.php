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
                        <span class="pre-title site-color">{{$data->title}}</span>
                        <h2 class="main-title">{{$data->subtitle}}</h2>
                        <p class="main-para">{{$data->desc}}
                        </p>
                    </div>	
                </div>
                <div class="col-6 col-md-6 col-sm-12">
                    <figure class="about-image">
                        <img src="{{asset('siteassets/images/events/main.svg')}}" alt="">
                    </figure>
                </div>
            </section>
            <!-- About  -->


                

        </div>
    </article>
    <!-- Achievement Section -->

    <!-- Doctors Section -->
    <article class="doctors pd">
        <div class="container">

            <span class="pre-title site-color">{{$data->detail_title}}</span>
            <h2 class="main-title">{{$data->detail_subtitle}}</h2>
            <p class="main-para">{{$data->detail_desc}}
            
            <div class="doctors-blocks pdt">
                <div class="flex-start row-gap-15">


                    @foreach ($articles as $article)

                        <div class="col-3 col-md-6 col-sm-12">
                            <div class="doctor">
                                <figure>
                                    <img src="{{$article->img}}">
                                </figure>
                                <div class="doctor-dtl">
                                    <h3>{{$article->title}}</h3>
                                    <p>{{$article->desc}}</p>
                                    <a href="#">
                                        إقرأ المزيد
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                    @endforeach

                  
{{-- 
                    <div class="col-3 col-md-6 col-sm-12">
                        <div class="doctor">
                            <figure>
                                <img src="{{asset('siteassets/images/events/2.svg')}}">
                            </figure>
                            <div class="doctor-dtl">
                                <h3>طرق للحفاظ على صحة العين</h3>
                                <p>من خلال اتباع نظام غذائي صحي، والحفاظ على الراحة، وارتداء النظارات الواقية أثناء التعرض للأشعة أو الغبار</p>
                                <a href="#">
                                    إقرأ المزيد
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 col-md-6 col-sm-12">
                        <div class="doctor">
                            <figure>
                                <img src="{{asset('siteassets/images/events/3.svg')}}">
                            </figure>
                            <div class="doctor-dtl">
                                <h3>دور التغذية في صحة العين</h3>
                                <p>الأطعمة الغنية بفيتامين A مثل الجزر والخضروات الورقية مهمة للحفاظ على صحة الشبكية والوقاية من الأمراض</p>
                                <a href="#">
                                    إقرأ المزيد
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 col-md-6 col-sm-12">
                        <div class="doctor">
                            <figure>
                                <img src="{{asset('siteassets/images/events/4.svg')}}">
                            </figure>
                            <div class="doctor-dtl">
                                <h3>العوامل التي تؤثر على صحة العين</h3>
                                <p>العوامل الوراثية والتعرض للأشعة فوق البنفسجية يمكن أن تؤثر سلبًا على صحة العين. </p>
                                <a href="#">
                                    إقرأ المزيد
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 col-md-6 col-sm-12">
                        <div class="doctor">
                            <figure>
                                <img src="{{asset('siteassets/images/events/5.svg')}}">
                            </figure>
                            <div class="doctor-dtl">
                                <h3>فحص العين المنتظم للكبار </h3>
                                <p>على البالغين إجراء فحص عيون سنويًا للكشف المبكر عن أمراض مثل المياه البيضاء أو الزرقاء التي قد تؤثر على الرؤية </p>
                                <a href="#">
                                    إقرأ المزيد
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 col-md-6 col-sm-12">
                        <div class="doctor">
                            <figure>
                                <img src="{{asset('siteassets/images/events/6.svg')}}">
                            </figure>
                            <div class="doctor-dtl">
                                <h3>التحكم في مرض السكري و العين</h3>
                                <p>قد يسبب اعتلال الشبكية السكري، لذا من المهم متابعة مستويات السكر في الدم بشكل مستمر لضمان صحة العين</p>
                                <a href="#">
                                    إقرأ المزيد
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 col-md-6 col-sm-12">
                        <div class="doctor">
                            <figure>
                                <img src="{{asset('siteassets/images/events/7.svg')}}">
                            </figure>
                            <div class="doctor-dtl">
                                <h3>تأثير التدخين على العين</h3>
                                <p>يزيد من خطر الإصابة بأمراض مثل إعتام عدسة العين والضمور البقعي، مما يضر برؤية الشخص بشكل دائم</p>
                                <a href="#">
                                    إقرأ المزيد
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 col-md-6 col-sm-12">
                        <div class="doctor">
                            <figure>
                                <img src="{{asset('siteassets/images/events/8.svg')}}">
                            </figure>
                            <div class="doctor-dtl">
                                <h3>أهمية ارتداء النظارات الواقية</h3>
                                <p>يجب على الأشخاص الذين يعملون في بيئات تحتوي على مواد ضارة أو يتعرضون للأشعة فوق البنفسجية ارتداء النظارات</p>
                                <a href="#">
                                    إقرأ المزيد
                                </a>
                            </div>
                        </div>
                    </div> --}}


                </div>
            </div>
                

        </div>
    </article>
    <!-- Doctors Section -->


    <!-- Content Section -->
    <article class="content-section pd">
        <div class="container text-center">
            <span class="pre-title site-color">تمتع بأحدث الأجهزة الطبية لتشخيص وعلاج أورام العين بدقة عالية، نحن نقدم لك أحدث الابتكارات التقنية لضمان صحتك</span>
            <h2 class="main-title">أحدث أجهزة التكنولوجيا الطبية المتطورة لتشخيص وعلاج أورام العين بدقة عالية لتوفير أفضل العناية الصحية</h2>
            <p class="main-para">نحن نقدم أحدث الأجهزة الطبية المتطورة المستخدمة في تشخيص وعلاج أورام العين. تتميز هذه الأجهزة بدقتها الفائقة وقدرتها على تحديد الأورام بدقة، مما يساعد في اختيار العلاج الأنسب لكل حالة. فريقنا الطبي المتخصص يستخدم هذه الأجهزة لتحقيق أفضل النتائج وضمان رعاية صحية متميزة.</p>

            <!-- About  -->
            <section class="about flex-start pdt  text-right align-center">
                <div class="col-6 col-md-6 col-sm-12">
                    <figure class="about-image">
                        <img src="{{asset('siteassets/images/events/about.svg')}}" alt="">
                    </figure>
                </div>
                <div class="col-6 col-md-6 col-sm-12">
                    <div class="about-desc">
                        <h2 class="main-title">جهاز OCT (التصوير المقطعي للعين)</h2>
                        <p class="main-para">جهاز OCT يستخدم للتصوير الدقيق للطبقات الداخلية للعين، يساعد في تشخيص الأورام الشبكية والتغيرات المرضية في العين.
                        </p>
                    </div>	
                </div>
            </section>
            <!-- About  -->
        </div>
    </article>
    <!-- Content Section -->

    <!-- Success Stories section -->
    <article class="success-stories  text-center pd">
        <div class="container">
            <span class="pre-title site-color">قصص نجاح ملهمة لأشخاص تغلبوا على تحديات أورام العين، تجد هنا الأمل والتشجيع في كل تجربة</span>
            <h2 class="main-title">تجارب مرضى أورام العين الملهمة، كيف تغلبوا على التحديات الصحية واستعادوا حياتهم الطبيعية بعد العلاج</h2>
            <p class="main-para">نقدم لك مجموعة من القصص الملهمة لمرضى تغلبوا على أورام العين بفضل العناية الطبية المتقدمة والالتزام بالعلاج. هذه التجارب تبرز القوة الداخلية للأفراد، وتمنح الأمل لمن يواجهون نفس التحديات، مما يعزز الثقة في العلاج وقدرة الإنسان على الشفاء.</p>

            <div class="success-stories-carousel pdt owl-carousel">
                <div class="item">
                    <div class="video-holder">
                        <img src="{{asset('siteassets/images/events/video.svg')}}">
                        <a href="#" class="play">
                            <img  src="{{asset('siteassets/images/events/play.png')}}">
                        </a>
                    </div>
                    <div class="success-dtl pdt text-center">
                        <h2 class="main-title">أحمد سامي: نجاح بعد علاج أورام الشبكية</h2>
                        <p>أحمد، الذي كان يعاني من ورم في شبكية العين، خضع للعلاج المكثف باستخدام تقنيات الليزر الحديثة، والآن عاد لرؤية العالم بوضوح وتمتع بحياة طبيعية.</p>
                    </div>
                </div>
            </div>

        </div>
    </article>
    <!-- Success Stories section -->

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