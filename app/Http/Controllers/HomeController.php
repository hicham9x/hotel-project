<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function room_details($id)
    {
        $room = Room::find($id);
        return view('home.room_details', compact('room'));
    }

    public function add_booking(Request $request, $id)
    {
        // Validation rules
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after:startDate',
        ]);

        // Check if room is already booked for the given dates
        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $isBooked = Booking::where('room_id', $id)
            ->where('start_date', '<=', $endDate)
            ->where('end_date', '>=', $startDate)
            ->exists();

        if ($isBooked) {
            return redirect()->back()->with('error', 'Room is already booked');
        } else {
            // Save booking details
            $booking = new Booking();
            $booking->room_id = $id;
            $booking->name = $request->name;
            $booking->email = $request->email;
            $booking->phone = $request->phone;
            $booking->start_date = $startDate;
            $booking->end_date = $endDate;
            $booking->save();

            return redirect()->back()->with('success', 'Booking is successful');
        }
    }
    public  function bookings()
    {
        $data = Booking::orderBy('created_at', 'desc')->get();

        return view('admin.bookings', compact('data'));
    }
    public  function contact(Request $request)
    {
        $data = new Contact();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->message = $request->message;
        $data->save();
        return redirect()->back()->with('success', 'Message is sent');
    }
}
