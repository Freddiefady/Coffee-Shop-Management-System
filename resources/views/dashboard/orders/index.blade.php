@extends('layouts.dashboard.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="container">
                @if (session('success'))
                <div
                    class="alert {{ session('success') ? 'alert-success' : 'alert-info' }} alert-dismissible fade show">
                    {{ session('success') }}
                </div>
                @endif
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Orders</h5>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">first_name</th>
                                <th scope="col">last_name</th>
                                <th scope="col">town</th>
                                <th scope="col">state</th>
                                <th scope="col">zip_code</th>
                                <th scope="col">phone</th>
                                <th scope="col">street_address</th>
                                <th scope="col">total_price</th>
                                <th scope="col">status</th>
                                <th scope="col">Change Status</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $order->first_name }}</td>
                                <td>{{ $order->last_name }}</td>
                                <td>{{ $order->city }}</td>
                                <td>{{ $order->state }}</td>
                                <td>{{ $order->zip_code }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->address }}</td>
                                <td>${{ $order->price }}</td>
                                <td>{{ $order->status }}</td>
                                <td><a href="{{ route('orders.edit', $order) }}" class="btn btn-warning text-white text-center ">Change status</a></td>
                                <td><a href="{{ route('orders.destroy', $order) }}" onclick="event.preventDefault();
                                    document.getElementById('deleteOrder').submit();" class="btn btn-danger  text-center text-white">delete</a></td>
                            </tr>
                            @endforeach
                            <form id="deleteOrder" method="POST"
                                action="{{ route('orders.destroy', $orders) }}"  class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
