<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Hash;
use File;


class FacultyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('faculty.add_faculty');
    }

    public function getImagePath(Request $request)
    {

        $input = $request->all();
        $image = $request->file('picture');

        $input['picture'] = time() . '.' . $image->getClientOriginalExtension();

        $destinationPath = public_path('/images/faculty');

        $image->move($destinationPath, $input['picture']);

        return $input;
    }

    public function save(Request $request)
    {


        $dt = new Carbon();
        $before = $dt->subYears(18)->format('Y-m-d');

        $validator = Validator::make($request->all(),
            [
                'email' => 'required|email',
                'name' => 'required|alpha',
                'last_name' => 'required|alpha',
                'mobile' => 'required|numeric|regex:/[7-9]{1}[0-9]{9}/',
                'dob' => 'required|date|before:' . $before,
                'gender' => 'required',
                'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'address' => 'required|max:255',
                'course_name' => 'required',
                'status' => 'required',
                'academic_yr' => 'required',
                'class_room' => 'required'
            ]);
        if ($validator->passes()) {
            $valid = true;
        } else {
            $valid = false;
        }

        if ($valid) {
            $result = Faculty::saveFaculty($request);
            if ($result['success']) {
                Flash::success('Faculty record is added successfully');
                return redirect()->back();
            } else {
                flash()->error('Email id already exists, unable to add record');
                return redirect()->back()->withInput();
            }
        } else {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
    }

    public function view()
    {
        try {

            $user = Auth::user()->role;

            if ($user === "Admin") {
                DB::beginTransaction();

                $facultyData = DB::table('faculty')->paginate(9);
                return view('faculty.view_faculty', compact('facultyData'));
            }

            /********      Below code is for future use if faculty wants to see others profile       ********/

            if ($user === "Faculty") {
                DB::beginTransaction();

                $facultyData = DB::table('faculty')->paginate(9);
                //   return view('users.view_time_table',compact('get_table_data'));
                return view('faculty.view_faculty', compact('facultyData'));
            }

            /*******                             *************************/
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function destroy(Request $request, Faculty $data)
    {
        try {
           Faculty::deleteUserData($data);
            $data->delete();

            flash()->success('Faculty record is deleted successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            flash()->error('Problem in deleting Faculty record');
            return redirect()->back();
        }
    }


    public function getById(Request $request)
    {
        $faculty = Faculty::getFacultyById($request);
        return view('faculty.update_faculty', compact('faculty'));
    }

    public function getFacultyInfo(Request $request)
    {
        $faculty = Faculty::getFacultyById($request);
        return view('faculty.faculty_info', compact('faculty'));
    }

    public function store(Request $request)
    {
        $faculty = Faculty::find($request->input('id'));

        $dt = new Carbon();
        $before = $dt->subYears(18)->format('Y-m-d');

        $validator = Validator::make($request->all(),
            [
                'email' => 'required|email',
                'name' => 'required|alpha',
                'last_name' => 'required|alpha',
                'mobile' => 'required|numeric|regex:/[7-9]{1}[0-9]{9}/',
                'dob' => 'required|date|before:' . $before,
                'gender' => 'required',
                'role' => 'required',
                'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'course_name' => 'required',
                'status' => 'required'
            ]);

        if ($validator->passes()) {
            $valid = true;
        } else {
            $valid = false;
        }

        if ($valid) {
            if ($request->has('del_logo')) {
                $filename = $faculty->picture;
                File::delete(public_path("images/faculty/" . $filename));
                $faculty->picture = "";
            }

            if ($request->hasFile('picture')) {
                $image = $request->file('picture');
                $filename = $faculty->picture;

                if (file_exists(public_path("images/faculty/" . $filename))) {
                    File::delete(public_path("images/faculty/" . $filename));
                }

                $faculty['picture'] = time() . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('/images/faculty');

                $image->move($destinationPath, $faculty['picture']);
            }
            $faculty->name = $request->input('name');
            $faculty->last_name = $request->input('last_name');
            $faculty->mobile = $request->input('mobile');
            $faculty->email = $request->input('email');
            $faculty->dob = $request->input('dob');
            $faculty->gender = $request->input('gender');
            $faculty->address = $request->input('address');
            $faculty->course_name = $request->input('course_name');
            $faculty->status = $request->input('status');
            $faculty->academic_yr = $request->input('academic_yr');
            $faculty->class_room = $request->input('class_room');
            $faculty->role = $request->input('role');
            User::changeStatusFaculty($faculty);
            $faculty->save();
            flash()->success('Faculty record updated successfully');
            return redirect()->back();

        } else {
            return redirect()->back()->withErrors($validator->errors());
        }

    }

    public function saveFaculty(Request $request)
    {
        $faculty = Faculty::find($request->input('id'));
        $dt = new Carbon();
        $before = $dt->subYears(18)->format('Y-m-d');
        $validator = Validator::make($request->all(),
            [
                'email' => 'required|email',
                'name' => 'required|alpha',
                'last_name' => 'required|alpha',
                'mobile' => 'required|numeric|regex:/[7-9]{1}[0-9]{9}/',
                'dob' => 'required|date|before:' . $before,
                'gender' => 'required',
                'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
               
            ]);
        if ($validator->passes()) {
            $valid = true;
        } else {
            $valid = false;
        }

        if ($valid) {

            if ($request->has('del_logo')) {
                $filename = $faculty->picture;
                File::delete(public_path("images/faculty/" . $filename));
                $faculty->picture = "";
            }

            if ($request->hasFile('picture')) {
                $image = $request->file('picture');
                $filename = $faculty->picture;

                if (file_exists(public_path("images/faculty/" . $filename))) {
                    File::delete(public_path("images/faculty/" . $filename));
                }

                $faculty['picture'] = time() . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('/images/faculty');

                $image->move($destinationPath, $faculty['picture']);
            }
            $faculty->name = $request->input('name');
            $faculty->last_name = $request->input('last_name');
            $faculty->mobile = $request->input('mobile');
            $faculty->email = $request->input('email');
            $faculty->dob = $request->input('dob');
            $faculty->gender = $request->input('gender');
            $faculty->address = $request->input('address');
        //   $faculty->academic_yr = $request->input('academic_yr');
         //   $faculty->class_room = $request->input('class_room');
            $faculty->username = $request->input('username');
            $faculty->save();
            flash()->success('Faculty record updated successfully');
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors($validator->errors());
        }
    }

    public function updateFacultyData()
    {
        $user = \Auth::user();
        if ($user->role == "Faculty") {
            $faculty = Faculty::getFacultyByUserId($user);
            return view('faculty.update_profile_fac', compact('faculty'));
        }
    }

    public function getStudentByCourse()
    {
        $user = Auth::user()->role;
        $facultyCourse = Auth::user();
        if ($user === "Faculty") {
            DB::beginTransaction();
            $faculty = Faculty::getFacultyByUserId($facultyCourse);
            $getStudentData = DB::table('students')->where('course_name', '=', $faculty->course_name)->where('status','=',1)->paginate(9);
            return view('faculty.view_student_by_course', compact('getStudentData'));
        }
        if ($user === "Admin") {
            DB::beginTransaction();
            $getStudentData = Student::paginate(9);
            return view('faculty.view_student_by_course', compact('getStudentData'));
        }
    }


    public function getPassword()
    {
        return view('password.change_faculty_pass');
    }

    public function savePassword(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'old_pass' => 'required',
                'new_password' => 'required|min:6',
                'con_password' => 'required|min:6|same:new_password'

            ]);
        if ($validator->passes()) {
            $valid = true;
        } else {
            $valid = false;
        }
        if ($valid) {

            $auth = \Auth::user();
            $facultyCourse = User::find($auth->id);
            $newPassword = $request->input('new_password');
            $oldPassword = $request->input('old_pass');

            Faculty::saveFacultyPassword($facultyCourse, $newPassword);
            $isok = password_verify($oldPassword, $facultyCourse->password);
            if ($isok) {

                $facultyCourse->password = bcrypt($newPassword);
                $facultyCourse->save();
                flash()->success('Password updated successfully');
                return redirect()->back();
            }

            flash()->error('Old password is wrong');
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors($validator->errors());
        }
    }
    
     public function GetSearch(Request $request)
    {
        $search=$request->input('search');

        $facultyData =DB::table('faculty')
          //  ->where('status','=',1)
            ->where(function ($query) use ($search) {
                $query->orWhere('name','like',"%{$search}%")
                    ->orWhere('address','like',"%{$search}%")
                    ->orWhere('last_name','like',"%{$search}%")
                    ->orWhere('email','like',"%{$search}%");
            })->paginate(10);

        return view('faculty.view_faculty',compact('facultyData'));

    }
    
      public function getStudentByCourseAdmin(Request $request)
    {
        $user = Auth::user()->role;
        if ($user === "Admin") {
            DB::beginTransaction();
            $course_name=$request->input('course_name');
           // $getStudentData = DB::table('students')->where('course_name', '=', $course_name)->where('status','=',1)->paginate(9);
            $getStudentData = DB::table('students')->where('course_name', '=', $course_name)->paginate(9);
            return view('faculty.view_student_by_course', compact('getStudentData'));
        }
    }

    public function selectCourse()
    {
        return  view('faculty.select_course_faculty');
    }
    
    
    
}