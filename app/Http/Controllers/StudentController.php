<?php

namespace App\Http\Controllers;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Laracasts\Flash\Flash;
use File;


class StudentController extends Controller
{
    public function index()
    {
        return view('student');
    }


    public function addStudent(Request $request)
    {

        $dt = new Carbon();
        $before = $dt->subYears(18)->format('Y-m-d');

        $validator = Validator::make($request->all(),
            [
                'email' => 'required|email',
                'first_name' => 'required|alpha',
                'middle_name' => 'nullable|alpha',
                'last_name' => 'required|alpha',
                'mobile' => 'required|numeric|regex:/[7-9]{1}[0-9]{9}/',
                'dob' => 'required|date|before:' . $before,
                'gender' => 'required',
                'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'address' => 'required|max:255',
                'course_name' => 'required',
                'status' => 'required',
                'academic_yr' => 'nullable',
                'batch_yr' => 'required',
                'p_first_name' => 'required|alpha',
                'p_middle_name' => 'required|alpha',
                'p_last_name' => 'required|alpha',
                'p_mobile' => 'required|numeric|regex:/[7-9]{1}[0-9]{9}/',
                'p_email' => 'required|email',
            ]);

        if ($validator->passes()) {
            $valid = true;
        } else {
            $valid = false;
        }
        if ($valid) {
            $result = Student::saveStudent($request);
            if ($result['success']) {
                Flash::success('Student record added successfully');
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
            if ($user === "Faculty") {
                DB::beginTransaction();
                $getStudentData = DB::table('students')->paginate(9);
                return view('student.view_student', compact('getStudentData'));
            }
            if ($user === "Admin") {
                DB::beginTransaction();

                $getStudentData = DB::table('students')->paginate(9);
                return view('student.view_student', compact('getStudentData'));
            }

        } catch (\Exception $e) {
            DB::rollBack();
        }


        $getStudentData = Student::getStudentData();
        return view('student.view_student', compact('getStudentData'));
    }


    public function destroy(Request $request, Student $data)
    {
        try {
        
        
         Student::deleteUserData($data);
            $data->delete();
            flash()->success('Student record is deleted successfully');
     return  view('faculty.select_course_faculty');
        } catch (\Exception $e) {
            flash()->error('Problem in deleting Student record');
  return redirect()->back();
        }
    }


    public function getById(Request $request)
    {
        $student = Student::getStudentById($request);
        return view('student.update_student', compact('student'));
    }

    public function getStudentInfo(Request $request)
    {
        $student = Student::getStudentById($request);
        return view('student.student_info', compact('student'));
    }

    public function store(Request $request)
    {
        $student = Student::find($request->input('id'));
     $dt = new Carbon();
        $before = $dt->subYears(18)->format('Y-m-d');

        $validator = Validator::make($request->all(),
            [
                'email' => 'required|email',
                'first_name' => 'required|alpha',
                'middle_name' => 'nullable|alpha',
                'last_name' => 'required|alpha',
                'mobile' => 'required|numeric|regex:/[7-9]{1}[0-9]{9}/',
                'dob' => 'required|date|before:' . $before,
                'gender' => 'required',
                'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'address' => 'required|max:255',
                'course_name' => 'required',
                'status' => 'required',
                'batch_yr' => 'required',
                'p_first_name' => 'required|alpha',
                'p_middle_name' => 'required|alpha',
                'p_last_name' => 'required|alpha',
                'p_mobile' => 'required|numeric|regex:/[7-9]{1}[0-9]{9}/',
                'p_email' => 'required|email',
            ]);

        if ($validator->passes()) {
            $valid = true;
        } else {
            $valid = false;
        }
    if ($valid) {

            if ($request->has('del_logo')) {
                $filename = $student->profile_pic;
                File::delete(public_path("images/student/" . $filename));
                $student->profile_pic = "";
            }

            if ($request->hasFile('picture')) {
     $image = $request->file('picture');
                $filename = $student->profile_pic;

                if (file_exists(public_path("images/student/" . $filename))) {
                    File::delete(public_path("images/student/" . $filename));
                }

                $student['profile_pic'] = time() . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('/images/student');

                $image->move($destinationPath, $student['profile_pic']);
            }


            $student->name = $request->input('first_name');
            $student->middle_name = $request->input('middle_name');
            $student->last_name = $request->input('last_name');
            $student->mobile = $request->input('mobile');
            $student->email = $request->input('email');
            $student->dob = $request->input('dob');
            $student->gender = $request->input('gender');
            $student->course_name = $request->input('course_name');
            $student->status = $request->input('status');
            $student->academic_yr = $request->input('academic_yr');
            $student->batch_yr = $request->input('batch_yr');
            $student->p_first_name = $request->input('p_first_name');
            $student->p_middle_name = $request->input('p_middle_name');
            $student->p_last_name = $request->input('p_last_name');
            $student->p_mobile = $request->input('p_mobile');
            $student->p_email = $request->input('p_email');
            $student->address = $request->input('address');
           
             try
          {
            
            $count= \DB::table('attendance')->where('email',$student->email)->get();
            if(count($count)>0){
                \DB::table('attendance')->where('email',$student->email)->update(['status' =>$student->status]);
              
            }
            
            User::changeStatusStudent($student);
            $student->save();
            flash()->success('Student record updated successfully');
            return redirect()->back();
            
              } catch (\Exception $e) {
        flash()->error('Problem in updating Student record , email is duplicate');
//            $success="image uploaded successfully";

        return redirect()->back();
    }
            
         } else {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
    }

    public function updateStuProfile(Request $request)
    {
        $student = Student::find($request->input('id'));
   $dt = new Carbon();
        $before = $dt->subYears(18)->format('Y-m-d');

        $validator = Validator::make($request->all(),
            [
                'email' => 'required|email',
                'first_name' => 'required|alpha',
               
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
                $filename = $student->profile_pic;
                File::delete(public_path("images/student/" . $filename));
                $student->profile_pic = "";
            }

            if ($request->hasFile('picture')) {
           $image = $request->file('picture');
                $filename = $student->profile_pic;

                if (file_exists(public_path("images/student/" . $filename))) {
                    File::delete(public_path("images/student/" . $filename));
                }

                $student['profile_pic'] = time() . '.' . $image->getClientOriginalExtension();

                $destinationPath = public_path('/images/student');

                $image->move($destinationPath, $student['profile_pic']);
       }
            $student->name = $request->input('first_name');
            $student->middle_name = $request->input('middle_name');
            $student->last_name = $request->input('last_name');
            $student->mobile = $request->input('mobile');
            $student->email = $request->input('email');
            $student->dob = $request->input('dob');
            $student->gender = $request->input('gender');
          $student->username = $request->input('username');
       try {
                  $user_id = Auth::user();
                $user_email = $request->input('email');
                \DB::table('users')->where('user_id', $user_id->user_id)->update(['email' => $user_email]);
                \DB::table('users')->where('user_id', $user_id->user_id)->update(['full_name' =>$student->name]);
                $student->save();
                flash()->success('Profile record updated successfully');
                return redirect()->back();
            
            } catch (\Exception $e) {
                flash()->error('Problem in updating profile , email id is duplicate');
                return redirect()->back();
          }
        } else {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

    }
    public function updateStudentData()
    {

        $user = \Auth::user();

        if ($user->role == "STD") {
            $student = Student::getStudentByUserId($user);
            return view('student.update_profile_stud', compact('student'));
        }
    }
    public function Save()
    {}
    public function getPassword()
    {
        return view('password.change_student_pass');
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
            $StudentCourse = User::find($auth->id);
            $newPassword = $request->input('new_password');
            $oldPassword = $request->input('old_pass');

            Student::saveStudentPaasword($StudentCourse, $newPassword);
  $isok = password_verify($oldPassword, $StudentCourse->password);
            if ($isok) {

                $StudentCourse->password = bcrypt($newPassword);
                $StudentCourse->save();
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
   
//           $search = \Request::get('search'); //<-- we use global request to get the param of URI

            $getStudentData =DB::table('students')
    //        ->where('status','=',1)
            ->where(function ($query) use ($search) {
                $query->orWhere('name','like',"%{$search}%")
                    ->orWhere('middle_name','like',"%{$search}%")
                    ->orWhere('last_name','like',"%{$search}%")
                    ->orWhere('email','like',"%{$search}%")
                     ->orWhere('roll_no','like',"%{$search}%");
             })->paginate(10);

        return view('faculty.view_student_by_course',compact('getStudentData'));

    }

}
