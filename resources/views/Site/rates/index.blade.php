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
                        <span class="pre-title site-color">{{$info->title}}</span>
                        <h2 class="main-title">{{$info->subtitle}}</h2>
                        <p class="main-para">{{$info->desc}}</p>
                    </div>	
                </div>
                <div class="col-6 col-md-6 col-sm-12">
                    <figure class="about-image">
                        <img src="{{asset('siteassets/images/videos/reviews/main.svg')}}" alt="">
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
                        <a href="" class="aside-tab flex-between align-center active">
                            <div class="flex-1">
                                <h3>مشاكل النظر وضعف الإبصار</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>				

                        <a href="" class="aside-tab flex-between align-center">
                            <div class="flex-1">
                                <h3>جراحات المياه البيضاء والزرقاء</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>

                        <a href="" class="aside-tab flex-between align-center">
                            <div class="flex-1">
                                <h3>التهابات العين المزمنة</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>


                        <a href="" class="aside-tab flex-between align-center">
                            <div class="flex-1">
                                <h3>مشاكل القرنية المخروطية</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>


                        <a href="" class="aside-tab flex-between align-center">
                            <div class="flex-1">
                                <h3>جراحات تصحيح النظر بالليزر</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>


                        <a href="" class="aside-tab flex-between align-center">
                            <div class="flex-1">
                                <h3>أورام العين وأمراضها النادرة</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>


                        <a href="" class="aside-tab flex-between align-center">
                            <div class="flex-1">
                                <h3>أمراض الشبكية والانفصال الشبكي</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>


                        <a href="" class="aside-tab flex-between align-center">
                            <div class="flex-1">
                                <h3>أمراض الأطفال المتعلقة بالعيون</h3>
                            </div>
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>




                    </div>
                </div>
                <div class="col-9 col-md-6 col-sm-12">
                    <div class="all-videos-holder flex-center row-gab-15">

                        <div class="col-6 col-md-6 col-sm-12">
                            <div class="text-box">
                                <div class="flex-start align-center">
                                    <img src="../images/videos/reviews/persons/1.svg" width="64" height="64" alt="">
                                    <div class="flex-1">
                                        <h4>محمد عبد الله</h4>
                                        <img src="../images/videos/reviews/stars.svg"  alt="">
                                    </div>
                                </div>
                                <p class="feedback">
                                    نتائج رائعة بعد علاج ضعف النظر، أصبحت أستطيع القيادة ليلاً بثقة أكبر.
                                </p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6 col-sm-12">
                            <div class="text-box">
                                <div class="flex-start align-center">
                                    <img src="../images/videos/reviews/persons/2.svg" width="64" height="64" alt="">
                                    <div class="flex-1">
                                        <h4>
                                            سارة إبراهيم
                                        </h4>
                                        <img src="../images/videos/reviews/stars.svg"  alt="">
                                    </div>
                                </div>
                                <p class="feedback">
                                    تجربة ممتازة مع فريق طبي محترف، شعرت بالتحسن من الجلسة الأولى.
                                </p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6 col-sm-12">
                            <div class="text-box">
                                <div class="flex-start align-center">
                                    <img src="../images/videos/reviews/persons/3.svg" width="64" height="64" alt="">
                                    <div class="flex-1">
                                        <h4>منة الله علاء</h4>
                                        <img src="../images/videos/reviews/stars.svg"  alt="">
                                    </div>
                                </div>
                                <p class="feedback">
                                    فحوصات دقيقة وعلاج فعال، أنصح الجميع بزيارة هذه العيادة.
                                </p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6 col-sm-12">
                            <div class="text-box">
                                <div class="flex-start align-center">
                                    <img src="../images/videos/reviews/persons/4.svg" width="64" height="64" alt="">
                                    <div class="flex-1">
                                        <h4>أحمد مصطفى</h4>
                                        <img src="../images/videos/reviews/stars.svg"  alt="">
                                    </div>
                                </div>
                                <p class="feedback">
                                    شكراً لكم على جودة الخدمة، أرى بوضوح أفضل بعد العلاج المميز.
                                </p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6 col-sm-12">
                            <div class="text-box">
                                <div class="flex-start align-center">
                                    <img src="../images/videos/reviews/persons/5.svg" width="64" height="64" alt="">
                                    <div class="flex-1">
                                        <h4>خالد حسن</h4>
                                        <img src="../images/videos/reviews/stars.svg"  alt="">
                                    </div>
                                </div>
                                <p class="feedback">
                                    علاج ضعف الإبصار غير حياتي، أصبحت أستمتع بوقتي أكثر الآن.
                                </p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6 col-sm-12">
                            <div class="text-box">
                                <div class="flex-start align-center">
                                    <img src="../images/videos/reviews/persons/6.svg" width="64" height="64" alt="">
                                    <div class="flex-1">
                                        <h4>نور الهدى محمد</h4>
                                        <img src="../images/videos/reviews/stars.svg"  alt="">
                                    </div>
                                </div>
                                <p class="feedback">
                                    شكراً على الدعم الطبي الممتاز والاهتمام بالتفاصيل خلال العلاج.
                                </p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6 col-sm-12">
                            <div class="text-box">
                                <div class="flex-start align-center">
                                    <img src="../images/videos/reviews/persons/7.svg" width="64" height="64" alt="">
                                    <div class="flex-1">
                                        <h4>آية محمود</h4>
                                        <img src="../images/videos/reviews/stars.svg"  alt="">
                                    </div>
                                </div>
                                <p class="feedback">
                                    أفضل قرار اتخذته هو اختيار هذه العيادة للعلاج، شكراً لكم!
                                </p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6 col-sm-12">
                            <div class="text-box">
                                <div class="flex-start align-center">
                                    <img src="../images/videos/reviews/persons/8.svg" width="64" height="64" alt="">
                                    <div class="flex-1">
                                        <h4>حسن علي</h4>
                                        <img src="../images/videos/reviews/stars.svg"  alt="">
                                    </div>
                                </div>
                                <p class="feedback">
                                    لم أكن أتوقع هذه النتائج السريعة، أشعر وكأنها حياة جديدة.
                                </p>
                            </div>
                        </div>

        

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