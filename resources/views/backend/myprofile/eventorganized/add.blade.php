<!-- Master page  -->
@extends('backend.layouts.master')

<!-- Page title -->
@section('pageTitle') Event Organized @endsection
<!-- End block -->

<!-- Page body extra class -->
@section('bodyCssClass') @endsection
<!-- End block -->

<!-- BEGIN PAGE CONTENT-->
@section('pageContent')
    <!-- Section header -->
    <section class="content-header">
        <h1>
            Event Organized
            {{-- <small>@if($regiInfo) Update @else Add New @endif</small> --}}
            <small> Add New </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::route('user.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{URL::to('event-organized/list')}}"><i class="fa icon-student"></i>Event Organized</a></li>
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
                            
                            <p class="lead section-title">Event Organized</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="name">Type of Event<span class="text-danger">*</span></label>
                                        {{-- <input autofocus type="text" class="form-control" name="type" placeholder="type" value="@if($student){{ $student->name }}@else{{old('name')}}@endif" required minlength="5" maxlength="255"> --}}
                                        <select name="eveType" id="eveType" class="form-control show-tick" onchange="basicd()" required="">
                                            <option selected="selected" value="">-Select-</option>
                                            <option value="Conference">Conference</option>
                                            <option value="Executive Development Programmes">Executive Development Programmes</option>
                                            <option value="FDP/SDP">FDP/SDP</option>
                                            <option value="Orientation Programme">Orientation Programme</option>
                                            <option value="Refresher Course">Refresher Course</option>
                                            <option value="Seminar">Seminar</option>
                                            <option value="Short Term Course">Short Term Course</option>
                                            <option value="Symposium">Symposium</option>
                                            <option value="Training Programme">Training Programme</option>
                                            <option value="Workshop">Workshop</option>
                                            <option value="Others">Others</option>
                                                        <option value="OneCreditCourse">One Credit Course</option>
                                       </select>
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('arttit') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="nick_name">Level<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Category"></i></label>
                                        {{-- <input type="text" class="form-control" name="award_from" placeholder="award_from" value="@if($student){{ $student->nick_name }}@else{{old('nick_name')}}@endif" minlength="2" maxlength="50"> --}}
                                        <select name="patlvl" id="patlvl" class="form-control show-tick" required="">
                                            <option selected="selected" value="">-Select-</option>
                                            <option value="City">City</option>
                                            <option value="State">State</option>
                                            <option value="National">National</option>
                                            <option value="International">International</option>
                                          </select>
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('patlvl') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    {{-- <div class="form-group has-feedback">
                                        <label for="dob">Date of Publication<span class="text-danger">*</span></label>
                                        <input type='text' class="form-control date_picker2"  readonly name="date_of_publication" placeholder="date"  required minlength="10" maxlength="255" />
                                        <span class="fa fa-calendar form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('date_of_publication') }}</span>
                                    </div> --}}
                                    <div class="form-group has-feedback">
                                        <label for="religion">Conducted for<span class="text-danger">*</span>
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="select Award/Distinction"></i>
                                        </label>
                                        <select name="condf" id="condf" class="form-control show-tick" required="">
                                            <option selected="selected">-Select-</option>
                                            <option value="Teaching"> Teaching Staff </option>
                                            <option value="Technical"> Technical Staff </option>
                                            <option value="Students">Students</option>
                                            <option value="Non Teaching">Non Teaching Staff</option>
                                            <option value="Industry Personnel">Industry Personnel</option>
                                        </select>
                                        {{-- {!! Form::select('religion', AppHelper::RELIGION, $religion , ['class' => 'form-control select2', 'placeholder' => 'select an option', 'required' => 'true']) !!} --}}
                                        
                                        <span class="text-danger">{{ $errors->first('condf') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="religion">Name of the Event<span class="text-danger">*</span>
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Upload Article with Header"></i>
                                        </label>
                                        {{-- @php $param = ['class' => 'form-control select2', 'placeholder' => 'select an option', 'required' => 'true']; if($gender) { $param['readonly'] = 'true'; } @endphp
                                        {!! Form::select('gender', AppHelper::GENDER, $gender , $param) !!} --}}
                                        <textarea name="evenam" id="isnInputboktit" class="form-control no-resize" placeholder="Please type Name of the Event..."></textarea>
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('evenam') }}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px">
                            <div class="col-md-3">
                               <div class="form-group has-feedback" style="padding-left: 0.1%">
                                        <label for="blood_group">Date of the Event - From Date<span class="text-danger">*</span></label>
                                        <input name="dtfr" type="date" readonly name ="" id="dtfr" size="15" class="form-control" placeholder="Please Choose From Date.">
                                        <span class="fa fa-calendar form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('dtfr') }}</span>
                                    </div>
                            </div>
                            <div class="col-md-3" style="padding-right: 5%">
                                <div class="form-group has-feedback">
                                    <label for="nationality">To Date<span class="text-danger">*</span></label>
                                    <input name="dtto" type="date" readonly name ="" id="dtto" class="form-control" placeholder="Please choose To Date">
                                    <span class="fa fa-calendar form-control-feedback"></span>
                                    <span class="text-danger">{{ $errors->first('dtto') }}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group has-feedback">
                                    <label for="nationality">Collaborating Agencies, if any<span class="text-danger">*</span>
                                        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="select Upload Image to be displayed in Website"></i>
                                    </label>
                                    {{-- {!! Form::select('nationality', ['Bangladeshi' => 'Bangladeshi', 'Other' => 'Other'], $nationality , ['class' => 'form-control', 'required' => 'true']) !!} --}}
                                    <input type="text" name="coag" id="coag" class="form-control no-resize" placeholder="Please type Name of the Collobarating Agency...">
                                    <span class="form-control-feedback"></span>
                                    <span class="text-danger">{{ $errors->first('coag') }}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group has-feedback">
                                    <label for="nationality">Venue</label>
                                    <textarea name="ven" id="isnInputboktit" class="form-control no-resize" placeholder="Please type Venue..."></textarea>
                                    <span class="fa fa-map-marker form-control-feedback"></span>
                                    <span class="text-danger">{{ $errors->first('ven') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3" style="padding-left: 3%">
                               <div class="form-group has-feedback">
                                        <label for="dob">Sponsorships<span class="text-danger">*</span></label>
                                        <select name="spr" class="form-control show-tick" id="spr"  required="">
                                            <option selected="selected">-Select-</option>
                                            <option value="Received">Received</option>
                                            <option value="Not Received">Not Received</option>
                                    </select>
                                        
                                        <span class="text-danger">{{ $errors->first('spr') }}</span>
                                    </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group has-feedback">
                                    <label for="dob">No of Days<span class="text-danger">*</span></label>
                                    <input name="daycnt" type="text" id="daycnt" class="form-control" required="">
                                    
                                    <span class="text-danger">{{ $errors->first('daycnt') }}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group has-feedback">
                                    <label for="nationality">No of Participants<span class="text-danger">*</span>
                                        <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="select Upload Image to be displayed in Website"></i>
                                    </label>
                                    {{-- {!! Form::select('nationality', ['Bangladeshi' => 'Bangladeshi', 'Other' => 'Other'], $nationality , ['class' => 'form-control', 'required' => 'true']) !!} --}}
                                    <input name="audcnt" type="text" id="audcnt" class="form-control">
                                    <span class="form-control-feedback"></span>
                                    <span class="text-danger">{{ $errors->first('audcnt') }}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group has-feedback">
                                    <label for="nationality">Upload Brochure of the Event</label>
                                    <input name="upbrou" type="file" id="upbrou" required="required" accept="pdf/*" onchange="ValidateSingleInputdoc(this);">
                                    <small> Please upload the Brochure of the Event (pdf file size of below 3 MB)</small>
                                    <span class="fa fa-map-marker form-control-feedback"></span>
                                    <span class="text-danger">{{ $errors->first('upbrou') }}</span>
                                </div>
                            </div>
                        </div>
                            
                            
                           
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="{{URL::to('event-organized/list')}}" class="btn btn-default">Cancel</a>
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
