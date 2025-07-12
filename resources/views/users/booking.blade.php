@extends('layouts.app')
@section('content')
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">My Booking</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>My Booking</span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <table class="table-dark" style="width: 1100px">
                    <thead class="thead-primary" style="background-color: #c49b63; height: 60px;">
                        <tr class="text-center">
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>date</th>
                            <th>time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookings as $booking)
                        <tr class="text-center" style="height: 140px;">
                            <td class="product-remove">{{ $booking->first_name }}</td>

                            <td class="image-prod">{{ $booking->last_name }}</td>

                            <td class="price">{{ $booking->phone }}</td>

                            <td>
                                {{ $booking->date }}
                            </td>

                            <td class="total">${{ $booking->time }}</td>
                            <td class="total">{{ $booking->status }}</td>
                        </tr>
                        @empty
                        <tr class="text-center">
                            <td colspan="6">No items in the Order</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
