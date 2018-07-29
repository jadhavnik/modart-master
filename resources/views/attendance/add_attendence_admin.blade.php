@extends('layouts.app')

@section('heads')
    <script src="{{ asset("global/js/validation.js")}}"></script>
    <script src="{{ asset("global/js/.Valid.js")}}"></script>
@endsection
@section('content')



    <div class="page-content padding-0 container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-lg-12 col-xlg-9" id="recentAudits">
                <div class="widget widget-shadow table-row">
                    <div class="widget-header padding-20">
                        <h3 class="widget-header blue-grey-700">Attendance</h3>

                    </div>
                    @include('common.errors')

                    <meta name="csrf-token" content="{{ csrf_token() }}"/>
                    {{ Form::open(array('route'=>'store_attendance',
                    'method'=>'POST',
                    'files'=> true,
                    'class'=> 'form-horizontal',
                    'autocomplete'=>'off', 'id'=>'profileForm'
                    )) }}
                    @if(count($getStudentData) > 0)

                        <div class="widget-content bg-white table-responsive padding-20 padding-bottom-25">
                            <table class="table  table-striped" id="tblRecentAudits">
                                <tbody>
                                <tr>
                                    <th>No.</th>
                                    <th>Roll No</th>
                                    <th>Name</th>
                                    <th>Course Name</th>
                                    <th>Month</th>
                                    <th>Attendance</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <?php
                                $i = 0;
                                ?>
                                @foreach($getStudentData as $getData)
                                    <tr>
                                        <td>
                                            <?php
                                            $i = $i + 1;
                                            echo $i;
                                            ?>
                                        </td>
                                        <td>
                                            {{Form::input('text', 'roll_no[]',$getData->roll_no,["id"=>'roll_no',"class"=>"form-control","disabled"=>"true"])}}
                                            {{Form::input('hidden', 'roll_no[]',$getData->roll_no,["id"=>'roll_no',"class"=>"form-control"])}}
                                        </td>
                                        <td>
                                            {{Form::input('text', 'name[]',$getData->name." ".$getData->last_name ,["id"=>'name',"class"=>"form-control","disabled"=>"true"])}}
                                            {{Form::input('hidden', 'name[]',$getData->name." ".$getData->last_name ,["id"=>'name',"class"=>"form-control"])}}
                                        </td>
                                        <td>
                                            {{Form::input('text', 'course_name[]',$getData->course_name,["id"=>'course_name',"class"=>"form-control","disabled"=>"true","size"=>75])}}
                                            {{Form::input('hidden', 'course_name[]',$getData->course_name,["id"=>'course_name',"class"=>"form-control","size"=>75])}}
                                        </td>
                                        <td>
                                            <select class="form-control" name="month[]" id="month" style="width:150px;">
                                                <option value="">Select Month</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="other">August</option>
                                                <option value="August">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>

                                           {{--{{ Form::select('month[]', [--}}
                                           {{--'' => 'Select month',--}}
                                           {{--'January' => 'January',--}}
                                           {{--'February' => 'February',--}}
                                           {{--'March' => 'March',--}}
                                           {{--'April' => 'April',--}}
                                           {{--'May' => 'May',--}}
                                           {{--'June' => 'June',--}}
                                           {{--'July' => 'July',--}}
                                           {{--'August' => 'August',--}}
                                           {{--'September' => 'September',--}}
                                           {{--'October' => 'October',--}}
                                           {{--'November' => 'November',--}}
                                           {{--'December' => 'December'],"",["id"=>'month',"class"=>"form-control"]) }}--}}
                                           

                                        </td>
                                        <td>
                                            {{ Form::input('text', 'attendance[]',old('attendance[]'),[ "placeholder"=>"attendance", "id"=>'attendance',"class"=>"form-control","maxlength"=>3,"size"=>30]) }}
                                        </td>
                                        <td>
                                            {{Form::input('hidden', 'email[]',$getData->email,["id"=>'email',"class"=>"form-control"])}}
                                        </td>
                                        <td>
                                            {{Form::input('hidden', 'p_email[]',$getData->p_email,["id"=>'p_email',"class"=>"form-control"])}}
                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <ul class="pagination right-align">
                            {{ $getStudentData->render() }}

                        </ul>
                        <div class="col-md-5"></div>
                        <div class="col-md-5">
                            <input type="submit" value="submit" onclick="return CheckEmpty();"
                                   class="btn btn-info waves-effect left-align">
                        </div>



                    @else
                        <h4>
                            <center>No records to display</center>
                        </h4>
                    @endif


                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection