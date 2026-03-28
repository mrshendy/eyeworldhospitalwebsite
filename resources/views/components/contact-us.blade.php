 <!-- Contact us Section -->
 <article class="contact-us pd">
    <div class="container">
        <span class="pre-title site-color">{{__('we here')}}</span>
        <h2 class="main-title"> {{__('call us')}}<br>{{__('It suits you perfectly')}}</h2>
        <p class="main-para">{{__('Our dedicated')}}</p>

        <div class="flex-center align-center pdt">
            <div class="col-6 col-md-6 col-sm-12">
                <form class="custom-form" id="contact-form" action="{{route('Site.contact-us')}}" method="post">
                    @csrf
                    <div class="form-control">
                        <div class="form-field">
                            <label>{{__('write your name')}} </label>
                            <div class="field">
                                <img src="{{asset('siteassets/images/contact/user.svg')}}" alt="User">
                                <input type="text" name="name" placeholder="| {{__('please write your name hear')}}"
                                required oninvalid="this.setCustomValidity('{{ __('This field is required') }}')"
                                oninput="this.setCustomValidity('')">

                            </div>
                        </div>
                        <div class="form-field">
                            <label>  {{__('write your email')}}</label>
                            <div class="field">
                                <img src="{{asset('siteassets/images/contact/sms.svg')}}" alt="Sms">
                                <input type="email" name="email" placeholder="| example@email.com" required oninvalid="this.setCustomValidity('{{ __('This field is required') }}')"
                                oninput="this.setCustomValidity('')">
                            </div>
                        </div>
                    </div>
                    <div class="form-control">
                        <div class="form-field">
                            <label>{{__('write your message')}}</label>
                            <div class="field">
                                <img src="{{asset('siteassets/images/contact/message-text.svg')}}" alt="Message Text">
                                <textarea name="message" placeholder="{{__('for example : I need to contact with you')}}" required oninvalid="this.setCustomValidity('{{ __('This field is required') }}')"
                                oninput="this.setCustomValidity('')"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="form-control">
                        <input type="submit" class="btn"  value="{{__('send')}}">
                    </div>
                </form>
                <div class="footer-contact-phone">
                    <h4>{{ __('Or Contact us through :') }}</h4>
                    {{-- <img src="{{asset('siteassets/images/footer/call.svg')}}" alt="Call"> --}}
                    <strong>{{__('Phone Numbers')}} : </strong>
                    <a href="tel:{{ preg_replace('/\D+/', '', $settings->phone) }}">
                        {{ $settings->phone }}
                    </a>,
                    <a href="tel:{{ preg_replace('/\D+/', '', $settings->secondary_phone) }}">
                        {{ $settings->secondary_phone }}
                    </a>
                    <p>
                        <img src="{{asset('siteassets/images/footer/whatsapp.svg')}}" alt="Whatsapp">
                        <a href="https://wa.me/{{ preg_replace('/\D+/', '', $settings->whatsapp_number) }}" target="_blank">
                            {{ $settings->whatsapp_number }}
                        </a>
                    </p>
                </div>
                <div>
                </div>
            </div>
            <div class="col-6 col-md-6 col-sm-12">
                <figure class="contact-image">
                    <img src="{{asset('siteassets/images/contact/main.svg')}}" alt="Main">
                </figure>
            </div>
        </div>
    </div>
</article>
<!-- Contact us Section -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const contactForm = document.getElementById('contact-form');

            contactForm.addEventListener('submit', function (e) {
                e.preventDefault();

                const formData = new FormData(this);

                fetch("{{ route('Site.contact-us') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    Swal.fire({
                        icon: 'success',
                        title: '{{ __("Success") }}',
                        text: data.message,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000
                    });

                    contactForm.reset();
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: '{{ __("Error") }}',
                        text: '{{ __("Something went wrong. Please try again later.") }}',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000
                    });
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
