@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-5 text-center">
            <h1 class="text-success mb-4">🎉 Booking Confirmed!</h1>
            <p class="fs-5">Thank you for booking with us. Your escape room adventure awaits!</p>
            <a href="{{ route('booking.form') }}" class="btn btn-primary mt-4">Book Another Room</a>
        </div>
    </div>
</div>
@endsection
