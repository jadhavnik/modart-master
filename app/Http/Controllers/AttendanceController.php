<?php

namespace App\Http\Controllers;
use App\Attendance;
use App\Faculty;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Laracasts\Flash\Flash;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getStudentByCourse()
    {
        $user = Auth::user()->role;
        $facultyCourse = Auth::user();
        if ($user === "Faculty") {
            DB::beginTransaction();
            $faculty = Faculty::getFacultyByUserId($facultyCourse);
            $getStudentData = DB::table('students')->where('course_name', '=', $faculty->course_name)->where('status','=','1')->paginate(15);
            return view('attendance.add_attendence', compact('getStudentData'));
        }
    }
    
     public function getStudentAdmin(Request $request)
    {
        $user = Auth::user()->role;
        $course_name=$request->input('course_name');
        if ($user === "Admin") {
            DB::beginTransaction();
        //    $getStudentData = DB::table('students')->where('status','=',1)->paginate(15);
           $getStudentData = DB::table('students')->where('course_name','=',$course_name)->paginate(15);
            return view('attendance.add_attendence_admin', compact('getStudentData'));
        }
    }
    
    public function store(Request $request)
    {

        $input = Input::all();

        $rules = [];

        foreach ($input['roll_no'] as $key => $val) {
            $rules['month.*'] = 'required';
            $rules['attendance.*'] = 'required|max:101';
        }
        $validator = Validator::make($input, $rules);
        if ($validator->passes()) {
            $valid = true;
        } else {
            $valid = false;
        }
        if ($valid) {
            $result = Attendance::saveAttendance($request);
            if ($result['success']) {
                Flash::success('Attendance is added successfully');
                 return view('attendance.select_attendance_course');
             //   return redirect()->back();
            } else {
                flash()->error('Unable to add record');
               return view('attendance.select_attendance_course');
              //  return redirect()->back();
            }
        } else {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
    }
    public function save(Request $request)
    {
        $this->validate($request,
            [
                'month' => 'required',
                'attendance' => 'required|numeric',
            ]);

        $attendance = Attendance::find($request->input('id'));
        $attendance->month = $request->input('month');
        $attendance->attendance = $request->input('attendance');
        $attendance->save();
        flash()->success('attendance is updated successfully');

        return redirect('/view_attendance');
    }
    public function getAttendanceByCourse()
    {
        $user = Auth::user()->role;
        $facultyCourse = Auth::user();
        if ($user === "Faculty") {
            DB::beginTransaction();
            $faculty = Faculty::getFacultyByUserId($facultyCourse);
            $attendanceData = DB::table('attendance')->where('course_name', '=', $faculty->course_name)->where('status','=','1')->orderBy('roll_no', 'asc')->paginate(10);
            return view('attendance.faculty_view_stud_attend', compact('attendanceData'));
        }
          if ($user === "Admin") {
            DB::beginTransaction();
            $attendanceData = DB::table('attendance')->where('status','=',1)->orderBy('roll_no', 'asc')->paginate(10);
            return view('attendance.faculty_view_stud_attend', compact('attendanceData'));
        }
    }
    public function destroy(Request $request, Attendance $data)
    {
        try {
            $data->delete();
            flash()->success('Attendance record is deleted successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            flash()->error('Problem in deleting Attendance record');
           return redirect()->back();
        }
    }
    public function getById(Request $id)
    {
        $student = Attendance::getAttendanceById($id);
        return view('attendance.update_attendance', compact('student'));
    }
    public function getAttendanceStudent()
    {
        $user = Auth::user();
        $attendanceData = DB::table('attendance')->where('roll_no', '=', $user->user_id)->orderBy('year', 'desc')->where('status','=','1')->orderBy('month_no', 'asc')->paginate(50);
        return view('attendance.view_attendance_student', compact('attendanceData'));
    }
    
     public function GetSearch(Request $request)
    {
        $search=$request->input('search');

        $attendanceData =DB::table('attendance')
          //  ->where('status','=',1)
            ->where(function ($query) use ($search) {
                $query->orWhere('name','like',"%{$search}%")
                    ->orWhere('month','like',"%{$search}%")
                    ->orWhere('year','like',"%{$search}%")
                    ->orWhere('course_name','like',"%{$search}%")
                    ->orWhere('roll_no','like',"%{$search}%")
                    ->orWhere('email','like',"%{$search}%");
            })->paginate(10);

        return view('attendance.faculty_view_stud_attend',compact('attendanceData'));

    }
    
    
     public function selectCourse()
    {
        return  view('attendance.select_course_attendance');
    }
    
     public function getAttendanceByCourseAdmin(Request $request)
    {
        $user = Auth::user()->role;
        $facultyCourse = Auth::user();
        if ($user === "Faculty") {
            DB::beginTransaction();
            $faculty = Faculty::getFacultyByUserId($facultyCourse);

            $attendanceData = DB::table('attendance')->where('course_name', '=', $faculty->course_name)->where('status','=',1)->orderBy('roll_no', 'asc')->paginate(10);

            return view('attendance.faculty_view_stud_attend', compact('attendanceData'));
        }
    
        if ($user === "Admin") {

            DB::beginTransaction();

            $course_name = $request->input('course_name');

            DB::beginTransaction();
            $attendanceData = DB::table('attendance')->where('course_name', '=', $course_name)->orderBy('roll_no', 'asc')->paginate(10);
            return view('attendance.faculty_view_stud_attend', compact('attendanceData'));
        }


    }
    
      public function selectCourseAdmin()
    {
        return  view('attendance.select_attendance_course');
    }
    
    
    
    
}



