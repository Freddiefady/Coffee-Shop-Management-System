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
                    <h5 class="card-title mb-4 d-inline">Products</h5>
                    <a class="btn btn-primary text-center float-right mb-3"
                        href="{{ route('products.create') }}">Create Product</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">image</th>
                                <th scope="col">price</th>
                                <th scope="col">type</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $product->name }}</td>
                                <td><img src="{{ asset('assets/images/'. $product->image) }}" alt="{{ $product->name }}" width="100" height="70"></td>
                                <td>${{ $product->price }}</td>
                                <td>{{ $product->type }}</td>
                                {{-- <td><a href="{{ route('products.destroy', $product) }}" onclick="event.preventDefault();
                                    document.getElementById('deleteOrder').submit();" class="btn btn-danger  text-center text-white">delete</a></td> --}}
                            </tr>
                            @endforeach
                            {{-- <form id="deleteOrder" method="POST"
                                action="{{ route('products.destroy', $products) }}"  class="d-none">
                                @csrf
                                @method('DELETE')
                            </form> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
