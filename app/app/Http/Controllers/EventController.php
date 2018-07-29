<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use File;

class EventController extends Controller
{

    public function index()
    {
        return view('event.add_event');
    }

    public function getImagePath(Request $request)
    {

        $input = $request->all();
        $image = $request->file('event_image');

        $input['event_image'] = time() . '.' . $image->getClientOriginalExtension();

        $destinationPath = public_path('/images/events');

        $image->move($destinationPath, $input['event_image']);

        return $input;
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'event_name' => 'required',
            'event_description' => 'required',
            'event_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->passes()) {

            $input = $this->getImagePath($request);
            Event::create($input);
            flash()->success('Event is added successfully');
            return redirect()->back();
        }
        flash()->error($validator->errors()->first());
        return redirect()->back();
    }


    public function destroy(Request $request, Event $data)
    {

        if (file_exists(public_path("images/events/" . $data->event_image))) {
            File::delete(public_path("images/events/" . $data->event_image));
        }
        $data->delete();
        flash()->success('Event is deleted successfully');
        return redirect('/view_event');

    }

    public function getByEventId(Request $request)
    {
        $event = DB::table('event')->find($request->id);
        return view('event.event_description', compact('event'));

    }

    public function view()
    {
        try {
            $user = Auth::user()->role;
            if ($user === "Faculty") {
                DB::beginTransaction();
                $getEventData = DB::table('event')->paginate(5);
                return view('event.view_event', compact('getEventData'));
            }
            if ($user === "Admin") {
                DB::beginTransaction();
                $getEventData = DB::table('event')->paginate(5);
                return view('event.view_event', compact('getEventData'));
            }
            if ($user === "STD") {
                DB::beginTransaction();
                $getEventData = DB::table('event')->paginate(6);
                return view('event.student_view', compact('getEventData'));
            }
        } catch (\Exception $e) {
            DB::rollBack();
        }

    }

}
