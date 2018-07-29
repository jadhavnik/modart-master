<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Faculty extends Model
{
    protected $table = 'faculty';
    Protected $primaryKey = "id";
    protected $fillable = [
        'name', 'last_name', 'mobile', 'email', 'dob', 'gender', 'picture', 'address', 'course_name', 'status', 'academic_yr',
        'class_room','role','username', 'password'
    ];

    public static function getFacultyData()
    {
        try
        {

            $user=Auth::user()->role;
            if($user === "Faculty")
            {
                DB::beginTransaction();

                $get_table_data=DB::table('faculty')->get();
        return $get_table_data;
            }
            if($user === "Admin")
            {
                DB::beginTransaction();

                $get_table_data=DB::table('faculty')->get();
   return $get_table_data;
            }

        }
        catch (\Exception $e)
        {
            DB::rollBack();
        }
    }

    public static function getFacultyId()
    {
        $stdId= DB::table('faculty')->orderBy('id', 'desc')->first();

        if($stdId == null)
        {
            $roll_no='FCT1';
            return $roll_no;
        }
        else {
            $id = $stdId->id;
            $count = (int)$id + 1;
 $roll_no = 'FCT' . $count;
            return $roll_no;
        }
    }

    public static function getFacultyById(Request $request)
    {
        try
        {
            if($request)
            {
                DB::beginTransaction();

                $get_table_data=DB::table('faculty')->find($request->id);
              return $get_table_data;
            }

        }
        catch (\Exception $e)
        {
            DB::rollBack();
        }
    }

    public static function getFacultyByUserId(User $user)
    {
        try
        {
            if($user)
            {
                DB::beginTransaction();

                $get_table_data=DB::table('faculty')->where('faculty_id','=',$user->user_id)->first();
                return $get_table_data;
            }

        }
        catch (\Exception $e)
        {
            DB::rollBack();
        }
    }

    public static function saveFaculty(Request $request)
    {

        try {
            $faculty = new Faculty();

            $image = $request->file('picture');

            $faculty['picture'] = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/images/faculty');

            $image->move($destinationPath, $faculty['picture']);

            $faculty->faculty_id = Faculty::getFacultyId();
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
            $faculty->role = "Faculty";
            $faculty->username = Faculty::getFacultyId();
            $facultyUserId=$faculty->username;

            $faculty->password = $request->input('password');

            $password = mt_rand(10000000, 99999999);
            $faculty->password = $password;
            $faculty->save();

            $user = new User();
            $user->email = $request->input('email');
            $user->full_name = $request->input('name');
            $user->name =$facultyUserId;
            $user->user_id = $facultyUserId;
            $user->password = bcrypt($password);
            $user->status =  $request->input('status');
            $user->role = "Faculty";
            $user->save();
            DB::commit();
            return ['success'=>true];

        } catch (\Exception $e) {
            DB::rollBack();
            return ['success'=>false,'errors'=>$e->getMessage()];
   }

    }

    public static function saveFacultyPassword(User $user,$newPassword)
    {
        \DB::table('faculty')->where('email',$user->email)->update(['password' =>$newPassword]);
  }
  
   public static function deleteUserData(Faculty $data)
    {
        \DB::table('users')->where('user_id','=',$data->faculty_id)->delete();
    }
}
