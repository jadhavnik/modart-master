<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Attendance extends Model
{
    protected $table='attendance';
    protected $fillable = [
        'roll_no', 'name',  'course_name',
         'month', 'attendance' ,'email','p_email','year'
    ];
    public static function getAttendanceById(Request $request)
    {
        try
        {
            if($request)
            {
                DB::beginTransaction();

                $get_table_data=DB::table('attendance')->find($request->id);
    			 return $get_table_data;
            }

        }
        catch (\Exception $e)
        {
            DB::rollBack();
        }
    }

    public static function saveAttendance(Request $input)
    {
        try
        {
            $dt = Carbon::now();
            $data = $input['roll_no'];
            foreach ($data as $key => $value) {
                $student = new Attendance();
                $student->roll_no = $input['roll_no'][$key];
                $student->name = $input['name'][$key];
                $student->course_name = $input['course_name'][$key];
                if ($input['month'][$key] == "January") {
                    $student->month_no = 1;
                }
                if ($input['month'][$key] == "February") {
                    $student->month_no = 2;
                }
                if ($input['month'][$key] == "March") {
                    $student->month_no = 3;
                }
                if ($input['month'][$key] == "April") {
                    $student->month_no = 4;
                }
                if ($input['month'][$key] == "May") {
                    $student->month_no = 5;
                }
                if ($input['month'][$key] == "June") {
                    $student->month_no = 6;
                }
                if ($input['month'][$key] == "July") {
                    $student->month_no = 7;
                }
                if ($input['month'][$key] == "August") {
                    $student->month_no = 8;
                }
                if ($input['month'][$key] == "September") {
                    $student->month_no = 9;
                }
                if ($input['month'][$key] == "October") {
                    $student->month_no = 10;
                }
                if ($input['month'][$key] == "November") {
                    $student->month = 11;
                }
                if ($input['month'][$key] == "December") {
                    $student->month_no = 12;
                }

                $student->month = $input['month'][$key];
                $student->year = $dt->format('Y');
                $student->attendance = $input['attendance'][$key];
                $student->email = $input['email'][$key];
                $student->p_email = $input['p_email'][$key];
                 $student->status=1;
                $student->save();
            }
            DB::commit();
            return ['success'=>true];

        }
        catch (\Exception $e)
        {
            DB::rollBack();

            return ['success'=>false,'errors'=>$e->getMessage()];
        }
    }

}
