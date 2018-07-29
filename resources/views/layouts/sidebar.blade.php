<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu">
                    @if(!\Illuminate\Support\Facades\Auth::guest())

                        @if(Auth::user()->role == "STD")
                             <li class="site-menu-item ">
                                <a class="animsition-link" href={{ url('/update_profile_stud') }}>
                                    {{--<i class="site-menu-icon fa-line-chart" aria-hidden="true"></i>--}}
                                    <i class="site-menu-icon wb-user-circle" aria-hidden="true"></i>
                                    <span class="site-menu-title">Profile Update</span>
                                </a>
                            </li>
                            <li class="site-menu-item ">
                                <a class="animsition-link" href={{ url('/view_attendance_stud') }}>
                                    <i class="site-menu-icon fa-calendar" aria-hidden="true"></i>
                                    <span class="site-menu-title">Attendance</span>
                                    <div class="site-menu-badge">
                                        <span class="badge badge-success" id="unreadAuthorizationCount"></span>
                                    </div>
                                </a>
                            </li>
                            <li class="site-menu-item ">
                                <a class="animsition-link" href={{ url('/student_time_table') }}>
                                    <i class="site-menu-icon oi-book" aria-hidden="true"></i>
                                    <span class="site-menu-title">Time Table</span>
                                </a>
                            </li>
                            <li class="site-menu-item ">
                                <a class="animsition-link" href={{ url('/view_result_student') }}>
                                    {{--<i class="site-menu-icon fa-line-chart" aria-hidden="true"></i>--}}
                                    <i class="site-menu-icon fa-line-chart" aria-hidden="true"></i>
                                    <span class="site-menu-title">Result</span>
                                </a>
                            </li>
                            <li class="site-menu-item ">
                                <a class="animsition-link" href={{ url('/view_event') }}>
                                    <i class="site-menu-icon wb-briefcase" aria-hidden="true"></i>
                                    <span class="site-menu-title">Events</span>
                                </a>
                            </li>
                            {{--<li class="site-menu-item ">--}}
                            {{--<a class="animsition-link" href={{ url('organizationstructure/overview') }}>--}}
                            {{--<i class="site-menu-icon fa-graduation-cap" aria-hidden="true"></i>--}}
                            {{--<span class="site-menu-title">Manage Users</span>--}}
                            {{--</a>--}}
                            {{--</li>--}}
                        @endif
	                        @if(Auth::user()->role == "Admin")
                               {{--<li class="site-menu-item ">--}}
                                {{--<a class="animsition-link" href={{ url('/confirmation/list') }}>--}}
                                    {{--<i class="site-menu-icon wb-user-circle" aria-hidden="true"></i>--}}
                                    {{--<span class="site-menu-title">Admin</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}

                            <li class="site-menu-item has-sub">
                                <a href="#" data-slug="layout">
                                    <i class="site-menu-icon  wb-user-add" aria-hidden="true"></i>
                                    <span class="site-menu-title">Faculty</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <ul class="site-menu-sub">
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href={{ url('/add_faculty') }} data-slug="layout-grids">
                                            <i class="site-menu-icon " aria-hidden="true"></i>
                                            <span class="site-menu-title">Add Faculty</span>
                                        </a>
                                    </li>
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href={{ url('/view_faculty') }} data-slug="layout-headers">
                                            <i class="site-menu-icon " aria-hidden="true"></i>
                                            <span class="site-menu-title">View Faculty</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="site-menu-item has-sub">
                                <a href="#" data-slug="layout">
                                    <i class="site-menu-icon  wb-users" aria-hidden="true"></i>
                                    <span class="site-menu-title">Student</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <ul class="site-menu-sub">
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href={{ url('/get_students') }} data-slug="layout-grids">
                                            <i class="site-menu-icon " aria-hidden="true"></i>
                                            <span class="site-menu-title">Add Student</span>
                                        </a>
                                    </li>
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href={{ url('/select_course_student') }} data-slug="layout-headers">
                                            <i class="site-menu-icon " aria-hidden="true"></i>
                                            <span class="site-menu-title">View Student</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                             <li class="site-menu-item has-sub">
                                    <a href="#" data-slug="layout">
                                        <i class="site-menu-icon fa-calendar" aria-hidden="true"></i>
                                        <span class="site-menu-title">Attendance</span>
                                        <span class="site-menu-arrow"></span>
                                    </a>
                                    <ul class="site-menu-sub">
                                        <li class="site-menu-item">
                                            {{--<a class="animsition-link" href={{ url('/view_attendance_admin') }} data-slug="layout-grids">--}}
                                            <a class="animsition-link" href={{ url('/selectCourseAttendance') }} data-slug="layout-grids">
                                          
                                                <i class="site-menu-icon " aria-hidden="true"></i>
                                                <span class="site-menu-title">Add Attendance</span>
                                            </a>
                                        </li>
                                        <li class="site-menu-item">
                                            <a class="animsition-link" href={{ url('/select_course_attendance') }} data-slug="layout-headers">
                                                <i class="site-menu-icon " aria-hidden="true"></i>
                                                <span class="site-menu-title">View Attendance</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                              <li class="site-menu-item has-sub">
                                    <a href="#" data-slug="layout">
                                        <i class="site-menu-icon fa-line-chart" aria-hidden="true"></i>
                                        <span class="site-menu-title">Result</span>
                                        <span class="site-menu-arrow"></span>
                                    </a>
                                    <ul class="site-menu-sub">
                                        
                                        <li class="site-menu-item">
                                            <a class="animsition-link" href={{ url('/select_course_result') }} data-slug="layout-headers">
                                                <i class="site-menu-icon " aria-hidden="true"></i>
                                                <span class="site-menu-title">Add Result</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                              <li class="site-menu-item has-sub">
                                <a href="#" data-slug="layout">
                                    <i class="site-menu-icon oi-book" aria-hidden="true"></i>
                                    <span class="site-menu-title">Time Table</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <ul class="site-menu-sub">
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href={{ url('/time_table/upload-photo') }} data-slug="layout-grids">
                                            <i class="site-menu-icon " aria-hidden="true"></i>
                                            <span class="site-menu-title">Add Time Table</span>
                                        </a>
                                    </li>
                                    <li class="site-menu-item">
                                        {{--<a class="animsition-link" href={{ url('/faculty_time_table') }} data-slug="layout-headers">--}}
                                        <a class="animsition-link" href={{ url('/view_time_table') }} data-slug="layout-headers">
                                            <i class="site-menu-icon " aria-hidden="true"></i>
                                            <span class="site-menu-title">View Time Table</span>
                                        </a>
                                    </li>
                                  </ul>
                            </li>

                            <li class="site-menu-item has-sub">
                                <a href="#" data-slug="layout">
                                    <i class="site-menu-icon wb-briefcase" aria-hidden="true"></i>
                                    <span class="site-menu-title">Events</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <ul class="site-menu-sub">
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href={{ url('/events/add_events') }} data-slug="layout-grids">
                                            <i class="site-menu-icon " aria-hidden="true"></i>
                                            <span class="site-menu-title">Add Events</span>
                                        </a>
                                    </li>
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href={{ url('/view_event') }} data-slug="layout-headers">
                                            <i class="site-menu-icon " aria-hidden="true"></i>
                                            <span class="site-menu-title">View Events</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
				<li class="site-menu-item has-sub">
                                    <a href="#" data-slug="layout">
                                        <i class="site-menu-icon oi-book" aria-hidden="true"></i>
                                        <span class="site-menu-title">Course</span>
                                        <span class="site-menu-arrow"></span>
                                    </a>
                                    <ul class="site-menu-sub">
                                        <li class="site-menu-item">
                                            <a class="animsition-link" href={{ url('/add_course') }} data-slug="layout-grids">
                                                <i class="site-menu-icon " aria-hidden="true"></i>
                                                <span class="site-menu-title">Add Course</span>
                                            </a>
                                        </li>
                                        <li class="site-menu-item">
                                            <a class="animsition-link" href={{ url('/view_course') }} data-slug="layout-headers">
                                                <i class="site-menu-icon " aria-hidden="true"></i>
                                                <span class="site-menu-title">View Course</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                </li>
                                <li class="site-menu-item has-sub">
                                    <a href="#" data-slug="layout">
                                        <i class="site-menu-icon fa-send" aria-hidden="true"></i>
                                        <span class="site-menu-title">Send Email</span>
                                        <span class="site-menu-arrow"></span>
                                    </a>
                                    <ul class="site-menu-sub">
                                        <li class="site-menu-item">
                                            <a class="animsition-link" href={{ url('/get_password') }} data-slug="layout-grids">
                                                <i class="site-menu-icon " aria-hidden="true"></i>
                                                <span class="site-menu-title">Password </span>
                                            </a>
                                        </li>
                                        <li class="site-menu-item">
                                            {{--<a class="animsition-link" href={{ url('/faculty_time_table') }} data-slug="layout-headers">--}}
                                            <a class="animsition-link" href={{ url('/get_attendance') }} data-slug="layout-headers">
                                                <i class="site-menu-icon " aria-hidden="true"></i>
                                                <span class="site-menu-title">Attendance </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                        @endif
                        @if(Auth::user()->role == "Faculty")
                            <li class="site-menu-item ">
                                <a class="animsition-link" href={{ url('/update_profile_fac') }}>
                                    <i class="site-menu-icon wb-user-circle" aria-hidden="true"></i>
                                    <span class="site-menu-title">Profile</span>
                                </a>
                            </li>

                                <li class="site-menu-item has-sub">
                                    <a href="#" data-slug="layout">
                                        <i class="site-menu-icon fa-calendar" aria-hidden="true"></i>
                                        <span class="site-menu-title">Attendance</span>
                                        <span class="site-menu-arrow"></span>
                                    </a>
                                    <ul class="site-menu-sub">
                                        <li class="site-menu-item">
                                            <a class="animsition-link" href={{ url('/add_attendance') }} data-slug="layout-grids">
                                                <i class="site-menu-icon " aria-hidden="true"></i>
                                                <span class="site-menu-title">Add Attendance</span>
                                            </a>
                                        </li>
                                        <li class="site-menu-item">
                                            <a class="animsition-link" href={{ url('/view_attendance') }} data-slug="layout-headers">
                                                <i class="site-menu-icon " aria-hidden="true"></i>
                                                <span class="site-menu-title">View Attendance</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="site-menu-item has-sub">
                                    <a href="#" data-slug="layout">
                                        <i class="site-menu-icon  wb-user-add" aria-hidden="true"></i>
                                        <span class="site-menu-title">Student</span>
                                        <span class="site-menu-arrow"></span>
                                    </a>
                                    <ul class="site-menu-sub">
                                        <li class="site-menu-item">
                                            <a class="animsition-link" href={{ url('/get_students') }} data-slug="layout-grids">
                                                <i class="site-menu-icon " aria-hidden="true"></i>
                                                <span class="site-menu-title">Add Student</span>
                                            </a>
                                        </li>
                                        <li class="site-menu-item">
                                            <a class="animsition-link" href={{ url('/student_data') }} data-slug="layout-headers">
                                                <i class="site-menu-icon " aria-hidden="true"></i>
                                                <span class="site-menu-title">View Student</span>
                                            </a>
                                        </li>
                                        {{--<li class="site-menu-item">--}}
                                        {{--<a class="animsition-link" href="" data-slug="layout-bordered-header">--}}
                                        {{--<i class="site-menu-icon " aria-hidden="true"></i>--}}
                                        {{--<span class="site-menu-title">Restart Service</span>--}}
                                        {{--</a>--}}
                                        {{--</li>--}}

                                    </ul>
                                </li>
                            <li class="site-menu-item ">
                                <a class="animsition-link" href="{{ url("#") }}">
                                    <i class="site-menu-icon fa-line-chart" aria-hidden="true"></i>
                                    <span class="site-menu-title">Result</span>
                                </a>
                            </li>
                            <li class="site-menu-item has-sub">
                                <a href="#" data-slug="layout">
                                    <i class="site-menu-icon wb-briefcase" aria-hidden="true"></i>
                                    <span class="site-menu-title">Events</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <ul class="site-menu-sub">
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href={{ url('/events/add_events') }} data-slug="layout-grids">
                                            <i class="site-menu-icon " aria-hidden="true"></i>
                                            <span class="site-menu-title">Add Events</span>
                                        </a>
                                    </li>
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href={{ url('/view_event') }} data-slug="layout-headers">
                                            <i class="site-menu-icon " aria-hidden="true"></i>
                                            <span class="site-menu-title">View Events</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="site-menu-item has-sub">
                                <a href="#" data-slug="layout">
                                    <i class="site-menu-icon oi-book" aria-hidden="true"></i>
                                    <span class="site-menu-title">Time Table</span>
                                    <span class="site-menu-arrow"></span>
                                </a>
                                <ul class="site-menu-sub">
                                    <li class="site-menu-item">
                                        <a class="animsition-link" href={{ url('/time_table/upload-photo') }} data-slug="layout-grids">
                                            <i class="site-menu-icon " aria-hidden="true"></i>
                                            <span class="site-menu-title">Add Time Table</span>
                                        </a>
                                    </li>
                                    <li class="site-menu-item">
                                        {{--<a class="animsition-link" href={{ url('/faculty_time_table') }} data-slug="layout-headers">--}}
                                        <a class="animsition-link" href={{ url('/view_time_table') }} data-slug="layout-headers">
                                            <i class="site-menu-icon " aria-hidden="true"></i>
                                            <span class="site-menu-title">View Time Table</span>
                                        </a>
                                    </li>
                                    {{--<li class="site-menu-item">--}}
                                    {{--<a class="animsition-link" href="" data-slug="layout-bordered-header">--}}
                                    {{--<i class="site-menu-icon " aria-hidden="true"></i>--}}
                                    {{--<span class="site-menu-title">Restart Service</span>--}}
                                    {{--</a>--}}
                                    {{--</li>--}}

                                </ul>
                            </li>
                                <li class="site-menu-item has-sub">
                                    <a href="#" data-slug="layout">
                                        <i class="site-menu-icon fa-send" aria-hidden="true"></i>
                                        <span class="site-menu-title">Send Email</span>
                                        <span class="site-menu-arrow"></span>
                                    </a>
                                    <ul class="site-menu-sub">
                                        <li class="site-menu-item">
                                            <a class="animsition-link" href={{ url('/get_password') }} data-slug="layout-grids">
                                                <i class="site-menu-icon " aria-hidden="true"></i>
                                                <span class="site-menu-title">Password </span>
                                            </a>
                                        </li>
                                        <li class="site-menu-item">
                                            {{--<a class="animsition-link" href={{ url('/faculty_time_table') }} data-slug="layout-headers">--}}
                                            <a class="animsition-link" href={{ url('/get_attendance') }} data-slug="layout-headers">
                                                <i class="site-menu-icon " aria-hidden="true"></i>
                                                <span class="site-menu-title">Attendance </span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                        @endif

                        {{--<li class="site-menu-item ">--}}
                        {{--<a class="animsition-link" href={{ url('company/company-profile') }}>--}}
                        {{--<i class="site-menu-icon fa-institution" aria-hidden="true"></i>--}}
                        {{--<span class="site-menu-title">Company Profile</span>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="site-menu-item ">--}}
                        {{--<a class="animsition-link" href={{ url('/auditorfirm/firm-profile') }}>--}}
                        {{--<i class="site-menu-icon fa-institution" aria-hidden="true"></i>--}}
                        {{--<span class="site-menu-title">Firm Profile</span>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="site-menu-item ">--}}
                        {{--<a class="animsition-link" href={{ url('/reminder-scheduler/reminder') }}>--}}
                        {{--<i class="site-menu-icon icon fa-bookmark" aria-hidden="true"></i>--}}
                        {{--<span class="site-menu-title">Reminders</span>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        {{--<li class="site-menu-item ">--}}
                        {{--<a class="animsition-link" href={{ url('/invitation/send-single-invitation') }}>--}}
                        {{--<i class="site-menu-icon wb-envelope" aria-hidden="true"></i>--}}
                        {{--<span class="site-menu-title">Send Invitations</span>--}}
                        {{--</a>--}}
                        {{--</li>--}}
                    @endif
                </ul>
            </div>
        </div>
    </div>
    {{--<div class="site-menubar-footer">--}}
    {{--<a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip"--}}
    {{--data-original-title="Settings">--}}
    {{--<span class="icon wb-settings" aria-hidden="true"></span>--}}
    {{--</a>--}}
    {{--<a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">--}}
    {{--<span class="icon wb-eye-close" aria-hidden="true"></span>--}}
    {{--</a>--}}
    {{--<a href="{{ url('/logout') }}" data-placement="top" onclick="event.preventDefault();--}}
    {{--document.getElementById('logout-form').submit();" data-toggle="tooltip" data-original-title="Logout">--}}
    {{--<span class="icon wb-power" aria-hidden="true"></span>--}}
    {{--</a>--}}
    {{--<form id="logout-form"--}}
    {{--action="{{ url('/logout') }}"--}}
    {{--method="POST"--}}
    {{--style="display: none;">--}}
    {{--{{ csrf_field() }}--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--#00C6D7--}}
</div>
<script src="{{ asset("http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js")}}"></script>
{{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>--}}
<script>
    var toggle = true;

    $(".sidebar-icon").click(function() {
        if (toggle)
        {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({"position":"absolute"});
        }
        else
        {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function() {
                $("#menu span").css({"position":"relative"});
            }, 400);
        }

        toggle = !toggle;
    });
</script>