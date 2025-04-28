@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <!-- Top Buttons: Profile & Logout -->
    <div class="d-flex justify-content-end mb-3 gap-2">
        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Profile</a>

        <!-- Logout form -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>

    <div class="card p-4 shadow-lg">
        <h2 class="text-center mb-4">🗓️ My Bookings</h2>

        @if($bookings->isEmpty())
            <p class="text-center text-muted">No bookings yet. Book your adventure now!</p>
        @else
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Status</th>
                        <th>Payment ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        <tr>
                            <td>{{ $booking->date }}</td>
                            <td>{{ $booking->start_time }}</td>
                            <td>{{ $booking->end_time }}</td>
                            <td>
                                <span class="badge
                                    {{ $booking->status === 'confirmed' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td>{{ $booking->payment_id }}</td>
                            <td>
                                @if($booking->status === 'confirmed')
                                <form method="POST" action="{{ route('booking.cancel', $booking->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to cancel this booking?')">
                                        Cancel
                                    </button>
                                </form>
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <div class="text-center mt-4">
            <a href="{{ route('booking.form') }}" class="btn btn-primary">➕ Book New Room</a>
        </div>
    </div>
</div>
@endsection
