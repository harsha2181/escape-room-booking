@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-4">
            <h2 class="text-center mb-4">Book Your Escape Room</h2>

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('booking.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="date" class="form-label">Select Date</label>
                    <input type="date" name="date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="start_time" class="form-label">Start Time</label>
                    <input type="time" name="start_time" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="end_time" class="form-label">End Time</label>
                    <input type="time" name="end_time" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Confirm Booking</button>
            </form>
        </div>
    </div>
</div>
@endsection
