@extends('temp')

@section('content')

<div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('Admin.conferences.index') }}">{{__('medical_conferences')}}</a></li>
      </ol>
    </nav>

    <div class="card">
      <div class="card-body">

        <div class="row">

        </div>
        <h3>{{ __('Guests') }}</h3>

        @if ($conference->guests->isEmpty())
            <p>{{ __('No guests have registered for this conference.') }}</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Country') }}</th>
                        <th>{{ __('Phone') }}</th>
                        <th>{{ __("Age") }}</th>
                        <th>{{ __("Employer") }}</th>
                        <th>{{ __("Doctor Type") }}</th>
                        <th>{{ __("Participation Type") }}</th>
                        <th>{{ __('Attendance Details') }}</th>
                        <th>{{ __('Registered At') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($conference->guests as $guest)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $guest->name }}</td>
                            <td>{{ $guest->email }}</td>
                            <td>{{ $guest->country }}</td>
                            <td>{{ $guest->phone }}</td>
                            <td>{{ $guest->age }}</td>
                            <td>{{ $guest->pivot->employer }}</td>
                            <td>{{ $guest->pivot->doctor_type }}</td>
                            <td>{{ $guest->pivot->participation_type_id}}</td>
                            <td>{{ $guest->pivot->attendance_details }}</td>
                            <td>{{ $guest->pivot->created_at?->format('Y-m-d H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif


        <h3>{{ __("Local Doctors") }}</h3>

        @if ($conference->localDoctors->isEmpty())
            <p>{{ __("No Local Doctors have registered for this conference.") }}</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __("Name") }}</th>
                        <th>{{ __("Speciality") }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($conference->localDoctors as $doctor)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $doctor->translations->firstWhere('locale', app()->getLocale())?->name }}</td>
                            <td>{{ $doctor->translations->firstWhere('locale', app()->getLocale())?->specialty }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif


        <h3>{{ __('Global Doctors') }}</h3>

        @if ($conference->globalDoctors->isEmpty())
            <p>{{ __('No Global Doctors have registered for this conference.') }}</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __("Name") }}</th>
                        <th>{{ __("Type") }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($conference->globalDoctors as $doctor)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $doctor->translations->firstWhere('locale', app()->getLocale())?->name }}</td>
                            <td>{{ $doctor->translations->firstWhere('locale', app()->getLocale())?->specialty }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <h3>{{ __('Conference Advantages') }}</h3>

        @if ($conference->advantages->isEmpty())
            <p>{{ __("No Advantages for this conference.") }}</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __("Title") }}</th>
                        <th>{{ __("Description") }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($conference->advantages as $advantage)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $advantage->translations->firstWhere('locale', app()->getLocale())?->advantage_title }}</td>
                            <td>{{ $advantage->translations->firstWhere('locale', app()->getLocale())?->advantage_description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

            </div>
            </div>
        </div>

@endsection
