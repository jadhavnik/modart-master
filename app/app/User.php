<?php

namespace App;

use http\Env\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = [
        'name', 'email', 'password','role','user_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public static function getPassword($request)
    {
        $user=DB::table('users')->where('email','=',$request);
     dd($user);
    }
    public static function changeStatusStudent(Student $student)
    {
  
  \DB::table('users')->where('user_id',$student->roll_no)->update(['status' => $student->status]);
   \DB::table('users')->where('user_id',$student->roll_no)->update(['email' =>$student->email]);
  }



    public static function changeStatusFaculty(Faculty $faculty)
    {
        \DB::table('users')->where('email', $faculty->email)->update(['status' => $faculty->status]);
    }
}
