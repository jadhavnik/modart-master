<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function addCourse()
    {
        return view('course.add_course');
    }


    public function store(Request $request)
  {
      $validator = Validator::make($request->all(), [
          'course_name' => 'required',

      ]);

      if ($validator->passes()) {
          $course = new Course();
          $course->course_name = $request->input('course_name');
          $course->save();
          flash()->success('Course is added successfully');
        return redirect()->back();
      }
      flash()->error($validator->errors()->first());
      return redirect()->back();
  }

    public function destroy(Request $request, Course $data)
    {
        $data->delete();
        flash()->success('Course is deleted successfully');
        return redirect('/view_course');

    }

    public function view()
    {
        $getEventData=DB::table('course')->paginate(9);
        return view('course.view_course', compact('getEventData'));
    }
}
