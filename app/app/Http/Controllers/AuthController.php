<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use AuthenticatesUsers;
    protected  $username='name';

    protected function authenticated($request, $user)
    {
        if($user->role === 'Admin') {
            return redirect('admin');
        }elseif($user->role == 'Faculty')
//            && $user->status == 'active')
        {
            return redirect('faculty');
        }
        elseif ($user->role == 'STD')
//            && $user->status == 'active')
        {
            return redirect('/home');
        }
        else
            {

                return redirect('/logout');
            }

    }
}
