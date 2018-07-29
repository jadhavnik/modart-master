<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Student;

class Result extends Model
{
    protected $table='result';
    protected $fillable = [
        'roll_no', 'subject',  'faculty_name',
        'marks', 'out_off','test_name'
    ];

  public static function add(Request $input)
  {

      $data = $input['roll_no'];
       foreach ($data as $key => $value) {
              $student = new Result();
              $student->roll_no = $input['roll_no'][$key];
              $student->subject = $input['subject'][$key];
              $student->faculty_name = $input['faculty_name'][$key];
              $student->marks = $input['marks'][$key];
              $student->out_off = $input['out_off'][$key];
              $student->test_name = $input['test_name'][$key];
              $student->save();
          }
          return ['success'=>true];
  }

  public static function getMarksById(Result $request)
  {
      try
      {
          if($request)
          {
              DB::beginTransaction();

      //     $subjects=DB::table('result')->where('roll_no','=',$request->roll_no)->get();
             // $subjects=DB::table('result')->where('roll_no','=',$roll_no->roll_no)->get();
              $subjects=DB::table('result')->find($request->id);
           return $subjects;
          }

      }
      catch (\Exception $e)
      {
          DB::rollBack();
      }
  }


}
