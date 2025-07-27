
<footer class="pd">
    <div class="container">
        <div class="flex-between">
            <div class="col-6 col-md-6 col-sm-12">
                <div class="footer-content">
                    <div class="footer-logo">
                    <img src="{{asset('uploads/settings/' . $settings->logo)}}" alt="">
                    </div>
                    <h2 class="footer-title">{{ $settings->title }}</h2>
                    <p class="footer-desc">
                        {{ $settings->description }}
                    </p>
                </div>
            </div>
            <div class="col-3 col-md-6 col-sm-12">
                <ul class="list-unstyled footer-contact">
                    <li>
                        <div class="flex-start align-center">
                            <img src="{{asset('siteassets/images/footer/location.svg')}}" alt="">
                            <strong>{{__('address')}} : </strong>
                        </div>
                        <p>{{ $settings->address }}</p>
                    </li>

                    <li>
                        <div class="flex-start align-center">
                            <img src="{{asset('siteassets/images/footer/call.svg')}}" alt="">
                            <strong>{{__('phone number')}} : </strong>
                        </div>
                        <p>{{ $settings->phone }} ،  {{ $settings->secondary_phone }}</p>
                    </li>

                    <li>
                        <div class="flex-start align-center">
                            <img src="{{asset('siteassets/images/footer/msg.svg')}}" alt="">
                            <strong>{{__('email')}}: </strong>
                        </div>
                        <p>{{ $settings->email }}</p>
                    </li>
                </ul>
            </div>
            <div class="col-3 col-md-6 col-sm-12">
                <ul class="list-unstyled footer-contact">
                    <li>
                        <div class="flex-start align-center">
                            <a href="{{ route('Site.contact') }}">
                                <img src="{{asset('siteassets/images/footer/msg2.svg')}}" alt="">
                                <strong>{{__('contact us')}}</strong>
                            </a>
                        </div>
                    </li>

                    <li>
                        <div class="flex-start align-center">
                            <a href="{{ route('Site.faqs') }}">
                                <img src="{{asset('siteassets/images/footer/stickynote.svg')}}" alt="">
                                <strong>{{__('common quetions')}}</strong>
                            </a>
                        </div>
                    </li>

                    <li>
                        <div class="flex-start align-center">
                            <a href="{{ route('Site.terms') }}">
                                <img src="{{asset('siteassets/images/footer/verify.svg')}}" alt="">
                                <strong>{{__('terms and condations')}} </strong>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="flex-start align-center">
                            <a href="{{ route('Site.privacy') }}">
                                <img class="mb-4" src="{{asset('siteassets/images/footer/stickynote.svg')}}" alt="">
                                <strong>{{__('privecy policy')}}</strong>
                            </a>
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
        <p class="copyright">  {{__('All rights reserved to Dunya Al Oyoun')}}     @ 2025</p>
        <div class="socials flex-center align-center">
             {{-- @foreach (media() as $row)
               <a href="{{$row->url}}"><img src="{{$row->img}}"></a>
             @endforeach --}}
             @foreach (app('media') as $row)
                <a href="{{ $row->url }}"><img src="{{ $row->img }}"></a>
            @endforeach

        </div>
    </div>
</article>
<!-- Footer Bottom -->

<div class="fixed-btns">
    <a href="https://wa.me/{{ $settings->whatsapp_number }}" target="_blank">
        <img src="{{asset('siteassets/images/footer/whatsapp.svg')}}">
    </a>
    @auth
        <a href="{{ route('Site.user_reservations') }}">
            <img src="{{ asset('siteassets/images/footer/dash.svg') }}">
        </a>
    @endauth

</div>


<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('siteassets/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('siteassets/js/main.js')}}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".toggle-answer-link").forEach(function (link) {
            link.addEventListener("click", function () {
                const qbox = this.closest(".qbox");
                const shortAnswer = qbox.querySelector(".short-answer");
                const fullAnswer = qbox.querySelector(".full-answer");

                const isFullVisible = !fullAnswer.classList.contains("d-none");

                if (isFullVisible) {
                    fullAnswer.classList.add("d-none");
                    shortAnswer.classList.remove("d-none");
                    this.textContent = this.dataset.showMore;
                } else {
                    fullAnswer.classList.remove("d-none");
                    shortAnswer.classList.add("d-none");
                    this.textContent = this.dataset.showLess;
                }
            });
        });
    });

</script>
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

@yield('scripts')
</body>
</html>
