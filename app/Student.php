<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Student extends Model
{
    protected $table='students';

    protected $fillable = [
        'roll_no', 'name', 'middle_name', 'last_name', 'mobile', 'email', 'dob', 'gender', 'picture', 'course_name', 'status', 'academic_yr',
        'batch_yr', 'p_first_name', 'p_middle_name', 'p_last_name', 'p_mobile', 'p_email', 'address','username', 'password'
    ];



    public function course()
    {
     return $this->hasOne(Course::class);
    }

    public static function getRollNo()
    {
        $stdId= DB::table('students')->orderBy('id', 'desc')->first();

        if($stdId == null)
        {
            $roll_no='STU1';
            return $roll_no;
        }
        else{
        $id=$stdId->id;
        $count=(int)$id+1;
     $roll_no='STU'.$count;
        return $roll_no;
        }
    }

    public static function getStudentData()
    {
        try
        {

            $user=Auth::user()->role;
            if($user === "Faculty")
            {
                DB::beginTransaction();

                $get_table_data=DB::table('students')->get();
            return $get_table_data;
            }
            if($user === "Admin")
            {
                DB::beginTransaction();

                $get_table_data=DB::table('students')->get();
            return $get_table_data;
            }

        }
        catch (\Exception $e)
        {
            DB::rollBack();
        }
    }

    public static function getStudentById(Request $request){
        try
        {


            if($request)
            {
                DB::beginTransaction();

                $get_table_data=DB::table('students')->find($request->id);
      return $get_table_data;
            }

        }
        catch (\Exception $e)
        {
            DB::rollBack();
        }
    }

 public static function getStudentResultById($id){
        try
        {


            if($id)
            {
                DB::beginTransaction();

//                $get_table_data=DB::table('students')->find($request->id);
                $get_table_data=DB::table('students')->find($id);
                //   return view('users.view_time_table',compact('get_table_data'));
                return $get_table_data;
            }

        }
        catch (\Exception $e)
        {
            DB::rollBack();
        }
    }




    public static function getStudentByUserId(User $user)
    {
        try
        {
            if($user)
            {
                DB::beginTransaction();
                $get_table_data=DB::table('students')->where('roll_no','=',$user->user_id)->first();
                return $get_table_data;
            }

        }
        catch (\Exception $e)
        {
            DB::rollBack();
        }
    }

    public static function getStudentByCourseName(Student $user)
    {
        try
        {
            if($user)
            {
                DB::beginTransaction();

                $get_table_data=DB::table('students')->where('roll_no','=',$user->user_id)->first();
                return $get_table_data;
            }

        }
        catch (\Exception $e)
        {
            DB::rollBack();
        }
    }

    public static function saveStudent(Request $request)
    {
        try {
        $student = new Student();
        $image = $request->file('picture');

        $student['profile_pic'] = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images/student');
        $image->move($destinationPath, $student['profile_pic']);
        $student->roll_no = Student::getRollNo();
     $student->name = $request->input('first_name');
        $student->middle_name = $request->input('middle_name');
        $student->last_name = $request->input('last_name');
        $student->mobile = $request->input('mobile');
        $student->email = $request->input('email');
        $student->dob = $request->input('dob');
        $student->gender = $request->input('gender');
        $student->course_name=$request->input('course_name');
        $student->status = $request->input('status');
        $student->academic_yr = $request->input('academic_yr');
        $student->batch_yr = $request->input('batch_yr');
        $student->p_first_name = $request->input('p_first_name');
        $student->p_middle_name = $request->input('p_middle_name');
        $student->p_last_name = $request->input('p_last_name');
        $student->p_mobile = $request->input('p_mobile');
        $student->p_email = $request->input('p_email');
        $student->address = $request->input('address');
        $student->username = Student::getRollNo();
        $studentRollNo=  $student->username;
     $password = mt_rand(10000000, 99999999);
        $student->password = $password;
      $student->role = "STD";


//This will be saved in  user table so user can directly login when admin / faculty will send email

        $user = new User();
        $user->email = $request->input('email');
        $user->full_name = $request->input('first_name');
            $user->status = $request->input('status');
      $user->name = $studentRollNo;
          $user->user_id = $studentRollNo;
        $user->password = bcrypt($password);
        $user->role = "STD";
        $user->save();

        //code end here for user table

        $student->save();
            DB::commit();
            return ['success'=>true];

        } catch (\Exception $e) {

            DB::rollBack();

            return ['success'=>false,'errors'=>$e->getMessage()];

    }
    }

    public static function saveStudentPaasword(User $user,$newPassword)
    {
    
        \DB::table('students')->where('email',$user->email)->update(['password' =>$newPassword]);
    }
    
     public static function deleteUserData(Student $data)
    {
        \DB::table('users')->where('user_id','=',$data->roll_no)->delete();
    }
    
}
