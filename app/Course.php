<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    protected $table = 'course';
    protected $fillable=['course_name'] ;
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    
     public static function getCourse()
    {
        try
        {
                DB::beginTransaction();
                $getCourse=DB::table('course')->select('course_name')->get();
                return $getCourse;
        }
        catch (\Exception $e)
        {
            DB::rollBack();
        }
    }
}
