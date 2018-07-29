<?php

namespace App\Http\Controllers;

use Laracasts\Flash\Flash;
use Mail;
use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    public function send()
    {
        $title = "Test Title";
        $content = "Test Content mail";
        Mail::queue('emails.send', ['title' => $title, 'content' => $content], function ($message) {
            $message->from('');
            $message->to('');
            $message->subject("Hi aksahy");

        });
        return response()->json(['message' => 'Request queued']);
    }

    public function getEmailPassword()
    {
        return view('email.send_password');
    }

    public function sendEmailPassword(Request $request)
    {
        $userMailData = array();
        $validator = Validator::make($request->all(),
            [
                'course_name' => 'required',
            ]);

        if ($validator->passes()) {
            $valid = true;
        } else {
            $valid = false;
        }

        if ($valid) {
            $course_name = $request->input('course_name');

            $users = DB::table('students')->where('course_name', '=', $course_name)->get();

            if (count($users) > 0) {
                foreach ($users as $user) {
                    array_push($userMailData, $user->email);
                }

                $from_email = config('app.dev_email');

                foreach ($userMailData as $email) {

                    $pass = DB::table('students')->where('email', $email)->first();
                    $mail_content['__student_name__'] = ucfirst($pass->name);
                    $mail_content['__username__'] = $pass->email;
                    $mail_content['__password__'] = $pass->password;
                    $template = new  EmailController();
                    $data = $template->replaceContentPassword('login details', $mail_content);
                    $subject = $data->subject;
                    $to_email = $pass->email;
                    Mail::send(['html' => 'email.password_email'], ['content' => html_entity_decode($data->content), 'footer' => html_entity_decode($data->footer)],

                        function ($message) use ($to_email, $from_email, $subject) {

                            $message->from($from_email);
                            $message->to($to_email);
                            $message->subject($subject);
                        });
                }
                
                 if (count(Mail::failures()) > 0) {
                        flash()->error('Registered user mail does not sent');
                        return redirect()->back();
                    } else {
                        Flash::success('Email sent successfully');
                        return redirect()->back();
                    }
                     
            } else {
                flash()->error('No student with this course name');
                return redirect()->back();
            }
        } else {
            return redirect()->back()->withErrors($validator->errors());
        }
    }

    public function getEmailAttendance()
    {
        return view('email.send_attendance');
    }

    public function sendEmailAttendance(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'course_name' => 'required',
                'month' => 'required',
                'year' => 'required|numeric',
            ]);
        if ($validator->passes()) {
            $valid = true;
        } else {
            $valid = false;
        }
        if ($valid) {
            $course_name = $request->input('course_name');
            $month = $request->input('month');
            $year = $request->input('year');
            $users = DB::table('attendance')->where('course_name', '=', $course_name)->where('month', '=', $month)->where('year', '=', $year)->get();
            $from_email = config('app.dev_email');
            if (count($users) > 0) {
                foreach ($users as $email) {
                    $pass = DB::table('attendance')->where('course_name', '=', $email->course_name)->where('email','=',$email->email)->where('month', '=', $email->month)->where('year', '=', $email->year)->first();
                    $mail_content['__student_name__'] = ucfirst($pass->name);
                    $mail_content['__month__'] = $pass->month;
                    $mail_content['__year__'] = $pass->year;
                    $mail_content['__attendance__'] = $pass->attendance;
                    $template = new  EmailController();
                    $data = $template->replaceContentPassword('attendance', $mail_content);
                    $subject = $data->subject;
                    $to_email = $pass->email;
                    $p_email = $pass->p_email;
                    Mail::send(['html' => 'email.attendence_email'], ['content' => html_entity_decode($data->content), 'footer' => html_entity_decode($data->footer)],
                        function ($message) use ($to_email, $from_email, $p_email, $subject) {

                            $message->from($from_email);
                            $message->to($to_email);
                            $message->cc($p_email);
                            $message->subject($subject);

                        });
                    
                }
                
                if (count(Mail::failures()) > 0) {
                        flash()->error('Attendance mail does not sent');
                        return redirect()->back();
                    } else {
                        Flash::success('Email sent successfully');
                        return redirect()->back();
                    }
                
            } else {
                flash()->error('No records available for specified period');
                return redirect()->back();
            }
        } else {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
    }

    private function replaceContentPassword($templateName, $parameters)
    {
        $template = DB::table('email_templates')->where('name', $templateName)->first();

        $content = $template->content;
        if ($content) {
            foreach ($parameters as $key => $parameter) {
                $regex = '/' . $key . '/';
                $content = preg_replace($regex, $parameter, $content);
            }
            $template->content = $content;
            return $template;
        } else {
            return ['error' => 'Template Not found'];
        }
    }

    public function GetForgetpassword()
    {
        return view('password.email_reset_password');
    }
    
    public function SavePassword(Request $request)
    {
        $userEmail = $request->input('email');
        $ok = User::getPassword($userEmail);
        if ($ok) {
            Flash::success('We have e-mailed you temporary password ');
            return redirect()->back();
        } else {
            Flash::error('We can\'t find a user with that e-mail address.');
            return redirect()->back();
        }
    }
}
