<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class TimeTable extends Model
{
    protected $table = 'time_tables';
    protected $fillable = ['name', 'time_table'];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
    protected $dates = [
        'created_at', 'updated_at',
    ];

    public static function getTimeTable()
    {
        try {

            $user = Auth::user()->role;
            if ($user === "Faculty") {
                DB::beginTransaction();

                $get_table_data = DB::table('time_tables')->get();
     return $get_table_data;
            }
             
               if ($user === "Admin") {
                DB::beginTransaction();

                $get_table_data = DB::table('time_tables')->get();
     return $get_table_data;
            }

        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public static function getCourseByUserId(User $user)
    {
        try {
            if ($user) {
                DB::beginTransaction();
                if ($user->role === "STD") {
                    $get_table_data = DB::table('students')->where('roll_no', '=', $user->user_id)->first();
         return $get_table_data;
                }
                elseif ($user->role === "Faculty")
                {
                    $get_table_data = DB::table('faculty')->where('faculty_id', '=', $user->user_id)->first();
                    return $get_table_data;
                }
            }

        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public static function getFacultyId(User $user)
    {
        try {
            if ($user) {
                DB::beginTransaction();

                $get_table_data = DB::table('faculty')->where('faculty_id', '=', $user->user_id)->first();
                return $get_table_data;
            }

        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
