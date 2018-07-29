<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    protected $table = 'event';

    protected $fillable=['event_name','event_description','event_image'];

    protected $hidden=[
        'created_at','updated_at'
    ];
    protected $dates=[
        'created_at','updated_at',
    ];

    public static function getEvents()
    {
        try
        {

            $user=Auth::user()->role;
            if($user === "Faculty")
            {
                DB::beginTransaction();

                $get_table_data=DB::table('event')->get();
                return $get_table_data;
            }
            if($user === "Admin")
            {
                DB::beginTransaction();

                $get_table_data=DB::table('event')->get();
                return $get_table_data;
            }

        }
        catch (\Exception $e)
        {
            DB::rollBack();
        }
    }

}
