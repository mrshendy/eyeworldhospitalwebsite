@extends('temp')

@section('content')
<h3>Guests</h3>

@if ($conference->guests->isEmpty())
    <p>No guests have registered for this conference.</p>
@else
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Country</th>
                <th>Phone</th>
                <th>Age</th>
                <th>Employer</th>
                <th>Doctor Type</th>
                <th>Participation Type</th>
                <th>Attendance Details</th>
                <th>Registered At</th>
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
                    <td>{{ $guest->pivot->participation_type }}</td>
                    <td>{{ $guest->pivot->attendance_details }}</td>
                    <td>{{ $guest->pivot->created_at?->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif


<h3>Local Doctors</h3>

@if ($conference->localDoctors->isEmpty())
    <p>No Local Doctors have registered for this conference.</p>
@else
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($conference->localDoctors as $doctor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->type }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif


<h3>Global Doctors</h3>

@if ($conference->globalDoctors->isEmpty())
    <p>No Global Doctors have registered for this conference.</p>
@else
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($conference->globalDoctors as $doctor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->type }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

<h3>Conference Advantages</h3>

@if ($conference->advantages->isEmpty())
    <p>No Advantages for this conference.</p>
@else
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($conference->advantages as $advantage)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $advantage->advantage_title }}</td>
                    <td>{{ $advantage->advantage_description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection
