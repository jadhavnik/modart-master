<?php

namespace App\Http\Controllers;

use App\User;
use App\Student;
use App\TimeTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use File;

class TimeTableController extends Controller
{
    public function index()
    {

        return view('time_table.time_table');
    }

    public function getImagePath(Request $request)
    {

        $input = $request->all();
        $image = $request->file('time_table');

        $input['time_table'] = time() . '.' . $image->getClientOriginalExtension();

        $destinationPath = public_path('/images/time_table');

        $image->move($destinationPath, $input['time_table']);

        return $input;
    }

    public function store(Request $request)
    {
     $validator = Validator::make($request->all(), [
            'name' => 'required',
            'time_table' => 'required|mimes:csv,txt',
        ]);

        if ($validator->passes()) {

            $input = $this->getImagePath($request);
            TimeTable::create($input);
            flash()->success('Time table is uploaded successfully');
      return redirect()->back();
        }
   return redirect()->back()->withErrors($validator->errors());
 }

    public function view_time_table_faculty()
    {
        $getTimeTable = TimeTable::getTimeTable();
        return view('time_table.view_and_delete_time', compact('getTimeTable'));
    }

    public function destroy(Request $request, TimeTable $data)
    {
        if (file_exists(public_path("images/time_table/" . $data->time_table))) {
            File::delete(public_path("images/time_table/" . $data->time_table));
        }
        $data->delete();
        flash()->success('Time Table is deleted successfully');
        return redirect()->back();
   }

    public function edit($request)
    {
        $data = TimeTable::findOrFail($request);
        return view('users.edit_time_table', compact('data'));

    }

    public function post_update_time_table(Request $request)
    {
        $data = TimeTable::findOrFail($request->input('task_id'));
        $data->name = $request->input('name');
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'time_table' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->passes()) {
            $input = $this->getImagePath($request);
            $data->time_table = $input;
            $data->save();
         return redirect()->back();
        }
        flash()->error($validator->errors()->first());
        return redirect()->back();
    }

    public function time_table_faculty_view($request)
    {
        $data = TimeTable::findOrFail($request);
        $user = \Auth::user();
        //currentlly login user
        $getCourseName = TimeTable::getFacultyId($user);
        $timeTable = DB::table('time_tables')->where('name', '=', $data->name)->first();
        $path = public_path('images/time_table/' . $timeTable->time_table);
        $filename = fopen($path, "r");
        if (!file_exists($path) || !is_readable($path))
            return false;
        $header = null;
        $data = array();
        if (($handle = fopen($path, 'r')) !== false) {

            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);

            }
            fclose($handle);
        }
        return view('users.view_time_table')->with('data', $data);


    }

    public function view()
    {
        $user = \Auth::user();
        $getCourseName = TimeTable::getCourseByUserId($user);
        $data = array();
        if (count($getCourseName) > 0) {

            $timeTable = DB::table('time_tables')->where('name', '=', $getCourseName->course_name)->first();
            if (count($timeTable) > 0) {

                $path = public_path('images/time_table/' . $timeTable->time_table);

                $filename = fopen($path, "r");
                if (!file_exists($path) || !is_readable($path))
                    return false;
                $header = null;
                $a = array();
                $x = '';
                if (($handle = fopen($path, 'r')) !== false) {

                    while (($row = fgetcsv($handle, 1000, ',')) !== false) {

                        if (!$header)
                            $header = $row;
                        else
                            $data[] = array_combine($header, $row);
                    }
                    fclose($handle);
                }
                return view('users.view_time_table')->with('data', $data);

            }else {
                return view('users.view_time_table')->with('data', $data);
            }


        }
        return view('users.view_time_table')->with('data', $data);
    }
}
