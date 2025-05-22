<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="{{route('Admin.Quetions.index')}}" class="app-brand-link">
              <span class="app-brand-logo demo">
                <span style="color: var(--bs-primary)">
                  <img src ="{{asset('uploads/logo.svg')}}">
                </span>
              </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M8.47365 11.7183C8.11707 12.0749 8.11707 12.6531 8.47365 13.0097L12.071 16.607C12.4615 16.9975 12.4615 17.6305 12.071 18.021C11.6805 18.4115 11.0475 18.4115 10.657 18.021L5.83009 13.1941C5.37164 12.7356 5.37164 11.9924 5.83009 11.5339L10.657 6.707C11.0475 6.31653 11.6805 6.31653 12.071 6.707C12.4615 7.09747 12.4615 7.73053 12.071 8.121L8.47365 11.7183Z"
                  fill-opacity="0.9" />
                <path
                  d="M14.3584 11.8336C14.0654 12.1266 14.0654 12.6014 14.3584 12.8944L18.071 16.607C18.4615 16.9975 18.4615 17.6305 18.071 18.021C17.6805 18.4115 17.0475 18.4115 16.657 18.021L11.6819 13.0459C11.3053 12.6693 11.3053 12.0587 11.6819 11.6821L16.657 6.707C17.0475 6.31653 17.6805 6.31653 18.071 6.707C18.4615 7.09747 18.4615 7.73053 18.071 8.121L14.3584 11.8336Z"
                  fill-opacity="0.4" />
              </svg>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->


            <!-- Apps & Pages -->
            <li class="menu-header mt-5">
              <span class="menu-header-text" data-i18n="Apps & Pages">Apps &amp; Pages</span>
            </li>
            <li class="menu-item">
              <a href="{{route('Admin.Quetions.index')}}" class="menu-link">
                <i class="ri-questionnaire-line"></i>
                <div>{{__('system.Questions')}}</div>
              </a>
            </li>


            {{-- <li class="menu-item">
              <a href="{{route('Admin.doctors.index')}}" class="menu-link">
                <i class="ri-nurse-line"></i>
                   <div>{{__('doctors')}}</div>
              </a>
            </li> --}}




              <li class="menu-item   @if (Route::currentRouteName()=='Admin.doctors'
                  || Route::currentRouteName() =='Admin.doctors.index' || Route::currentRouteName() =='Admin.doctors.create' || Route::currentRouteName()=='Admin.doctors.show'  || Route::currentRouteName()=='Admin.team-info-detail'
                )
                     open
                @endif ">
                   <a href="{{route('Admin.doctors.index')}}" class="menu-link menu-toggle">
                    <i class="ri-nurse-line"></i>
                      <div>{{__('doctors')}}</div>
                  </a>

                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{route('Admin.team-info-detail')}}" class="menu-link">
                        <div>{{__('details')}}</div>
                      </a>
                    </li>

                    <li class="menu-item">
                      <a href="{{route('Admin.doctors.index')}}" class="menu-link">
                        <div>{{__('doctors')}}</div>
                      </a>
                    </li>
                  </ul>
                </li>



            <li class="menu-item   @if (Route::currentRouteName()=='Admin.medical-devices'
                  || Route::currentRouteName() =='Admin.medical-devices.index' || Route::currentRouteName() =='Admin.medical-devices.create' || Route::currentRouteName()=='Admin.medical-devices.show'  || Route::currentRouteName()=='Admin.medical-device-info-detail'
                )
                     open
                @endif ">
                   <a href="#" class="menu-link menu-toggle">
                    <i class="ri-nurse-line"></i>
                     <div>{{__('medical_devices')}}</div>
                  </a>

                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{route('Admin.medical-device-info-detail')}}" class="menu-link">
                          <div>{{__('details')}}</div>
                      </a>
                    </li>

                    <li class="menu-item">
                      <a href="{{route('Admin.medical-devices.index')}}" class="menu-link">
                         <div>{{__('medical_devices')}}</div>
                      </a>
                    </li>
                  </ul>
            </li>

            <li class="menu-item   @if (Route::currentRouteName() =='Admin.medical-tourism-services.index' || Route::currentRouteName() == 'Admin.medical-tourism-services.create' || Route::currentRouteName()== 'Admin.medical-tourism-services.show' || Route::currentRouteName() == 'Admin.medical-tourism-info-detail') open @endif ">
                <a href="#" class="menu-link menu-toggle">
                    <i class="ri-nurse-line"></i>
                    <div>{{__('medical_tourisms')}}</div>
                </a>

                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{route('Admin.medical-tourism-info-detail')}}" class="menu-link">
                          <div>{{__('details')}}</div>
                      </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('Admin.medical-tourism-services.index')}}" class="menu-link">
                           <div>{{__('medical_tourisms_service')}}</div>
                        </a>
                      </li>

                  </ul>
            </li>

            <li class="menu-item   @if (Route::currentRouteName()=='Admin.conferences.index' || Route::currentRouteName() == 'Admin.conferences.create' || Route::currentRouteName()== 'Admin.conferences.show') open @endif">
                <a href="#" class="menu-link menu-toggle">
                    <i class="ri-nurse-line"></i>
                    <div>{{__('medical_conferences')}}</div>
                </a>

                  <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="{{route('Admin.conference-info-detail')}}" class="menu-link">
                            <div>{{__('details')}}</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{route('Admin.conferences.index')}}" class="menu-link">
                           <div>{{__('medical_conferences')}}</div>
                        </a>
                      </li>

                  </ul>
            </li>

            <li class="menu-item">
              <a href="{{route('Admin.abouts.edit',\App\Models\About::first()->id)}}" class="menu-link">
                <i class="menu-icon tf-icons ri-wechat-line"></i>
                <div>{{__('About')}}</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{route('Admin.contact-us.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ri-mail-open-line"></i>
                <div >{{__('contact us')}}</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="{{route('Admin.specialtie.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ri-drag-drop-line"></i>
                <div>{{__('specialtie')}}</div>
              </a>
            </li>
            <!-- e-commerce-app menu start -->
            <li class="menu-item @if (checkServiceUrl()==true)
              open
            @endif">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ri-shopping-bag-3-line"></i>
                <div>{{__('our services')}}</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item @if (Route::currentRouteName()=='Admin.eye-health-detail' || Route::currentRouteName()=='Admin.articles.index' || Route::currentRouteName()=='Admin.articles.create' || Route::currentRouteName()=='Admin.articles.show' )
                     open
                @endif">
                  <a href="app-ecommerce-dashboard.html" class="menu-link menu-toggle">
                    <div>{{__('Info about your eye health')}}</div>
                  </a>

                  <ul class="menu-sub">
                    <li class="menu-item ">
                      <a href="{{route('Admin.eye-health-detail')}}" class="menu-link">
                        <div>{{__('details')}}</div>
                      </a>
                    </li>

                    <li class="menu-item">
                      <a href="{{route('Admin.articles.index')}}" class="menu-link">
                        <div>{{__('articles')}}</div>
                      </a>
                    </li>

                  </ul>
                </li>


                <li class="menu-item @if (
                Route::currentRouteName()=='Admin.eye-health-video')
                     open
                @endif">
                  <a href="app-ecommerce-dashboard.html" class="menu-link menu-toggle">
                    <div>{{__('videos about your eye health')}}</div>
                  </a>

                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{route('Admin.eye-health-video')}}" class="menu-link">
                        <div>{{__('details')}}</div>
                      </a>
                    </li>


                    <li class="menu-item">
                      <a href="{{route('Admin.Topics','health-video')}}" class="menu-link">
                        <div>{{__('topics')}}</div>
                      </a>
                    </li>


                    <li class="menu-item">
                      <a href="{{route('Admin.videos.index','health-video')}}" class="menu-link">
                        <div>{{__('Videos')}}</div>
                      </a>
                    </li>



                  </ul>
                </li>




                <li class="menu-item  @if (Route::currentRouteName()=='Admin.customer-video-detail')
                     open
                @endif">
                  <a href="app-ecommerce-dashboard.html" class="menu-link menu-toggle">
                    <div>{{__('Customer experiments videos')}}</div>
                  </a>

                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{route('Admin.customer-video-detail')}}" class="menu-link">
                        <div>{{__('details')}}</div>
                      </a>
                    </li>


                    <li class="menu-item">
                      <a href="{{route('Admin.Topics','experiments')}}" class="menu-link">
                        <div>{{__('topics')}}</div>
                      </a>
                    </li>


                    <li class="menu-item">
                      <a href="{{route('Admin.videos.index','experiments')}}" class="menu-link">
                        <div>{{__('Videos')}}</div>
                      </a>
                    </li>



                  </ul>
                </li>


                <li class="menu-item @if (Route::currentRouteName()=='Admin.customer-rate-info-detail'
                  || Route::currentRouteName() =='Admin.rates.index'
                )
                     open
                @endif ">
                  <a href="app-ecommerce-dashboard.html" class="menu-link menu-toggle">
                    <div>{{__('customers rates')}}</div>
                  </a>

                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{route('Admin.customer-rate-info-detail')}}" class="menu-link">
                        <div>{{__('details')}}</div>
                      </a>
                    </li>

                    <li class="menu-item">
                      <a href="{{route('Admin.rates.index')}}" class="menu-link">
                        <div>{{__('rates')}}</div>
                      </a>
                    </li>



                  </ul>
                </li>



                <li class="menu-item  @if (Route::currentRouteName()=='Admin.customer-right-info-detail'
                  || Route::currentRouteName() =='Admin.rights.index'
                )
                     open
                @endif

                ">
                  <a href="app-ecommerce-dashboard.html" class="menu-link menu-toggle">
                    <div>{{__('Patient rights and responsibilities')}}</div>
                  </a>

                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{route('Admin.customer-right-info-detail')}}" class="menu-link">
                        <div>{{__('details')}}</div>
                      </a>
                    </li>

                    <li class="menu-item">
                      <a href="{{route('Admin.rights.index','right')}}" class="menu-link">
                        <div>{{__('rights')}}</div>
                      </a>
                    </li>

                    <li class="menu-item">
                      <a href="{{route('Admin.rights.index','dutie')}}" class="menu-link">
                        <div>{{__('duties')}}</div>
                      </a>
                    </li>



                  </ul>
                </li>


                <li class="menu-item   @if (Route::currentRouteName()=='Admin.Insurance-partner-detail'
                  || Route::currentRouteName() =='Admin.partners.index' || Route::currentRouteName() =='Admin.partners.create' || Route::currentRouteName()=='Admin.partners.show'
                )
                     open
                @endif ">
                  <a href="app-ecommerce-dashboard.html" class="menu-link menu-toggle">
                    <div>{{__('Insurance partners')}}</div>
                  </a>

                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{route('Admin.Insurance-partner-detail')}}" class="menu-link">
                        <div>{{__('details')}}</div>
                      </a>
                    </li>

                    <li class="menu-item">
                      <a href="{{route('Admin.partners.index')}}" class="menu-link">
                        <div>{{__('partners')}}</div>
                      </a>
                    </li>




                  </ul>
                </li>



              </ul>
            </li>
            <!-- e-commerce-app menu end -->


            <li class="menu-item">
              <a href="{{route('Admin.socialmedia.index')}}" class="menu-link">
                <i class="ri-spy-fill"></i>
                   <div>{{__('Social Media')}}</div>
              </a>
            </li>




            <!-- Charts & Maps -->
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

