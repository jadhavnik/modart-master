<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::auth();
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth.basic');

Route::get('/admin', 'AdminController@index')->name('admin');

Route::get('/logout', function () {

    Auth::logout();
    return Redirect('/login');
}
);


//Route::get('/time_table/edit_time_table/{id}', 'TimeTableController@edit')->name('edit_time_table');
Route::post('/add_time_table', 'TimeTableController@store')->name('time_table');
Route::get('/time_table/upload-photo', 'TimeTableController@index')->name('add_TimeTable');
Route::post('/update_time_table', 'TimeTableController@post_update_time_table');

Route::get('/student_time_table', 'TimeTableController@view')->name('home_faculty');
Route::get('/faculty_time_table/{id}', 'TimeTableController@time_table_faculty_view');
Route::delete('delete_time_table/{data}', 'TimeTableController@destroy');
Route::get('/view_time_table', 'TimeTableController@view_time_table_faculty');


Route::get('/get_students', 'StudentController@index')->name('admin_home');
Route::get('/update_student/{id}','StudentController@getById');
Route::get('/student_view/{id}','StudentController@getStudentInfo');
Route::put('/save_student', 'StudentController@store')->name('update_student');
Route::post('/add_students/{validate?}', 'StudentController@addStudent')->name('insert_Student');
Route::get('/view_student', 'StudentController@view');
Route::delete('/delete_student/{data}', 'StudentController@destroy');
Route::get('/update_profile_stud','StudentController@updateStudentData');
Route::put('/update_stud','StudentController@updateStuProfile')->name('update_stud');
Route::get('/confirm_pass_stud', 'StudentController@getPassword');
Route::put('/save_pass_stud', 'StudentController@savePassword')->name('confirm_pass_stud');

Route::get('/faculty', 'FacultyController@index')->name('faculty');
Route::get('/add_faculty', 'FacultyController@index');
Route::post('/save_faculty', 'FacultyController@save')->name('save_faculty');
Route::get('/view_faculty', 'FacultyController@view');
Route::delete('/delete_faculty/{data}','FacultyController@destroy');
Route::get('/update_faculty/{id}','FacultyController@getById');
Route::get('/faculty_view/{id}','FacultyController@getFacultyInfo');
Route::put('/post_update','FacultyController@store')->name('update_faculty');
Route::get('/update_profile_fac','FacultyController@updateFacultyData');
Route::put('/update_fac','FacultyController@saveFaculty')->name('store_facultyData');
Route::get('/student_data', 'FacultyController@getStudentByCourse');
Route::get('/confirm_pass_fac', 'FacultyController@getPassword');
Route::put('/save_pass_fac','FacultyController@savePassword')->name('confirm_password');
Route::get('/select_course_student', 'FacultyController@selectCourse');
Route::post('/select_course_faculty', 'FacultyController@getStudentByCourseAdmin')->name('select_student');


Route::post('/events/store_events', 'EventController@store')->name('store_event');
Route::get('/view_event', 'EventController@view')->name('view_event');
Route::get('/events/add_events', 'EventController@index')->name('add_event');
Route::post('/update_time_table', 'TimeTableController@post_update_time_table');
Route::delete('delete_events/{data}', 'EventController@destroy');
Route::get('/event_description/{id}','EventController@getByEventId');

Route::get('/add_attendance', 'AttendanceController@getStudentByCourse');
Route::get('/view_attendance', 'AttendanceController@getAttendanceByCourse');
Route::get('/view_attendance_admin', 'AttendanceController@getStudentAdmin');
Route::delete('/delete_attendance/{data}', 'AttendanceController@destroy');
Route::get('/update_attendance/{id}','AttendanceController@getById');
Route::post('/store_attendance', 'AttendanceController@store')->name('store_attendance');
Route::put('/save_attendance', 'AttendanceController@save')->name('save_attendance');
Route::get('/view_attendance_stud', 'AttendanceController@getAttendanceStudent');
Route::get('/select_course_attendance', 'AttendanceController@selectCourse');
Route::post('/select_course_attendance', 'AttendanceController@getAttendanceByCourseAdmin')->name('select_attendance');



Route::get('/selectCourseAttendance', 'AttendanceController@selectCourseAdmin');
Route::post('/view_attendance_admin', 'AttendanceController@getStudentAdmin')->name('view_attendance_admin');


//Route::get('/select_course_result', 'ResultController@selectCourse');


Route::get('/get_password','EmailController@getEmailPassword');

Route::get('/get_attendance','EmailController@getEmailAttendance');
Route::get('/get_result','EmailController@getEmailResult');
Route::post('/send_password','EmailController@sendEmailPassword')->name('send_password_admin');
Route::post('/send_attendance','EmailController@sendEmailAttendance')->name('send_attendance_admin');
Route::post('/send_result','EmailController@sendEmailResult');

Route::get('pass/my','EmailController@GetForgetpassword');
Route::post('pass/save','EmailController@SavePassword')->name('resetPassword');

Route::get('view_course','CourseController@view');
Route::get('add_course','CourseController@addCourse');
Route::post('store_course','CourseController@store')->name('store_course');
Route::delete('delete_course/{data}', 'CourseController@destroy');

Route::post('/studentSearch','StudentController@GetSearch')->name('studentSearch');
Route::post('/facultySearch','FacultyController@GetSearch')->name('facultySearch');
Route::post('/attendanceSearch','AttendanceController@GetSearch')->name('attendanceSearch');

//Route::get('/add_result', 'ResultController@addResult');



Route::post('/send_course', 'ResultController@viewResult')->name('send_course');

Route::get('/select_course_result', 'ResultController@selectCourse');
Route::post('/store', 'ResultController@store')->name('result');
Route::get('/add_result_record/{id}/{test_name}','ResultController@getById');
Route::get('/view_result_student', 'ResultController@studentResultView');
Route::get('/student_no/{id}','ResultController@getUpdateResultById');
Route::get('/update_data/{id}','ResultController@updateResult');
Route::put('/update_marks','ResultController@save')->name('update_marks');
Route::delete('delete_marks/{id}','ResultController@destroy');



Route::get('/download', 'HomeController@getDownload');


