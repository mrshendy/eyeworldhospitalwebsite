 <!-- Contact us Section -->
 <article class="contact-us pd">
    <div class="container">
        <span class="pre-title site-color">{{__('we here')}}</span>
        <h2 class="main-title"> {{__('call us')}}<br>{{__('It suits you perfectly')}}</h2>
        <p class="main-para">{{__('Our dedicated')}}</p>

        <div class="flex-center align-center pdt">
            <div class="col-6 col-md-6 col-sm-12">
                <form class="custom-form" action="{{route('Site.contact-us')}}" method="post">
                    @csrf
                    <div class="form-control">
                        <div class="form-field">
                            <label>{{__('write your name')}} </label>
                            <div class="field">
                                <img src="{{asset('siteassets/images/contact/user.svg')}}">
                                <input type="text" name="name" placeholder="| {{__('please write your name hear')}}" required>
                            </div>
                        </div>			
                        <div class="form-field">
                            <label>  {{__('write your email')}}</label>
                            <div class="field">
                                <img src="{{asset('siteassets/images/contact/sms.svg')}}">
                                <input type="email" name="email" placeholder="| example@email.com" required>
                            </div>
                        </div>
                    </div>			
                    <div class="form-control">
                        <div class="form-field">
                            <label>{{__('write your message')}}</label>
                            <div class="field">
                                <img src="{{asset('siteassets/images/contact/message-text.svg')}}">
                                <textarea name="message" placeholder="{{__('for example : I need to contact with you')}}" required></textarea>
                            </div>
                        </div>			
                    
                    </div>
                    <div class="form-control">
                        <input type="submit" class="btn"  value="ارسال">
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