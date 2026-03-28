@extends('site')
@section('content')

<main id="main">

    <!-- Banner -->
    <article class="banner">
        <img src="{{$specialtie->img}}" alt="{{ $specialtie->title }}">
    </article>
    <!-- Banner -->

    <!-- Achievement Section -->
    <article class="achievement pd">
        <div class="container">

            <!-- About  -->
            <section class="about flex-start  text-right align-center">
                <div class="col-6 col-md-6 col-sm-12">
                    <div class="about-desc">
                        <span class="pre-title site-color">{{$SubSpecialtie->detail_title}}</span>
                        <h2 class="main-title">{{$SubSpecialtie->detail_title}}</h2>
                        <p class="main-para"> {{$SubSpecialtie->desc}}  </p>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-sm-12">
                    <figure class="about-image">
                        <img src="{{$SubSpecialtie->img}}" alt="{{ $SubSpecialtie->main_title }}">
                    </figure>
                </div>
            </section>
            <!-- About  -->

            <section class="features-list row-gap-15 pdt flex-center">
                @foreach ($SubSpecialtieTypes as $row)
                <div class="col-4 col-md-4 col-sm-12">
                    <div class="features-list-box">
                        <h2 class="title-color">{{$row->title}}</h2>
                        <p>{{$row->desc}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </section>


        </div>
    </article>
    <!-- Achievement Section -->

    <!-- Doctors Section -->
    <article class="doctors pd">
        <div class="container">

            <span class="pre-title site-color">نحن نعتني بكافة جوانب أورام العين، لدينا فريق من الأطباء المتخصصين لضمان أفضل علاج ونتائج</span>
            <h2 class="main-title">أطباء متخصصون في علاج أورام العين باستخدام أحدث العلاجات الطبية والخبرات الواسعة لضمان الشفاء التام</h2>
            <p class="main-para">فريقنا الطبي المتخصص في أورام العين يضم مجموعة من الأطباء ذوي الخبرات الواسعة في تشخيص وعلاج الأورام المختلفة التي تصيب العين. نحن نستخدم تقنيات طبية متقدمة لعلاج أورام الجفون والملتحمة والحجاج وشبكية العين لضمان أفضل رعاية صحية. اعتمد على خبرتنا لتحقيق أفضل النتائج.
            </p>

            <div class="doctors-blocks pdt">
                <div class="flex-start row-gap-15">

                    <div class="col-3 col-md-6 col-sm-12">
                        <div class="doctor">
                            <figure>
                                <img src="../images/doctors/1.svg" alt="1">
                            </figure>
                            <div class="doctor-dtl">
                                <h3>د. إيهاب سعد عثمان</h3>
                                <p>استشاري أورام العين، من أطباء مصر المميزين في علاج أورام العين باستخدام أحدث التقنيات، وله خبرة كبيرة في علاج الأورام المستعصية والمتقدمة</p>
                                <a href="#">
                                    عرض الملف والحجز
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 col-md-6 col-sm-12">
                        <div class="doctor">
                            <figure>
                                <img src="../images/doctors/2.svg" alt="2">
                            </figure>
                            <div class="doctor-dtl">
                                <h3>د. سامي فوزي</h3>
                                <p>أستاذ جراحة أورام العين، متخصص في أورام الجفون والملتحمة، يعالج الأورام بطرق مبتكرة وبتقنيات حديثة لضمان أعلى معدلات الشفاء</p>
                                <a href="#">
                                    عرض الملف والحجز
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 col-md-6 col-sm-12">
                        <div class="doctor">
                            <figure>
                                <img src="../images/doctors/3.svg" alt="3">
                            </figure>
                            <div class="doctor-dtl">
                                <h3>د. منى عبد الرحمن</h3>
                                <p>استشارية أورام العين، تتخصص في تشخيص وعلاج أورام الشبكية والمياه البيضاء، تعمل مع فريق طبي لضمان تقديم أفضل الحلول الطبية</p>
                                <a href="#">
                                    عرض الملف والحجز
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 col-md-6 col-sm-12">
                        <div class="doctor">
                            <figure>
                                <img src="../images/doctors/4.svg" alt="4">
                            </figure>
                            <div class="doctor-dtl">
                                <h3>د. علي مصطفى</h3>
                                <p>طبيب متخصص في علاج أورام العين، لديه خبرة واسعة في علاج الأورام الحجاجية وإزالة الأورام باستخدام تقنيات متطورة لضمان الشفاء التام</p>
                                <a href="#">
                                    عرض الملف والحجز
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 col-md-6 col-sm-12">
                        <div class="doctor">
                            <figure>
                                <img src="../images/doctors/5.svg" alt="5">
                            </figure>
                            <div class="doctor-dtl">
                                <h3>د. رانيا الشافعي</h3>
                                <p>طبيبة متخصصة في علاج أورام الشبكية، تقدم حلول طبية مبتكرة لأورام شبكية العين، وتعمل على تحسين الرؤية لدى المرضى المتأثرين</p>
                                <a href="#">
                                    عرض الملف والحجز
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 col-md-6 col-sm-12">
                        <div class="doctor">
                            <figure>
                                <img src="../images/doctors/6.svg" alt="6">
                            </figure>
                            <div class="doctor-dtl">
                                <h3>د. أحمد سعيد</h3>
                                <p>استشاري جراحة أورام العين، خبير في جراحة أورام الجفون والملتحمة، يهتم بتقديم العلاج المناسب لكل حالة باستخدام التقنيات الحديثة.</p>
                                <a href="#">
                                    عرض الملف والحجز
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 col-md-6 col-sm-12">
                        <div class="doctor">
                            <figure>
                                <img src="../images/doctors/7.svg" alt="7">
                            </figure>
                            <div class="doctor-dtl">
                                <h3>د. عادل محسن</h3>
                                <p>أستاذ وخبير متخصص في علاج أورام الحجاج، يقوم باستخدام أساليب دقيقة ومتقدمة في تشخيص وعلاج الأورام داخل العين.</p>
                                <a href="#">
                                    عرض الملف والحجز
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-3 col-md-6 col-sm-12">
                        <div class="doctor">
                            <figure>
                                <img src="../images/doctors/8.svg" alt="8">
                            </figure>
                            <div class="doctor-dtl">
                                <h3>د. هند زكريا</h3>
                                <p>طبيبة متخصصة في علاج الأورام العينية المتقدمة، تقدم أفضل الحلول لجراحة الأورام الشبكية وضمان نتائج مضمونة للمرضى.</p>
                                <a href="#">
                                    عرض الملف والحجز
                                </a>
                            </div>
                        </div>
                    </div>


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
                        <img src="../images/doctors/about.svg" alt="About">
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
                        <img src="../images/doctors/video.svg" alt="Video">
                        <a href="#" class="play">
                            <img  src="../images/doctors/play.png" alt="Play">
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
         @include('components.contact-us')
    <!-- Contact us Section -->


</main>


@endsection
