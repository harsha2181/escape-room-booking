<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function showForm()
    {
        $availableSlots = Cache::remember('available_slots', 60, function() {
            return Booking::whereDate('date', '>=', now())->get();
        });

        return view('booking.form', compact('availableSlots'));
    }

    public function store(BookingRequest $request)
    {
        $overlap = Booking::where('date', $request->date)
            ->where('status', 'confirmed') // <-- Add this line here
            ->where(function($query) use ($request) {
            $query->whereBetween('start_time', [$request->start_time, $request->end_time])
              ->orWhereBetween('end_time', [$request->start_time, $request->end_time])
              ->orWhere(function($q) use ($request) {
                  $q->where('start_time', '<=', $request->start_time)
                    ->where('end_time', '>=', $request->end_time);
              });
    })->exists();

        if ($overlap) {
            return back()->withErrors(['error' => 'This time slot is already booked.']);
        }

        $paymentId = $this->mockPayment();

        Booking::create([
            'user_id' => auth()->id(),
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => 'confirmed',
            'payment_id' => $paymentId,
        ]);

        Cache::forget('available_slots');

        return redirect()->route('booking.success');
    }

    private function mockPayment()
    {
        $response = [
            'status' => 'success',
            'payment_id' => 'PAY-' . strtoupper(Str::random(10)),
        ];

        if ($response['status'] === 'success') {
            return $response['payment_id'];
        } else {
            abort(500, 'Payment failed.');
        }
    }

    public function cancel(Booking $booking)
{
    // Ensure the logged-in user owns this booking
    if ($booking->user_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    // Only allow canceling if booking is confirmed
    if ($booking->status === 'confirmed') {
        $booking->status = 'cancelled';
        $booking->save();
    }

    return redirect()->route('dashboard')->with('success', 'Booking cancelled successfully.');
}


    public function success()
    {
        return view('booking.success');
    }

    public function dashboard()
    {
    $bookings = Booking::where('user_id', auth()->id())->orderBy('date', 'desc')->get();
    return view('dashboard.index', compact('bookings'));
    }

}
