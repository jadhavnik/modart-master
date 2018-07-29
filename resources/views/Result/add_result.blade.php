@extends('layouts.app')

@section('heads')
    {{--<script src="{{ asset("jquery-3.3.1.min.js")}}"></script>--}}
    <script src="{{ asset("https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js")}}"></script>
      <script src="{{ asset("global/js/validation.js")}}"></script>
<script src="{{ asset("global/js/addRow.js")}}"></script>
@endsection
@section('content')



    <div class="page-content padding-0 container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <div class="col-lg-12 col-xlg-9" id="recentAudits">
                <div class="widget widget-shadow table-row">
                    <div class="widget-header padding-20">
                        <h3 class="widget-header blue-grey-700">Add Marks</h3>

                    </div>
                    @include('common.errors')

                    <meta name="csrf-token" content="{{ csrf_token() }}"/>
                    {{ Form::open(array('route'=>'result',
                    'method'=>'POST',
                    'files'=> true,
                    'class'=> 'form-horizontal',
                    'autocomplete'=>'off', 'id'=>'profileForm'
                    )) }}
                    {{--@if(count($getStudentData) > 0)--}}

                    <div class="widget-content bg-white table-responsive padding-20 padding-bottom-25">
                        <table class="table  table-striped"  id="myTable">
                            <tbody>
                            <tr>
                                <th>No.</th>
                                <th>Select</th>
                                <th>Roll No</th>
                                <th>Subject</th>
                                <th>Fcaulty Name</th>
                                <th>Marks</th>
                                <th>Out Off</th>
                                <th>Test Name</th>
                                <th colspan="2">Action</th>
                            </tr>
                            <?php
                            $i = 0;
                            ?>
                            {{--@foreach($getStudentData as $getData)--}}
                            <tr>
                                <td>
                                    <?php
                                    $i=$i+1;
                                    echo $i;
                                    ?>
                                </td>
                                <td>
                                <input type="checkbox" name="record" disabled="true">
                                </td>
                                <td>
                                    {{--{{ Form::input('text', 'roll_no',$roll_no->roll_no,[ "placeholder"=>"Roll No", "id"=>'roll_no',"class"=>"form-control","maxlength"=>3]) }}--}}
                                    {{Form::input('text', 'roll_no[]',$roll_no->roll_no,["id"=>'roll_no',"class"=>"form-control","size"=>100,"disabled"=>"true"])}}
                                    {{Form::input('hidden', 'roll_no[]',$roll_no->roll_no,["id"=>'roll_no',"class"=>"form-control","size"=>100])}}
                                </td>
                                <td>
                                    {{ Form::input('text', 'subject[]',old('subject[]'),[ "placeholder"=>"subject", "id"=>'subject',"size"=>150,"class"=>"form-control"]) }}
                                </td>
                                <td>
                                    {{ Form::input('text', 'faculty_name[]',old('faculty_name[]'),[ "placeholder"=>"faculty name","id"=>'faculty_name',"size"=>150,"class"=>"form-control"]) }}
                                </td>
                                <td>
                                    {{ Form::input('text', 'marks[]',old('marks[]'),[ "placeholder"=>"marks", "id"=>'marks',"class"=>"form-control","size"=>100,"maxlength"=>3]) }}
                                </td>
                                <td>
                                    {{ Form::input('text', 'out_off[]',old('out_off[]'),[ "placeholder"=>"out off", "id"=>'out_off',"class"=>"form-control","size"=>100,"maxlength"=>3]) }}
                                </td>
                                <td>
                                    {{ Form::input('text', 'test_name[]',$test_name,["id"=>'test_name',"class"=>"form-control","size"=>140,"disabled"=>"true"]) }}
                                    {{Form::input('hidden', 'test_name[]',$test_name,["id"=>'test_name',"class"=>"form-control","size"=>140])}}
                                </td>

                                <td><button type="button" id="btnAdd" class="btn btn-info waves-effect button-add" >Add Row </button></td>
                                    {{--style="cursor:pointer;" >Add Row</td>--}}
                               <td> <button type="button" class="btn btn-info waves-effect delete-row">Delete Row</button></td>
                            </tr>


                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                            <input type="submit" onclick="return checkResult();" value="Submit" class="btn btn-info waves-effect">
                    </div>
                    {{ Form::close() }}

@endsection
@section('scripts')

@endsection

