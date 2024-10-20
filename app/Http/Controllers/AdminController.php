<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Models\Booking;
use App\Models\Gallery;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\BookingNotification;
use App\Notifications\SendEmailNotification;
use Illuminate\Notifications\Notification;

class AdminController extends Controller

{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            if ($usertype == 'user') {
                $room =  Room::all();
                $gallery =  Gallery::all();
                
                return view('home.index', compact('room'),  compact('gallery'));
            } else if ($usertype == 'admin') {
                return view('admin.index');
            } else {
                return redirect()->back();
            }
        }
    }
    public function home()
    {
        $room =  Room::all();
        $gallery =  Gallery::all();

        return view('home.index',  compact('room'),  compact('gallery'));
    }

    public function create_room()
    {
        return view("admin.create_room");
    }
    public function add_room(Request $request)
    {
        $data = new Room();
        $data->room_title = $request->title;
        $data->Description = $request->Description;
        $data->price = $request->price;
        $data->wifi = $request->Wifi;
        $data->room_type = $request->type;
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $data->image = $imagename;
        }

        $data->save();
        return redirect()->back();
    }
    public function view_room()
    {
        $data = Room::all();
        return view('admin.view_room', compact('data'));
    }
    public function delete_room($id)
    {
        $data = Room::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function update_room($id)
    {

        $data = Room::find($id);
        return view('admin.update_room', compact('data'));
    }
    public function edit_room(Request $request, $id)
    {
        $data = Room::find($id);

        $data->room_title = $request->title;
        $data->Description = $request->Description;
        $data->price = $request->price;
        $data->wifi = $request->Wifi;
        $data->room_type = $request->type;
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        return redirect()->back();
    }
    public function delete_booking($id)
    {
        $data = Booking::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function approve_book($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'approve';
        $booking->save();
        return redirect()->back();
    }
    public function reject_book($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'reject';
        $booking->save();
        return redirect()->back();
    }
    public function view_gallery()
    {
        $gallery = Gallery::all();


        return view('admin.gallery', compact('gallery'));
    }
    public function upload_gallery(Request $request)
    {
        $data =  new Gallery();
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('gallery', $imagename);
            $data->image = $imagename;
            $data->save();
            return redirect()->back();
        }
    }
    public function delete_gallery($id)
    {
        $data = Gallery::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function all_message()
    {
        $data = Contact::orderBy('created_at', 'desc')->get();

        return view('admin.all_message', compact('data'));
    }
    public function send_mail($id)
    {
        $data = Contact::find($id);
        $data->status = 'send';

        return view('admin.send_mail',  compact('data'));
    }
    public function mail(Request $request, $id)
    {
        $data = Contact::find($id);

        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'endline' => $request->endline,
        ];

        $data->notify(new SendEmailNotification($details)); 

        return redirect()->back();
    }
}
