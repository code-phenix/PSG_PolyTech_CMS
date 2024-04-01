<!-- Master page  -->
@extends('backend.layouts.master')

<!-- Page title -->
@section('pageTitle') Personal Profile @endsection
<!-- End block -->

<!-- Page body extra class -->
@section('bodyCssClass') @endsection
<!-- End block -->

<!-- BEGIN PAGE CONTENT-->
@section('pageContent')
    <!-- Section header -->
    <section class="content-header">
        <h1>
            Personal Profile
            {{-- <small>@if($regiInfo) Update @else Add New @endif</small> --}}
            <small> Add New </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::route('user.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{URL::to('personal-profile/list')}}"><i class="fa icon-student"></i> Personal Profile</a></li>
            {{-- <li class="active">@if($regiInfo) Update @else Add @endif</li> --}}
            <li class="active">Add </li>
        </ol>
    </section>
    <!-- ./Section header -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    {{-- <form novalidate id="entryForm" action="@if($regiInfo) {{URL::Route('student.update', $regiInfo->id)}} @else {{URL::Route('student.store')}} @endif" method="post" enctype="multipart/form-data"> --}}
                        <form novalidate id="entryForm" action= "{{URL::Route('student.store')}} " method="post" enctype="multipart/form-data">
                        {{-- <div class="box-header">
                            <div class="callout callout-danger">
                                <p><b>Note:</b> Create a class and section before create new student. And subject if student have elective subject.</p>
                            </div>
                        </div> --}}
                        <div class="box-body">
                            @csrf
                            
                            <p class="lead section-title">Personal Profile</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="name">Employee Id<span class="text-danger">*</span></label>
                                        
                                        {{-- <input autofocus type="text" class="form-control" name="type" placeholder="type" value="@if($student){{ $student->name }}@else{{old('name')}}@endif" required minlength="5" maxlength="255"> --}}
                                        <input type="text"   name="empid" class="form-control" placeholder="">
                                        <span class="text-danger">{{ $errors->first('published') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="nick_name">Employee Name<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Nature of the Journal"></i></label>
                                        {{-- <input type="text" class="form-control" name="award_from" placeholder="award_from" value="@if($student){{ $student->nick_name }}@else{{old('nick_name')}}@endif" minlength="2" maxlength="50"> --}}
                                       
                                        <input name="empname" type="text"   class="form-control" placeholder="EmEmployee Name Format: Ms. Jenelia G">
                                        <span class="text-danger">{{ $errors->first('nat') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group has-feedback">
                                        <label for="dob">Gender<span class="text-danger">*</span></label>
                                        {{-- <input type='text' class="form-control date_picker2"  readonly name="mnt" placeholder="date"  required minlength="10" maxlength="255" /> --}}
                                        <br> <input name="gendr" type="radio" value="Male" id="male" class="with-gap" checked="checked">
                                        <label for="male">Male</label>
                                        <input name="gendr" readonly="readonly" type="radio" value="Female" id="female" class="with-gap"> 
                                        <label for="female" class="m-l-20">Female</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="gender">Date of Birth<span class="text-danger">*</span>
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="select Level"></i>
                                        </label>
                                        {{-- @php $param = ['class' => 'form-control select2', 'placeholder' => 'select an option', 'required' => 'true']; if($gender) { $param['readonly'] = 'true'; } @endphp
                                        {!! Form::select('gender', AppHelper::GENDER, $gender , $param) !!} --}}
                                        <input type='text' class="form-control date_picker2"  readonly name="dob" placeholder="date"  required minlength="10" maxlength="255" /> 
                                        <span class="fa fa-calendar form-control-feedback"></span> 
                                        <span class="text-danger">{{ $errors->first('dob') }}</span>
                                        {{-- <span class="fa fa-calendar form-control-feedback"></span> --}}
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="religion">Selection Category<span class="text-danger">*</span>
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="select Award/Distinction"></i>
                                        </label>
                                       
                                        {{-- {!! Form::select('religion', AppHelper::RELIGION, $religion , ['class' => 'form-control select2', 'placeholder' => 'select an option', 'required' => 'true']) !!} --}}
                                        <br> <input name="sg" type="radio" readonly="readonly" value="Grant" id="dia" class="with-gap" checked="checked">
                                        <label>Grant-in-Aid</label>
                                        <input name="sg" type="radio" readonly="readonly" value="Auto" id="ss" class="with-gap">
                                        <label class="m-l-20">Self Supporting</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="blood_group">Department Name (Abbr. Form)
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="select Awarded By"></i>
                                        </label>
                                        {{-- {!! Form::select('blood_group', AppHelper::BLOOD_GROUP, $bloodGroup , ['class' => 'form-control select2', 'placeholder' => 'select an option']) !!} --}}
                                        <input name="dc" id="dc" readonly="readonly" type="text" value="PRO" class="form-control" placeholder="Department Code">
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('dc') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="nationality">Designation<span class="text-danger">*</span>
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Other Indexing"></i>
                                        </label>
                                        {{-- {!! Form::select('nationality', ['Bangladeshi' => 'Bangladeshi', 'Other' => 'Other'], $nationality , ['class' => 'form-control', 'required' => 'true']) !!} --}}
                                        
                                        {{-- <input class="form-control" type="text" placeholder="Type other Indexing here" name="othind1"> --}}
                                        <select class="form-control show-tick" readonly="readonly" name="desig" id="desig" onchange="getdecod()">
                                            <option value="Professor" selected="selected">Professor</option>                     
                                        </select>
                                        <span class="text-danger">{{ $errors->first('desig') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="nationality">Date of Joining at PSG</label>
                                        <input type='text' class="form-control date_picker2"  readonly name="doj" placeholder="date"  required minlength="10" maxlength="255" /> 
                                        <span class="fa fa-calendar form-control-feedback"></span> 
                                        {{-- <span class="fa fa-map-marker form-control-feedback"></span> --}}
                                        <span class="text-danger">{{ $errors->first('doj') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="photo">Date of Joining in the Current Post<span class="text-danger">*</span></label>
                                        {{-- <input  type="file" class="form-control" accept=".jpeg, .jpg, .png" name="photo" placeholder="Photo image"> --}}
                                        <input type='text' class="form-control date_picker2"  readonly name="dojp" placeholder="date"  required minlength="10" maxlength="255" /> 
                                        <span class="fa fa-calendar form-control-feedback"></span> 
                                        <span class="text-danger">{{ $errors->first('doi') }}</span>

                                        <label for="note">Extn</label>
                                        {{-- <textarea name="note" class="form-control"  maxlength="500">@if($student){{ $student->note }}@else{{ old('note') }} @endif</textarea> --}}
                                        <input name="extn"  type="text" id="extn" class="form-control" placeholder="">
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('extn') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="email">Linked In Personal Page URL</label>
                                        {{-- <input  type="email" class="form-control" name="email"  placeholder="email address" value="@if($student){{$student->email}}@else{{old('email')}}@endif" maxlength="100" > --}}
                                        <input name="fpurl" value="-" type="text" id="fpurl" class="form-control" placeholder="http://example.com">
                                        <span class="fa fa-envelope form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('fpurl') }}</span>

                                        <label for="note">Landline - Office</label>
                                        {{-- <textarea name="note" class="form-control"  maxlength="500">@if($student){{ $student->note }}@else{{ old('note') }} @endif</textarea> --}}
                                        <input name="ph3" type="text"  id="php3" class="form-control" placeholder="">
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('ph3') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="extra_activity">E-Mail Id.- Official</label>
                                        {{-- <textarea name="extra_activity" class="form-control"  maxlength="255" >@if($student){{ $student->extra_activity }}@else{{ old('extra_activity') }} @endif</textarea> --}}
                                        <input  name="oeid" type="email" id="oeid" class="form-control" placeholder="">
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('oeid') }}</span>
                                        <label for="extra_activity">E-Mail Id. - Personal</label>
                                        {{-- <textarea name="extra_activity" class="form-control"  maxlength="255" >@if($student){{ $student->extra_activity }}@else{{ old('extra_activity') }} @endif</textarea> --}}
                                        <input  name="peid" type="email" id="peid" class="form-control" placeholder="">
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('peid') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                      

                                        <label for="phone_no">Permanent Address</label><br>
                                        <label for="phone_no">Door No. & Street Name</label><br>
                                        {{-- <input  type="text" class="form-control" name="phone_no" placeholder="phone or mobile number" value="@if($student){{$student->phone_no}}@else{{old('phone_no')}}@endif" maxlength="15"> --}}
                                        <textarea name="padds" id="padds" rows="4" class="form-control no-resize" placeholder="Door No. &amp; Street Name..."></textarea>
                                        <p style="float: right">Locality</p><br>
                                        <input  name="parea" type="text" id="carea" class="form-control" placeholder="Locality"> 
                                        <span class="fa fa-phone form-control-feedback"></span> 
                                        <span class="text-danger">{{ $errors->first('parea') }}</span>
                                        <p style="float: right">City</p><br>
                                        <input  type="text" name="pcity" id="pcity" class="form-control" placeholder="City">
                                        <p style="float: right">Pin Code</p><br>
                                        <input  name="ppin" type="text" id="ppin" class="form-control" placeholder="641 004"> 
                                         <span class="fa fa-phone form-control-feedback"></span> 
                                        <span class="text-danger">{{ $errors->first('pgst') }}</span>
                                    </div>
                                    <div class="form-group has-feedback">

                                        <label for="mother_name">Google Scholar URL</label>
                                        {{-- <input  type="text" class="form-control" name="mother_name" placeholder="name" value="@if($student){{ $student->mother_name }}@else{{old('mother_name')}}@endif" maxlength="255"> --}}
                                        <input  name="gurl" type="text" id="gurl" class="form-control" placeholder="">
                                        {{-- <span class="fa fa-info form-control-feedback"></span> --}}
                                        <span class="text-danger">{{ $errors->first('gurl') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <input type="checkbox"  onclick="fillAddress()" name="filladdress">  
                                        <label for="phone_no">Contact Address</label><br>
                                        <label>Same as Permanent address</label><br>
                                            <label for="phone_no">Door No. & Street Name</label><br>
                                            {{-- <input  type="text" class="form-control" name="phone_no" placeholder="phone or mobile number" value="@if($student){{$student->phone_no}}@else{{old('phone_no')}}@endif" maxlength="15"> --}}
                                            <textarea name="cadds" type="text" id="cadds" rows="4" class="form-control no-resize" placeholder=""></textarea>
                                            <p style="float: right">Locality</p><br>
                                            <input value="" name="carea" type="text" id="carea" class="form-control" placeholder="" value=""> 
                                            {{-- <span class="fa fa-phone form-control-feedback"></span> --}}
                                            <span class="text-danger">{{ $errors->first('carea') }}</span>
                                            <p style="float: right">City</p><br>
                                            <input value="" name="ccity" type="text" id="ccity" class="form-control" placeholder="" value=""><br>
                                            <p style="float: right">Pin Code</p><br>
                                            <input  name="cpin" type="text" id="cpin" class="form-control" placeholder="" value=""><br>
                                            {{-- <span class="fa fa-phone form-control-feedback"></span> --}}
                                            <span class="text-danger">{{ $errors->first('cpin') }}</span>

                                        
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="note"><label for="note">Landline - Residence</label>
                                        {{-- <textarea name="note" class="form-control"  maxlength="500">@if($student){{ $student->note }}@else{{ old('note') }} @endif</textarea> --}}
                                        <input name="ph2"  type="text" id="php2" class="form-control" placeholder="" size="50">
                                        
                                        <span class="text-danger">{{ $errors->first('ph2') }}</span></label><br><br>
                                    </div>
                                        <div class="form-group has-feedback">
                                        <label for="note"><label for="note">Mobile</label>
                                        <input type="number" name="ph1" class="form-control" placeholder="" size="50">
                                        {{-- <span class="fa fa-info form-control-feedback"></span> --}}
                                        <span class="text-danger">{{ $errors->first('ph1') }}</span>


                                        <label for="father_name">Brief on Yourself</label>
                                        {{-- <input type="text" class="form-control" name="father_name" placeholder="name" value="@if($student){{ $student->father_name }}@else{{old('father_name')}}@endif"  maxlength="255"> --}}
                                        <textarea name="abt" cols="48" rows="5" id="abt" class="form-control no-resize" placeholder=" "></textarea>
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('paptit') }}</span>
                                        </div>
                                        
                                        <label for="father_phone_no">Blood Group</label>
                                        {{-- <input  type="text" class="form-control" name="father_phone_no" placeholder="phone or mobile number" value="@if($student){{$student->father_phone_no}}@else{{old('father_phone_no')}}@endif" maxlength="15"> --}}
                                        
                                        {{-- <span class="fa fa-phone form-control-feedback"></span> --}}
                                        <select class="form-control show-tick" name="bgrp" id="bgrp">
                                            <option value="O+" selected="selected">O+</option>
                                            <optgroup label="A">
                                            <option value="A1-">A1 Negative</option>
                                            <option value="A1+">A1 Positive</option>
                                            <option value="A1B-">A1B Negative </option>
                                            <option value="A1B+">A1B Positive </option>
                                            <option value="A2-">A2 Negative </option>
                                            <option value="A2+">A2 Positive</option>
                                            <option value="A2B-">A2B Negative </option>
                                            <option value="A2B+">A2B Positive </option>
                                            </optgroup>
                                            <optgroup label="B">
                                            <option value="B-">B Negative</option>
                                            <option value="B+">B Positive</option>
                                            <option value="B1+">B1 Positive</option>
                                            <option value="O-">O Negative</option>
                                            <option value="O+">O Positive</option>
                                            </optgroup>
                                          </select>
                                        <span class="text-danger">{{ $errors->first('bgrp') }}</span>
                                </div>
                                
                            </div>
                            {{-- <p class="lead  section-title">Guardian Info:</p> --}}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="mother_phone_no">Scopus Research Scholar URL</label>
                                        {{-- <input  type="text" class="form-control" name="mother_phone_no"  placeholder="phone or mobile number" value="@if($student){{$student->mother_phone_no}}@else{{old('mother_phone_no')}}@endif"  maxlength="15">--}}
                                        <input name="rurl" type="text" id="rurl" class="form-control" placeholder=" ">
                                         <span class="fa fa-phone form-control-feedback"></span> 
                                        <span class="text-danger">{{ $errors->first('rurl') }}</span> 
                                    </div>
                                </div>
                                
                               
                            </div>
                            {{--<div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="present_address">Present Address</label>
                                        <textarea name="present_address" class="form-control" rows="3"  maxlength="500" >@if($student){{ $student->present_address }}@else{{ old('present_address') }} @endif</textarea>
                                        <span class="fa fa-location-arrow form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('present_address') }}</span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="permanent_address">Permanent Address<span class="text-danger">*</span></label>
                                        <textarea name="permanent_address" class="form-control" required rows="3" minlength="10" maxlength="500" >@if($student){{ $student->permanent_address }}@else{{ old('permanent_address') }} @endif</textarea>
                                        <span class="fa fa-location-arrow form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('permanent_address') }}</span>
                                    </div>
                                </div>
                            </div>
                            <p class="lead section-title">Academic Info:</p>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group has-feedback">
                                        <label for="regi_no">Registration No.
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="will auto generate after saving the form"></i>
                                        </label>
                                        <input  type="text" class="form-control" name="regi_no" readonly  placeholder="will auto generate after saving the form" value="@if($regiInfo){{$regiInfo->regi_no}}@endif">
                                        <span class="fa fa-id-card form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('regi_no') }}</span>
                                    </div>
                                </div>
                                @if(AppHelper::getInstituteCategory() == 'college')
                                    <div class="col-md-2">
                                        <div class="form-group has-feedback">
                                            <label for="academic_year">Academic Year
                                                <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Set academic year"></i>
                                            </label>
                                            @if($regiInfo)
                                                <br><span class="text-danger">Year can't be change.</span>
                                            @else
                                                {!! Form::select('academic_year', $academic_years, $acYear, ['placeholder' => 'Pick a year...','class' => 'form-control select2', 'required' => 'true']) !!}
                                                <span class="form-control-feedback"></span>
                                                <span class="text-danger">{{ $errors->first('academic_year') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="class_id">Class Name
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Set class that student belongs to"></i>
                                            <span class="text-danger">*</span>
                                        </label>
                                        @if($regiInfo)
                                            <br><span class="text-danger">Class can't be change.</span>
                                            <input type="hidden" name="class_id" value="{{$regiInfo->class_id}}">
                                        @else
                                            {!! Form::select('class_id', $classes, $iclass , ['id' => 'student_add_edit_class_change', 'placeholder' => 'Pick a class...','class' => 'form-control select2', 'required' => 'true']) !!}
                                            <span class="form-control-feedback"></span>
                                            <span class="text-danger">{{ $errors->first('class_id') }}</span>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="section_id">Section
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Set section that student belongs to"></i>
                                            <span class="text-danger">*</span>
                                        </label>
                                        {!! Form::select('section_id', $sections, $section , ['placeholder' => 'Pick a section...', 'id' => 'checkStudentCapacity', 'class' => 'form-control select2', 'required' => 'true']) !!}
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('section_id') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group has-feedback">
                                        <label for="shift">Shift
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Set class shift"></i>
                                        </label>
                                        {!! Form::select('shift', ['Morning' => 'Morning', 'Day' => 'Day', 'Evening' => 'Evening' ], $shift , ['placeholder' => 'Pick a shift...','class' => 'form-control select2', 'required' => 'true']) !!}
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('shift') }}</span>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group has-feedback">
                                        <label for="card_no">ID Card No.</label>
                                        <input  type="text" class="form-control" name="card_no"  placeholder="id card number" value="@if($regiInfo){{$regiInfo->card_no}}@else{{old('card_no')}}@endif"  min="4" maxlength="50">
                                        <span class="fa fa-id-card form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('card_no') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group has-feedback">
                                        <label for="roll_no">Roll No.</label>
                                        <input  type="number" class="form-control" name="roll_no"  placeholder="roll number" value="@if($regiInfo){{$regiInfo->roll_no}}@else{{old('roll_no')}}@endif"  maxlength="20">
                                        <span class="fa fa-sort-numeric-asc form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('roll_no') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group has-feedback">
                                        <label for="board_regi_no">Board Registration No.</label>
                                        <input  type="text" class="form-control" name="board_regi_no"  placeholder="registration number" value="@if($regiInfo){{$regiInfo->board_regi_no}}@else{{old('board_regi_no')}}@endif"  maxlength="20">
                                        <span class="fa fa-sort-numeric-asc form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('board_regi_no') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group has-feedback">
                                        <label for="sms_receive_no">Notification SMS No.<span class="text-danger">*</span>
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Which phone number will receive notification sms?"></i>
                                        </label>
                                        @php $sms_no = 0; if($student){ $sms_no = $student->sms_receive_no; } @endphp
                                        {!! Form::select('sms_receive_no', AppHelper::STUDENT_SMS_NOTIFICATION_NO, $sms_no , ['class' => 'form-control', 'required' => 'true']) !!}
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('sms_receive_no') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group has-feedback">
                                        <label for="siblings">Siblings
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Siblings student Registration No. If more than one then use ',' as a seperator."></i>
                                        </label>
                                        <input  type="text" class="form-control" value="@if($student){{$student->siblings}}@else{{old('siblings')}}@endif" name="siblings" placeholder="1901004,1909201"  maxlength="255">
                                        <span class="glyphicon glyphicon-info-sign form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('siblings') }}</span>
                                    </div>
                                </div>
                                @if(count($houseList))
                                    <div class="col-md-2">
                                        <div class="form-group has-feedback">
                                            <label for="house">House Name
                                                <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="if student group by its hostel name"></i>
                                            </label>
                                            @php $house = ' '; if($regiInfo){ $house = $regiInfo->house; } @endphp
                                            {!! Form::select('house', $houseList, $house , ['class' => 'form-control']) !!}
                                            <span class="form-control-feedback"></span>
                                            <span class="text-danger">{{ $errors->first('house') }}</span>
                                        </div>
                                    </div>
                                @endif

                            </div>


                            <p class="lead section-title">Subject Info:</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="core_subjects">Core Subjects <span class="text-danger">*</span>
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Class core/mandatory subjects"></i>
                                        </label>
                                        {!! Form::select('core_subjects[]', $coreSubjects, $csubjects , ['multiple' => 'true', 'readonly' => 'true', 'class' => 'form-control select2', 'required' => 'true']) !!}
                                        <span class="fa form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('core_subjects') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4" id="divSelective" @if($classInfo && !$classInfo->have_selective_subject) style="display: none;" @endif>
                                    <div class="form-group has-feedback">
                                        <label for="selective_subjects">Selective Subjects
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Class selective subjects. like religious subjects."></i>
                                        </label>
                                        @php
                                            $params = ['multiple' => 'true', 'class' => 'form-control select2', 'placeholder' => 'select subjects', 'data-placeholder' => 'select subjects'];
                                            if($classInfo && $classInfo->have_selective_subject){
                                                $params['data-max'] = $classInfo->max_selective_subject;
                                            }
                                        @endphp
                                        {!! Form::select('selective_subjects[]', $selectiveSubjects, $ssubjects , $params) !!}
                                        <span class="fa form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('selective_subjects') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4" id="divElective" @if($classInfo && !$classInfo->have_elective_subject) style="display: none;" @endif>
                                    <div class="form-group has-feedback">
                                        <label for="fourth_subject">4<sup>th</sup>/Elective Subject
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Select a subject if student have 4th subject. like class 9,10,11,12 have that."></i>
                                        </label>
                                        {!! Form::select('fourth_subject', $electiveSubjects, $esubject , ['data-placeholder' => 'select a subject', 'data-allow-clear' => 'true', 'placeholder' => 'select a subject', 'class' => 'form-control select2']) !!}
                                        <span class="fa form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('fourth_subject') }}</span>
                                    </div>
                                </div>
                            </div>


                            <p class="lead section-title">Access Info:</p>
                            <div class="row">
                                @if(!$student)
                                    <div class="col-md-4">
                                        <div class="form-group has-feedback">
                                            <label for="username">Username</label>
                                            <input  type="text" class="form-control" value="" name="username" placeholder="leave blank if not need to create user"  minlength="5" maxlength="255">
                                            <span class="glyphicon glyphicon-info-sign form-control-feedback"></span>
                                            <span class="text-danger">{{ $errors->first('username') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group has-feedback">
                                            <label for="password">Passwrod</label>
                                            <input type="password" class="form-control" name="password" placeholder="leave blank if not need to create user"  minlength="6" maxlength="50">
                                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        </div>
                                    </div>
                                @endif
                                @if($student && !$student->user_id)
                                    <div class="col-md-4">
                                        <div class="form-group has-feedback">
                                            <label for="user_id">User
                                                <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Leave as it is, if not need user"></i>
                                            </label>
                                            {!! Form::select('user_id', $users, null , ['placeholder' => 'Pick if needed','class' => 'form-control select2']) !!}
                                            <span class="form-control-feedback"></span>
                                            <span class="text-danger">{{ $errors->first('user_id') }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>


                        </div>
                        <!-- /.box-body -->--}}
                        <div class="box-footer">
                            <a href="{{URL::to('paper-published/list')}}" class="btn btn-default">Cancel</a>
                            {{-- <button type="submit" class="btn btn-info pull-right"><i class="fa @if($regiInfo) fa-refresh @else fa-plus-circle @endif"></i> @if($regiInfo) Update @else Add @endif</button> --}}
                            <button type="submit" class="btn btn-info pull-right"><i class="fa fa-plus-circle"></i> Add </button>

                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
<!-- END PAGE CONTENT-->

<!-- BEGIN PAGE JS-->
@section('extraScript')
    

<script type="text/javascript">
    $(document).ready(function () {
        window.section_list_url = '{{URL::Route("academic.section")}}';
        window.subject_list_url = '{{URL::Route("academic.subject")}}';
        window.section_capacity_check_url = '{{route("public.section_capacity_check")}}';
        window.get_class_subject_settings = '{{route("public.get_class_subject_settings", ":class_id")}}';
        Academic.studentInit();

    });
</script>
<script type="text/javascript">
    function fillAddress()
{
    if (filladdress.checked == true)
    {

        var door_no = document.getElementById("padds").value;
        var loc = document.getElementById("parea").value;
        var city = document.getElementById("pcity").value;       
        var pin = document.getElementById("ppin").value;       
        document.getElementById("cadds").value = door_no;
        document.getElementById("carea").value = loc;
        document.getElementById("ccity").value = city;
        document.getElementById("ccity").value = pin;
    }
    else if (filladdress.checked == false)
    {
        document.getElementById("cadds").value = '';
        document.getElementById("carea").value = '';
        document.getElementById("ccity").value = '';
        document.getElementById("ccity").value = '';
    }
}
</script>
@endsection
<!-- END PAGE JS-->
