<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ResultController extends Controller
{

    public function store(Request $request)
    {
        $result = Result::add($request);
        if ($result['success']) {
            Flash::success('Marks are added successfully');
            return redirect()->back();
        } else {
            flash()->error('Unable to add record');
            return redirect()->back();
        }
    }

    public function viewResult(Request $request)
    {
    try {
         $user = Auth::user()->role;
            if ($user === "Faculty") {
                DB::beginTransaction();
                $course_name = $request->input('course_name');
                $attendanceData = DB::table('students')->where('course_name', '=', $course_name)->paginate(10);
                return view('Result.view_result', compact('attendanceData'));
            }
            if ($user === "Admin") {
                DB::beginTransaction();
                $test_name = $request->input('term_test');
                $course_name = $request->input('course_name');
                $attendanceData = DB::table('students')->where('course_name', '=', $course_name)->paginate(10);
                return view('Result.view_result', compact('attendanceData', 'test_name'));
            }
            
            } catch (\Exception $e) {
           DB::rollBack();
        }
    }


    public function getById($id, $test_name)
    {

   //     $roll_no = Student::getStudentById($id);
  $roll_no = Student::getStudentResultById($id);

        return view('Result.add_result', compact('roll_no', 'test_name'));

    }

    public function getUpdateResultById(Request $request)
    {

        $roll_no = Student::getStudentById($request);
        $subjects = DB::table('result')->where('roll_no', '=', $roll_no->roll_no)->get();
        return view('Result.show_subjects', compact('subjects'));

    }

    public function destroy(Request $request, Result $id)
    {
        $id->delete();
        flash()->success('Record is deleted successfully');
        return redirect()->back();

    }

    public function studentResultView(Request $request)
    {
        try {
            $user = Auth::user()->role;
            $roll_no = Auth::user()->user_id;
            if ($user === "STD") {

                DB::beginTransaction();
                if ($request != null) {

                    $test_name = $request->input('term_test');
                    $marksData = DB::table('result')->where('roll_no', '=', $roll_no)->where('test_name', '=', $test_name)->get();
                    return view('Result.view_result_student', compact('marksData'));
                } else {
                    $marksData = DB::table('result')->where('roll_no', '=', $roll_no)->get();
                    return view('Result.view_result_student', compact('marksData'));
                }

            }
        } catch (\Exception $e) {

            DB::rollBack();
        }

    }

    public function updateResult(Request $request)
    {
        $subjectData = DB::table('result')->find($request->id);

        return view('Result.edit_marks', compact('subjectData'));

    }

    public function save(Request $request)
    {
    
     $validator = Validator::make($request->all(),
            [
                'subject' => 'required',
               'faculty_name' => 'required',
                'marks' => 'required|numeric',
               'out_off' => 'required|numeric',
            ]);

        if ($validator->passes()) {
            $valid = true;
        } else {
            $valid = false;
        }

        if ($valid) {
    
        $marks = Result::find($request->input('id'));
        $marks->subject = $request->input('subject');
        $marks->faculty_name = $request->input('faculty_name');
        $marks->marks = $request->input('marks');
        $marks->out_off = $request->input('out_off');
        $marks->save();
        flash()->success('Result data is updated successfully');
        return redirect()->back();
         
          }
           else
            {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        
    }

    public function selectCourse()
    {
        return view('Result.select_course_result');
    }


}
