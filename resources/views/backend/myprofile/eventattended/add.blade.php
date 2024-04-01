<!-- Master page  -->
@extends('backend.layouts.master')

<!-- Page title -->
@section('pageTitle') Event Attended  @endsection
<!-- End block -->

<!-- Page body extra class -->
@section('bodyCssClass') @endsection
<!-- End block -->

<!-- BEGIN PAGE CONTENT-->
@section('pageContent')
    <!-- Section header -->
    <section class="content-header">
        <h1>
            Event Attended 
            {{-- <small>@if($regiInfo) Update @else Add New @endif</small> --}}
            <small> Add New </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::route('user.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{URL::to('event-attended/list')}}"><i class="fa icon-student"></i> Article Published</a></li>
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
                            
                            <p class="lead section-title">Event Attended - FORM</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="name">Type of the Event<span class="text-danger">*</span></label>
                                        {{-- <input autofocus type="text" class="form-control" name="type" placeholder="type" value="@if($student){{ $student->name }}@else{{old('name')}}@endif" required minlength="5" maxlength="255"> --}}
                                        <select name="type" id="type" class="form-control show-tick"> <!-- onChange="selnature()" -->
                                            <option selected="selected">-Select-</option>
                                            <option value="Conference">Conference</option>
                                            <option value="FDP">FDP</option>
                                          <!--  <option value="OneCreditCourse">One Credit Course</option>
                                            <option value="OrientationProgramme">Orientation Programme</option> -->
                                            <option value="RefresherCourse">Refresher Course</option>
                                            <option value="SDP">SDP</option>
                                            <option value="Seminar">Seminar</option>
                                            <option value="ShortTermCourse">Short Term Course</option>
                                            <option value="Symposium">Symposium</option>
                                            <option value="Workshop">Workshop</option>
                                        </select>
                                        
                                        <span class="text-danger">{{ $errors->first('type') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="nick_name">Nature of the Event<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Category"></i></label>
                                        {{-- <input type="text" class="form-control" name="award_from" placeholder="award_from" value="@if($student){{ $student->nick_name }}@else{{old('nick_name')}}@endif" minlength="2" maxlength="50"> --}}
                                        <select name="nat" id="nat" class="form-control show-tick">
                                            <option selected="selected">-Select-</option>
                                            <option value="City">City</option>
                                            <option value="State">State</option>
                                            <option value="National">National</option>
                                            <option value="International">International</option>
                                        </select>
                                        
                                        <span class="text-danger">{{ $errors->first('nat') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group has-feedback">
                                        <label for="dob">Venue<span class="text-danger">*</span></label>
                                        <input type="text" name="place" id="place" class="form-control show-tick" required="required">
                                        
                                        <span class="fa fa-map-marker form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('place') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="gender">Title of the Programme<span class="text-danger">*</span>
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Upload Article with Header"></i>
                                        </label>
                                        {{-- @php $param = ['class' => 'form-control select2', 'placeholder' => 'select an option', 'required' => 'true']; if($gender) { $param['readonly'] = 'true'; } @endphp
                                        {!! Form::select('gender', AppHelper::GENDER, $gender , $param) !!} --}}
                                        <input name="tit" type="text" id="tit" class="form-control" required="required">
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('tit') }}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3" style="padding-left: 3%">
                                        <div class="form-group has-feedback">
                                            <label for="religion">Sponsored By<span class="text-danger">*</span>
                                                <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="select Award/Distinction"></i>
                                            </label>
                                            <input name="SBy" type="text" id="SBy" class="form-control" required="required">
                                            {{-- {!! Form::select('religion', AppHelper::RELIGION, $religion , ['class' => 'form-control select2', 'placeholder' => 'select an option', 'required' => 'true']) !!} --}}
                                            <span class="form-control-feedback"></span>
                                            <span class="text-danger">{{ $errors->first('SBy') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group has-feedback">
                                            <label for="blood_group">Organized By
                                                <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="select Awarded By"></i>
                                            </label>
                                            {{-- {!! Form::select('blood_group', AppHelper::BLOOD_GROUP, $bloodGroup , ['class' => 'form-control select2', 'placeholder' => 'select an option']) !!} --}}
                                            <input name="OBy" type="text" id="OBy" class="form-control" required="required">
                                            <span class="form-control-feedback"></span>
                                            <span class="text-danger">{{ $errors->first('OBy') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group has-feedback">
                                            <label for="nationality">From<span class="text-danger">*</span>
                                                <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="select Upload Image to be displayed in Website"></i>
                                            </label>
                                            {{-- {!! Form::select('nationality', ['Bangladeshi' => 'Bangladeshi', 'Other' => 'Other'], $nationality , ['class' => 'form-control', 'required' => 'true']) !!} --}}
                                            <input type='text' class="form-control date_picker2"  id="dtfr" readonly name="dtfr" placeholder="date"  required minlength="10" maxlength="255" />
                                            <span class="fa fa-calendar form-control-feedback"></span>
                                            <span class="text-danger">{{ $errors->first('dtfr') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3"style="padding-rigth: 3%">
                                        <div class="form-group has-feedback" >
                                            <label for="nationality">To</label>
                                            <input type='text' class="form-control date_picker2"  id="dtto" readonly name="to" placeholder="date"  required minlength="10" maxlength="255" />
                                            <span class="fa fa-calendar form-control-feedback"></span>
                                            <span class="text-danger">{{ $errors->first('dtto') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3" style="padding-left: 3%">
                                        <div class="form-group has-feedback">
                                            <label for="religion">Upload Proof File<span class="text-danger">*</span>
                                                <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="select Award/Distinction"></i>
                                            </label>
                                            <input name="prffle" type="file" id="prffle">
                                            <small>Please upload the pdf or image file size of below 3MB</small>
                                            {{-- {!! Form::select('religion', AppHelper::RELIGION, $religion , ['class' => 'form-control select2', 'placeholder' => 'select an option', 'required' => 'true']) !!} --}}
                                            <span class="form-control-feedback"></span>
                                            <span class="text-danger">{{ $errors->first('Award_distinction') }}</span>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                            
                            </div>
                           
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="{{URL::to('event-attended/list')}}" class="btn btn-default">Cancel</a>
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
@endsection
<!-- END PAGE JS-->
