@extends('layouts.dashboard.admin')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Bookings</h5>
                    <div class="container">
                        @if (session('success'))
                        <div
                            class="alert {{ session('success') ? 'alert-success' : 'alert-info' }} alert-dismissible fade show">
                            {{ session('success') }}
                        </div>
                        @endif
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">first_name</th>
                                <th scope="col">last_name</th>
                                <th scope="col">date</th>
                                <th scope="col">time</th>
                                <th scope="col">phone</th>
                                <th scope="col">message</th>
                                <th scope="col">status</th>
                                <th scope="col">change status</th>
                                <th scope="col">created_at</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $booking->first_name }}</td>
                                <td>{{ $booking->last_name }}</td>
                                <td>{{ $booking->date }}</td>
                                <td>{{ $booking->time }}</td>
                                <td>{{ $booking->phone }}</td>
                                <td>{{ $booking->message }}</td>
                                <td>{{ $booking->status }}</td>
                                <td><a href="{{ route('booked-up.edit', $booking) }}"
                                        class="btn btn-warning text-white text-center">Change status</a></td>
                                <td>{{ $booking->created_at }}</td>
                                <td>
                                    <a href="{{ route('booked-up.destroy', $booking) }}" onclick="event.preventDefault();
                                        document.getElementById('deleteBooking-{{ $booking->id }}').submit();"
                                        class="btn btn-danger text-center">delete</a>
                                </td>
                            </tr>
                            <form id="deleteBooking-{{ $booking->id }}" method="POST"
                                action="{{ route('booked-up.destroy', $booking) }}" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
