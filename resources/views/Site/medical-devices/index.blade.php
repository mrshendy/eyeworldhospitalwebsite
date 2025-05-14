@extends('site')

@section('content')


<main id="main">

    <!-- Banner -->
    <article class="banner">
        <img src="{{asset('uploads/medical-devices/banner.jpg')}}">
    </article>
    <!-- Banner -->

    <!-- Specialization blocks -->
    <article class="achievement pd">
        <div class="container">

            <!-- About  -->
            <section class="about flex-start text-right align-center">
                <div class="col-6 col-md-6 col-sm-12">
                    <div class="about-desc">
                        <span class="pre-title site-color">{{$medical_device_info->title}}</span>
                        <h2 class="main-title">{{$medical_device_info->sub_title}}</h2>
                        <p class="main-para">{{$medical_device_info->description}}</p>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-sm-12">
                    <figure class="about-image">
                        <img src="{{asset('uploads/medical-devices/' . $medical_device_info->img)}}" class="img-fluid" alt="">
                    </figure>
                </div>
            </section>
            <!-- About  -->
        </div>
    </article>

    <article class="videos-section pd">
        <div class="container">
            <span class="pre-title site-color">
                {{$medical_device_info->secondary_title}}
            </span>
            <h2 class="main-title">
                {{$medical_device_info->secondary_sub_title}}
            </h2>
            <p class="main-para">
                {{$medical_device_info->secondary_description}}
            </p>
            <div class="flex-start">
                <div class="col-3 col-md-6 col-sm-12">
                    <div class="aside-tabs">
                        @foreach ($specialties as $specialty)
                            <a href="{{ route('Site.specialtie', $specialty->id) }}"
                                class="aside-tab flex-between align-center {{ $loop->first ? 'active' : '' }}">
                                <div class="flex-1">
                                    <h3>{{ $specialty->title }}</h3>
                                </div>
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                        @endforeach
                    </div>
                </div>

                <div class="col-9 col-md-6 col-sm-12">
                    <div class="all-videos-holder height-auto flex-center row-gab-15">
                        @foreach ($medical_devices as $row)
                            <div class="col-4 col-md-6 col-sm-12">
                                <div class="text-box text-center">
                                    <div class="device-image">
                                        <img src="{{asset('uploads/medical-devices/' . $row->img)}}" class="img-fluid" alt="">
                                    </div>
                                    <h4>{{ $row->title }}</h4>
                                    <p class="feedback"> {{ $row->sub_title }}</p>

                                    <a href="{{ route('Site.medicalDevices.show', $row->id) }}" class="show-profile">
                                        اقرأ المزيد
                                    </a>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </article>
    <!-- Specialization blocks -->

    <!-- Contact us Section -->
      @include('components.contact-us')
    <!-- Contact us Section -->


</main>

@endsection

@section('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $('.specialty-link').on('click', function (e) {
            e.preventDefault();
            var specialtyId = $(this).data('id');

            $.ajax({
                url: "{{ route('Site.getMedicalDevicesBySpecialty') }}",
                method: 'GET',
                data: { specialty_id: specialtyId },
                success: function (response) {
                    $('#medical-device-cards').html(response.html);
                },
                error: function () {
                    alert('حدث خطأ أثناء جلب البيانات.');
                }
            });
        });
    </script>
@endsection

