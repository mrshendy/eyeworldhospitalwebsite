@extends('site')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection
@section('content')


<main id="main">

    <!-- Banner -->
    <article class="banner">
        <img src="{{asset('uploads/medical-devices/banner.jpg')}}">
    </article>
    <!-- Banner -->

    <!-- Specialization blocks -->
    <article class="specializations-blocks pd">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6">
                    <span class="pre-title site-color">{{$medical_device_info->title}}</span>
                    <h2 class="main-title">{{$medical_device_info->sub_title}}</h2>
                    <p class="main-para">{{$medical_device_info->description}}</p>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('uploads/medical-devices/' . $medical_device_info->img)}}" class="img-fluid" alt="">
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12">
                    <span class="pre-title site-color">{{$medical_device_info->title}}</span>
                    <h2 class="main-title">{{$medical_device_info->sub_title}}</h2>
                    <p class="main-para">{{$medical_device_info->description}}</p>
                </div>
            </div>

            <div class="container py-4 my-5">
                <div class="row flex-row">
                    <!-- Sidebar -->
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm">
                            <ul class="list-group list-group-flush">
                                @foreach ($specialties as $specialty)
                                    <li class="list-group-item">
                                        <a href="#" class="text-decoration-none text-dark specialty-link" data-id="{{ $specialty->id }}">
                                            {{ $specialty->title }}
                                        </a>

                                    </li>

                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Cards Section -->
                    <div class="col-md-9">
                        <div class="row" id="medical-device-cards">
                            @foreach ($medical_devices as $row)
                                <div class="col-md-4 col-sm-6 mb-4">
                                    <div class="card h-100 text-center shadow-sm">
                                        <img src="{{asset('uploads/medical-devices/' . $row->img)}}" class="img-fluid" alt="">
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title fw-bold">{{ $row->title }}</h5>
                                            <p class="card-text">{{ $row->sub_title }}</p>
                                            <a href="{{ route('Site.medicalDevices.show', $row->id) }}" class="btn btn-outline-info mt-auto">
                                                اقرأ المزيد
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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

