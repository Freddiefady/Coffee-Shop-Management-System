@extends('layouts.dashboard.admin')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Create Admins</h5>
                    <form method="POST" action="{{ route('admins.store') }}">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="email" name="email" id="form2Example1" class="form-control"
                                placeholder="email" />
                                @error('email')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" name="name" id="form2Example1" class="form-control"
                                placeholder="username" />
                                @error('name')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                        </div>
                        <div class="form-outline mb-4">
                            <input type="password" name="password" id="form2Example1" class="form-control"
                                placeholder="password" />
                                @error('password')
                                    <strong class="text-danger">{{ $message }}</strong>
                                @enderror
                        </div>
                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
