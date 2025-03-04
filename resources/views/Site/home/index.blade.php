@extends('site')
@section('content')


<main id="main">
    <!-- Slider Section -->
    <article class="slider">
        <div class="owl-slider owl-carousel">
            <div class="item" style="background-image:url({{asset('siteassets/images/slider/1.jpg')}})">
                <div class="container h-100">
                    <div class="slider-details h-100 flex-column">
                        <h4 class="slider-pre-title">
                            <img src="{{asset('siteassets/images/slider/icon.svg')}}" alt="icon">
                            <span>مستشفى دنيا العيون - نظرك أمانتك!</span>
                        </h4>
                        <h2 class="slider-title">
                            أحدث تقنيات طب العيون بين  <br>يديك مع خبراء متميزين
                        </h2>
                        <p class="slider-desc">
                            نقدم خدمات شاملة ومتخصصة في طب العيون مع فريق من الاستشاريين  <br> وأحدث الأجهزة لتوفير رعاية طبية عالية الجودة لعينيك
                        </p>
                    </div>
                </div>
            </div>				
            <div class="item" style="background-image:url({{asset('siteassets/images/slider/2.jpg')}})">
                <div class="container h-100">
                    <div class="slider-details h-100 flex-column">
                        <h4 class="slider-pre-title">
                            <img src="{{asset('siteassets/images/slider/icon.svg')}}" alt="icon">
                            <span>رؤيتك مستقبلنا، ودنيا العيون مكانك</span>
                        </h4>
                        <h2 class="slider-title">
                            معايير عالمية في علاج أمراض<br> العيون بأيدي خبراء
                        </h2>
                        <p class="slider-desc">
                            نسواء كنت تبحث عن حلول للمياه البيضاء، الشبكية، أو تصحيح الإبصار، <br>مستشفى دنيا العيون تقدم لك رعاية طبية متكاملة على مدار الساعة
                        </p>
                    </div>
                </div>
            </div>				
            <div class="item" style="background-image:url({{asset('siteassets/images/slider/3.jpg')}})">
                <div class="container h-100">
                    <div class="slider-details h-100 flex-column">
                        <h4 class="slider-pre-title">
                            <img src="{{asset('siteassets/images/slider/icon.svg')}}" alt="icon">
                            <span>عيونك تستحق الأفضل، ونحن هنا لتحقيقه</span>
                        </h4>
                        <h2 class="slider-title">
                            أفضل فريق طبي للعيون بأحدث<br> تقنيات جراحية متطورة
                        </h2>
                        <p class="slider-desc">
                        من الاستشاريين إلى أحدث الأجهزة، نقدم في دنيا العيون  تجربة طبية مميزة <br>تتماشى مع أعلى معايير الجودة والاهتمام الفردي بكل حالة
                        </p>
                    </div>
                </div>
            </div>				
            <div class="item" style="background-image:url({{asset('siteassets/images/slider/4.jpg')}})">
                <div class="container h-100">
                    <div class="slider-details h-100 flex-column">
                        <h4 class="slider-pre-title">
                            <img src="{{asset('siteassets/images/slider/icon.svg')}}" alt="icon">
                            <span>رعايتك البصرية أولويتنا في دنيا العيون</span>
                        </h4>
                        <h2 class="slider-title">
                            أكثر من مليون كشف طبي<br> لخدمة رؤيتك بامتياز
                        </h2>
                        <p class="slider-desc">
                        مستشفى دنيا العيون توفر رعاية طبية متخصصة وشاملة في مجال العيون<br> لتلبية احتياجاتك بدقة وبأعلى جودة ممكنة
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-numbers">04-01</div>
        <div class="owl-thumbnails"></div> <!-- Custom Dots Container -->
    </article>
    <!-- Slider Section -->

    <!-- Achievement Section -->
    <article class="achievement text-center pd">
        <div class="container">
            <span class="pre-title site-color">{{__('Our achievements speak for our leadership in the field of ophthalmology.')}}</span>
            <h2 class="main-title">{{__('Amazing statistics prove our position as pioneers in medical eye care services.')}}</h2>
            <p class="main-para">{{__('Since its establishment in 2004, Dunya Eye Hospital has achieved record-breaking milestones in the field of ophthalmology. We constantly strive for excellence through thousands of successful surgeries and medical examinations. These achievements reflect our commitment to providing top-quality medical services and making a positive impact on our patients\' lives.')}}</p>

            <!-- Counter -->
            <section class="counter flex-center pdt">
                <div class="col-3 col-sm-6 col-xs-12">
                    <div class="counter-box">
                        <strong class="number">1000+</strong>
                        <p class="value">عملية جراحية ناجحة</p>
                    </div>
                </div>				

                <div class="col-3 col-sm-6 col-xs-12">
                    <div class="counter-box">
                        <strong class="number">5000+</strong>
                        <p class="value"> عملية مياه بيضاء بدقة متناهية</p>
                    </div>
                </div>				

                <div class="col-3 col-sm-6 col-xs-12">
                    <div class="counter-box">
                        <strong class="number">748+</strong>
                        <p class="value">عملية ليزك لتصحيح الإبصار</p>
                    </div>
                </div>				

                <div class="col-3 col-sm-6 col-xs-12">
                    <div class="counter-box">
                        <strong class="number">1+</strong>
                        <p class="value">مليون كشف طبي شامل</p>
                    </div>
                </div>
            </section>
            <!-- Counter -->

            <!-- About  -->
            <section class="about flex-start  text-right align-center">
                <div class="col-6 col-md-6 col-sm-12">
                    <div class="about-desc">
                        <span class="pre-title site-color">{{$about->title}}</span>
                        <h2 class="main-title">{{$about->sub_title}}</h2>
                        <p class="main-para">
                                 {{$about->desc}}
                        </p>
                    </div>	
                </div>
                <div class="col-6 col-md-6 col-sm-12">
                    <figure class="about-image">
                        <img src="{{asset('siteassets/images/about.svg')}}" alt="">
                    </figure>
                </div>
            </section>
            <!-- About  -->

        </div>
    </article>
    <!-- Achievement Section -->

    <!-- Service Section -->
    <article class="services pd">
        <div class="bk" style="background-image:url({{asset('siteassets/images/services.svg')}})"></div>
        <div class="container">
            <h2 class="main-title site-color">خدمات  TOP CARE </h2>
            <div class="flex-start pdb align-center">
                <div class="col-6 col-md-12">
                    <p class="main-para pdl">
                        خدمات طبية منبسقة من مؤسسة مستشفى دنيا العيون  المتخصصة فى مجال طب وجراحة العيون لتقديم الرعاية الصحيه لمرضى العيون فى مجال الرعاية التشخصيه والعلاجية وخدمات الليزك والليزر والعمليات الجراحية المرتبطة بصحة العين والنظر. 
                    </p>
                </div>
                <div class="col-6 col-md-12">
                    <p class="main-para pdr">
                        تضم نخبة من الأساتذة والإستشاريين فى مختلف التخصصات الدقيقة لأمراض العيون مثل المياه البيضاء ، والزرقاء ، جراحة القرنية والحول ، وأمراض الشبكية والقناة الدمعية والجفون والجراحات التجميلية ,أورام العيون و كذلك أورام الشبكية فى الأطفال "Retinoblastoma ".
                    </p>
                </div>
            </div>
            <h4 class="h4">
                بالاضافة الى ما ذكر فى مجال طب العيون فان الخدمات الأخرى تتمثل فى:
            </h4>
            <ul class="list-unstyled flex-start services-list">
                <li>
                    <img src="{{asset('siteassets/images/arrow-down.svg')}}" alt="">
                    جراحات التجميل فى الوجة و الراس
                </li>					
                <li>
                    <img src="{{asset('siteassets/images/arrow-down.svg')}}" alt="">
                    الجراحات التجميلية
                </li>					
                <li>
                    <img src="{{asset('siteassets/images/arrow-down.svg')}}" alt="">
                    جراحات الفم و الفكيين
                </li>					
                <li>
                    <img src="{{asset('siteassets/images/arrow-down.svg')}}" alt="">
                    خدمات الامراض الجلدية و الليزر
                </li>					
                <li>
                    <img src="{{asset('siteassets/images/arrow-down.svg')}}" alt="">
                    خدمات  التغذية
                </li>					
                <li>
                    <img src="{{asset('siteassets/images/arrow-down.svg')}}" alt="">
                    خدمات المختبر
                </li>
                <li>
                    <img src="{{asset('siteassets/images/arrow-down.svg')}}" alt="">
                    خدمات الصيدلية
                </li>
                <li>
                    <img src="{{asset('siteassets/images/arrow-down.svg')}}" alt="">
                    خدمات الاقامة
                </li>
                <li>
                    <img src="{{asset('siteassets/images/arrow-down.svg')}}" alt="">
                    خدمات اخرى
                </li>
            </ul>
        </div>
    </article>
    <!-- Service Section -->

    <!-- Discover Section -->
    <article class="discover pd">
        <div class="container">
            <span class="pre-title site-color">استكشف التخصصات الطبية المتنوعة لتلبية احتياجاتك الصحية.</span>
            <h2 class="main-title"> اختر التخصص الطبي المناسب لاحتياجاتك الصحية من<br> بين تخصصاتنا المتنوعة.</h2>
            <p class="main-para">Description: نقدم لك مجموعة واسعة من التخصصات الطبية التي تشمل العيون، الأسنان، الجلدية، والجراحة وغيرهم. احصل على رعاية صحية شاملة من متخصصين ذوي خبرة لمساعدتك في الحفاظ على صحتك وعافيتك.</p>

            <div class="flex-center discover-row pdt">
                <div class="col-4 col-sm-6 col-xs-12">
                    <div class="discover-box" style="background-image:url({{asset('siteassets/images/discover/1.svg')}})">
                        <div class="discover-box-content">
                        <span>طب وجراحة العيون</span>
                            <p>رؤيتك تهمنا! نقدم لك رعاية متكاملة لصحة عيونك، من فحوصات النظر وتصحيح الإبصار إلى جراحات العيون المتقدمة، لنضمن لك رؤية أوضح وحياة أكثر راحة.</p>
                            <a href="#">اعرف المزيد</a>
                        </div>
                    </div>
                </div>				

                <div class="col-4 col-sm-6 col-xs-12">
                    <div class="discover-box" style="background-image:url({{asset('siteassets/images/discover/2.svg')}})">
                        <div class="discover-box-content">
                            <span>الجلدية</span>
                            <p>استعد لبشرة صحية ومشرقة مع أطباء الجلدية المتخصصين، حيث نقدم أحدث العلاجات لحب الشباب، التصبغات، تساقط الشعر، والأمراض الجلدية، مع تقنيات متطورة لضمان أفضل النتائج لبشرتك.</p>
                            <a href="#">اعرف المزيد</a>
                        </div>
                    </div>
                </div>				

                <div class="col-4 col-sm-6 col-xs-12">
                    <div class="discover-box" style="background-image:url({{asset('siteassets/images/discover/3.svg')}})">
                        <div class="discover-box-content">
                            <span>الأسنان</span>
                            <p>ابتسامة صحية تبدأ بأسنان قوية! نوفر لك جميع خدمات العناية بالأسنان، من التنظيف والتبييض إلى الزراعة والتقويم، لضمان صحة فموية مثالية وابتسامة مشرقة تدوم طويلاً.</p>
                            <a href="#">اعرف المزيد</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </article>
    <!-- Discover Section -->

    <!-- Discover two Section -->
    <article class="discover pd">
        <div class="container">
            <div class="flex-between pdb">
                <div>
                    <span class="pre-title site-color">استكشف أبرز إنجازاتنا ومشاركاتنا في الفعاليات والمؤتمرات الطبية</span>
                    <h2 class="main-title">مشاركاتنا وإنجازاتنا المتميزة في أهم الفعاليات <br>والمؤتمرات الطبية والعلمية</h2>
                </div>
                <a href="#" class="site-color">
                    عرض المزيد من الفعاليات
                </a>
            </div>
            <p class="main-para">نعتز بمشاركاتنا في الفعاليات والمؤتمرات الطبية، حيث نقدم أحدث التقنيات ونشارك خبراتنا مع المجتمع الطبي. نهدف لتبادل المعرفة وإبراز ريادتنا في مجال طب وجراحة العيون من خلال هذه الأحداث المميزة.</p>

            <div class="flex-center discover-row pdt">
                <div class="col-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="discover-box discover-box-2" style="background-image:url({{asset('siteassets/images/discover/4.svg')}})">
                        <div class="discover-box-details">
                            <h3>مؤتمر التكنولوجيا الحديثة في جراحة العيون 2024</h3>
                            <p>عرضنا أحدث التقنيات لجراحة العيون بمشاركة نخبة من الأطباء والخبراء.</p>
                            <a href="#">
                                اقرأ المزيد
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                        </div>
                    </div>
                </div>				
                <div class="col-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="discover-box discover-box-2" style="background-image:url({{asset('siteassets/images/discover/5.svg')}})">
                        <div class="discover-box-details">
                            <h3>الملتقى العربي لتطوير علاجات أمراض الشبكية</h3>
                            <p>تدريب متخصصين على أحدث تقنيات الليزر لعلاج وتصحيح الإبصار.</p>
                            <a href="#">
                                اقرأ المزيد
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                        </div>
                    </div>
                </div>				
                <div class="col-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="discover-box discover-box-2" style="background-image:url({{asset('siteassets/images/discover/6.svg')}})">
                        <div class="discover-box-details">
                            <h3>حملة طبية مجانية للكشف عن أمراض العيون</h3>
                            <p>قدمنا الكشف والعلاج المجاني بالتعاون مع جمعيات خيرية محلية ودولية.</p>
                            <a href="#">
                                اقرأ المزيد
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                        </div>
                    </div>
                </div>				
                <div class="col-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="discover-box discover-box-2" style="background-image:url({{asset('siteassets/images/discover/7.svg')}})">
                        <div class="discover-box-details">
                            <h3>المؤتمر الدولي لعلاج أمراض الأطفال المبتسرين</h3>
                            <p>شاركنا بأحدث الحلول لعلاج شبكية الأطفال وضمان مستقبل بصري أفضل.</p>
                            <a href="#">
                                اقرأ المزيد
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                        </div>
                    </div>
                </div>				

            </div>
        </div>
    </article>
    <!-- Discover two Section -->

    <!-- Experience Section -->
    <article class="experience pd">
        <div class="container flex-center align-center">
            <div class="col-6 col-md-6 col-sm-12">
                <figure class="experience-image">
                    <img src="{{asset('siteassets/images/experience/main.svg')}}" alt="" >
                </figure> 
            </div>
            <div class="col-6 col-md-6 col-sm-12">
                <div class="experience-details">
                    <span class="pre-title site-color">{{__('app 1')}}</span>
                    <h2 class="main-title"> {{__('app 2')}}</h2>
                    <p class="main-para">{{__('app 3')}}</p>

                    <div class="btns flex-start align-center">
                        <a href="#" class="section-btn">
                            <img src="{{asset('siteassets/images/experience/badge.svg')}}">
                        </a>						
                        <a href="#" class="section-btn">
                            <img src="{{asset('siteassets/images/experience/app.svg')}}">
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </article>
    <!-- Experience Section -->

    <!-- Faq Section -->
    <article class="faq pd">
        <div class="container">
            <div class="flex-between pdb">
                <div>
                    <span class="pre-title site-color">{{__('quetion 1')}}</span>
                    <h2 class="main-title">{{__('quetion 2')}}</h2>
                </div>
                <a href="#" class="site-color">
                    عرض المزيد من الأسئلة الشائعة
                </a>
            </div>
            <p class="main-para">{{__('quetion 3')}}</p>

            <div class="questions pdt flex-start">

                @foreach ($quetions as $quetion)
                <div class="col-4 col-md-6 col-sm-12">
                    <div class="qbox">
                        <h3>
                            <i class="fa-solid fa-chevron-left"></i>
                             {{$quetion->quetion}}
                        </h3>
                        <p>
                            {{$quetion->answer}}
                        </p>
                    </div>
                </div>		
                @endforeach

            </div>
        </div>
    </article>
    <!-- Faq Section -->

    <!-- Parteners Section -->
    <article class="parteners pd">
        <div class="container">
            <div class="flex-between pdb">
                <div>
                    <span class="pre-title site-color">{{__('Our trusted partners')}}</span>
                    <h2 class="main-title"> {{__('Insurance Partners: Renowned')}}</h2>
                </div>
                <a href="#" class="site-color">
                    عرض المزيد من الشركاء
                </a>
            </div>
            <p class="main-para">{{__('Our company takes')}}</p>

            <div class="flex-between align-center pdt">
                <img src="{{asset('siteassets/images/parteners/1.svg')}}" alt="">
                <img src="{{asset('siteassets/images/parteners/2.svg')}}" alt="">
                <img src="{{asset('siteassets/images/parteners/3.svg')}}" alt="">
                <img src="{{asset('siteassets/images/parteners/4.svg')}}" alt="">
                <img src="{{asset('siteassets/images/parteners/5.svg')}}" alt="">
                <img src="{{asset('siteassets/images/parteners/6.svg')}}" alt="">
            </div>

        </div>
    </article>
    <!-- Parteners Section -->

    <!-- Contact us Section -->
    <article class="contact-us pd">
        <div class="container">
            <span class="pre-title site-color">{{__('we here')}}</span>
            <h2 class="main-title"> {{__('call us')}}<br>{{__('It suits you perfectly')}}</h2>
            <p class="main-para">{{__('Our dedicated')}}</p>

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