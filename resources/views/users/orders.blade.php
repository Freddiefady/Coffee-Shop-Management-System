@extends('layouts.app')
@section('content')
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">My Orders</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>My Orders</span></p>
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
                            <th>City</th>
                            <th>Email</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Write Review</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                        <tr class="text-center" style="height: 140px;">
                            <td class="product-remove">{{ $order->first_name }}</td>

                            <td class="image-prod">{{ $order->last_name }}</td>

                            <td class="price">{{ $order->city }}</td>

                            <td>
                                {{ $order->email }}
                            </td>

                            <td class="total">${{ $order->price }}</td>
                            <td class="total">{{ $order->status }}</td>
                            <td class="total">
                                @if ($order->status === "delivery")
                                    <a href="{{ route('review.index') }}" class="btn btn-primary">Write Review</a>
                                @else
                                    <p class="btn btn-primary">Not availbale just yet.</p>
                                @endif
                            </td>
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
