@extends('layouts.app')
@section('content')
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Reviews</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span>
                        <span>Reviews</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    @if (session('success'))
    <div class="alert {{ session('success') ? 'alert-success' : 'alert-info' }} alert-dismissible fade show">
        {{ session('success') }}
    </div>
    @endif
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <form method="POST" action="{{ route('review.store') }}" class="billing-form ftco-bg-dark p-3 p-md-5">
                    @csrf
                    <h3 class="mb-4 billing-heading">Write Reviews</h3>
                    <div class="row align-items-end">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                <textarea name="review" rows="8" class="form-control"
                                    placeholder="Write Reviews..."></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
