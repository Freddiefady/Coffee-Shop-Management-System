@extends('layouts.dashboard.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Edit Order</h5>
                    <p class="mt-4">Current Status is: <strong class="alert alert-warning">{{ $booking->status }}</strong></p>
                    <form method="POST" action="{{ route('booked-up.update', $booking) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-outline mb-4 mt-4">
                            <select name="status" class="form-select  form-control" aria-label="Default select example">
                                <option selected>Choose Status</option>
                                <option value="pending">Pending</option>
                                <option value="proccessing">Proccessing</option>
                                <option value="booked">Booked</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
