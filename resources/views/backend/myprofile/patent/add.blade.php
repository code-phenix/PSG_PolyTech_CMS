<!-- Master page  -->
@extends('backend.layouts.master')

<!-- Page title -->
@section('pageTitle') Patent @endsection
<!-- End block -->

<!-- Page body extra class -->
@section('bodyCssClass') @endsection
<!-- End block -->

<!-- BEGIN PAGE CONTENT-->
@section('pageContent')
    <!-- Section header -->
    <section class="content-header">
        <h1>
            Patent
            {{-- <small>@if($regiInfo) Update @else Add New @endif</small> --}}
            <small> Add New </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::route('user.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{URL::to('patent/list')}}"><i class="fa icon-student"></i> Patent</a></li>
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
                        <form novalidate id="entryForm" action= "{{URL::Route('student.store')}} " method="post" enctype="multipart/form-data" name="myform">
                        {{-- <div class="box-header">
                            <div class="callout callout-danger">
                                <p><b>Note:</b> Create a class and section before create new student. And subject if student have elective subject.</p>
                            </div>
                        </div> --}}
                        <div class="box-body">
                            @csrf
                            
                            <p class="lead section-title">Patent/p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="name">Patent Number<span class="text-danger">*</span></label>
                                        <input name="flno" type="text" id="flno" placeholder="Enter the Patent No." class="form-control" required="" aria-required="true">
                                        {{-- <input autofocus type="text" class="form-control" name="type" placeholder="type" value="@if($student){{ $student->name }}@else{{old('name')}}@endif" required minlength="5" maxlength="255"> --}}
                                        
                                        <span class="text-danger">{{ $errors->first('flno') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="nick_name">Type of Patent<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Nature of the Journal"></i></label>
                                        {{-- <input type="text" class="form-control" name="award_from" placeholder="award_from" value="@if($student){{ $student->nick_name }}@else{{old('nick_name')}}@endif" minlength="2" maxlength="50"> --}}
                                        <select name="cat" id="oselect" onchange="if (this.options[this.selectedIndex].value =='Others'){document.myform['Others'].style.visibility='visible'}else {document.myform['Others'].style.visibility='hidden'};">
                                            <option selected="selected" value="">-Select-</option>
                                            <option value="Process">Process</option>
                                            <option value="Product">Product</option>
                                            <option value="Others">Others</option>
                                          </select><br>
                                                   <!-- <input type="text" id="thers" name="thers" class="form-control" placeholder=""/> -->
                                                   <input type="text" name="Others" class="form-control" placeholder="If any" style="visibility:hidden;">
                                        <span class="text-danger">{{ $errors->first('cat') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group has-feedback">
                                        <label for="dob">Level<span class="text-danger">*</span></label>
                                        {{-- <input type='text' class="form-control date_picker2"  readonly name="mnt" placeholder="date"  required minlength="10" maxlength="255" /> --}}
                                        <select name="patlvl" id="patlvl" class="form-control show-tick">
                                            <option selected="selected">-Select-</option>
                                            <option value="International">International</option>
                                            <option value="National">National</option>
                                      </select> 
                                        <span class="text-danger">{{ $errors->first('patlvl') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="gender">Country<span class="text-danger">*</span>
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="select Level"></i>
                                        </label>
                                        {{-- @php $param = ['class' => 'form-control select2', 'placeholder' => 'select an option', 'required' => 'true']; if($gender) { $param['readonly'] = 'true'; } @endphp
                                        {!! Form::select('gender', AppHelper::GENDER, $gender , $param) !!} --}}
                                        <select name="cntry" id="cntry" class="form-control show-tick">
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="Brunei">Brunei</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burma">Burma</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                        <option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Curacao">Curacao</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Holy See">Holy See</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India" selected="selected">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran">Iran</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea, North">Korea, North</option>
                                            <option value="Korea, South">Korea, South</option>
                                            <option value="Kosovo">Kosovo</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Laos">Laos</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libya">Libya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macau">Macau</option>
                                            <option value="Macedonia">Macedonia</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Micronesia">Micronesia</option>
                                            <option value="Moldova">Moldova</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montenegro">Montenegro</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="North Korea">North Korea</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Palestinian Territories">Palestinian Territories</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russia">Russia</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                            <option value="Saint Lucia">Saint Lucia</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Sint Maarten">Sint Maarten</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="South Korea">South Korea</option>
                                            <option value="South Sudan">South Sudan</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syria">Syria</option>
                                            <option value="Taiwan">Taiwan</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania">Tanzania</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Timor-Leste">Timor-Leste</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Vietnam">Vietnam</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                          </select>
                            </div>
                                        <span class="text-danger">{{ $errors->first('cntry') }}</span>
                                    </div>
                                </div>

                            </div>
                            <div class="row" style="padding-left: 1%">
                                <div class="col-md-3" style="float ">
                                    <div class="form-group has-feedback" >
                                        <label for="religion">Title of the Patent<span class="text-danger">*</span>
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="select Award/Distinction"></i>
                                        </label>
                                        <textarea rows="2" name="ptnam" class="form-control no-resize" placeholder="Title of the Patent"></textarea>
                                        {{-- {!! Form::select('religion', AppHelper::RELIGION, $religion , ['class' => 'form-control select2', 'placeholder' => 'select an option', 'required' => 'true']) !!} --}}
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('ptnam') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="blood_group">Collabrating Agencies
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="select Awarded By"></i>
                                        </label>
                                        {{-- {!! Form::select('blood_group', AppHelper::BLOOD_GROUP, $bloodGroup , ['class' => 'form-control select2', 'placeholder' => 'select an option']) !!} --}}
                                        <textarea rows="2" name="agent" class="form-control no-resize" placeholder="Collabrating Agencies"></textarea>
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('agent') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="nationality">
                                            No. of Authors<span class="text-danger">*</span>
                                            <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Other Indexing"></i>
                                        </label>
                                        {{-- {!! Form::select('nationality', ['Bangladeshi' => 'Bangladeshi', 'Other' => 'Other'], $nationality , ['class' => 'form-control', 'required' => 'true']) !!} --}}
                                        <input type="text" name="noa" id="noa" class="form-control" placeholder="Mention Authors Count..">
                                        {{-- <input class="form-control" type="text" placeholder="Type other Indexing here" name="othind1"> --}}
                                        <span class="form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('noa') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group has-feedback">
                                        <label for="nationality">Date of Filing</label>
                                        <input type='text' class="form-control date_picker2"  readonly name="dtpub" placeholder="date"  required minlength="10" maxlength="255" /> 
                                        {{-- <span class="fa fa-map-marker form-control-feedback"></span> --}}
                                        <span class="fa fa-calendar form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('dtpub') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-left: 1%">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="photo">Date of Published<span class="text-danger">*</span></label>
                                        {{-- <input  type="file" class="form-control" accept=".jpeg, .jpg, .png" name="photo" placeholder="Photo image"> --}}
                                        <input type='text' class="form-control date_picker2"  readonly name="dtpub1" placeholder="date"  required minlength="10" maxlength="255" />
                                        <span class="fa fa-calendar form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('dtpub1') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="email">Date of Granted</label>
                                        {{-- <input  type="email" class="form-control" name="email"  placeholder="email address" value="@if($student){{$student->email}}@else{{old('email')}}@endif" maxlength="100" > --}}
                                        <input type='text' class="form-control date_picker2"  readonly name="dtapr" placeholder="date"  required minlength="10" maxlength="255" /> 
                                        <span class="fa fa-calendar form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('dtapr') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="phone_no">Is it commercialized</label>
                                        {{-- <input  type="text" class="form-control" name="phone_no" placeholder="phone or mobile number" value="@if($student){{$student->phone_no}}@else{{old('phone_no')}}@endif" maxlength="15"> --}}
                                        <input class="with-gap" required="required" name="pattype" id="radio_3" value="Yes" type="radio">
                                        <label for="radio_3">Yes</label>
                     <input id="radio_4" required="required" name="pattype" class="with-gap" value="No" type="radio">
                                        <label for="radio_4">No</label>
                                        {{-- <span class="fa fa-phone form-control-feedback"></span> --}}
                                        <span class="text-danger">{{ $errors->first('pgst') }}</span>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-left: 1%">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="extra_activity">Status</label>
                                        {{-- <textarea name="extra_activity" class="form-control"  maxlength="255" >@if($student){{ $student->extra_activity }}@else{{ old('extra_activity') }} @endif</textarea> --}}
                                        <input class="with-gap" required="required" name="pst" id="radio_5" value="Applied" type="radio">
                                        <label for="radio_5">Applied</label>
                                        <input id="radio_7" name="pst" required="required" class="with-gap" value="Published" type="radio">
                                        <label for="radio_7">Published</label>
                                        <input id="radio_6" name="pst" required="required" class="with-gap" value="Granted" type="radio">
                                        <label for="radio_6">Granted</label>
                                        <span class="text-danger">{{ $errors->first('pst') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="note">Adopted by Industry</label>
                                        {{-- <textarea name="note" class="form-control"  maxlength="500">@if($student){{ $student->note }}@else{{ old('note') }} @endif</textarea> --}}
                                        <label>By Which Agencies</label>
                                        <input name="adopagen" type="text" class="form-control" placeholder="Enter Agencies Name..">
                                        <span class="text-danger">{{ $errors->first('jtit') }}</span>
                                    </div>
                                </div>
                            </div>
                            {{-- <p class="lead  section-title">Guardian Info:</p> --}}
                            <div class="row" style="padding-left: 1%">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="father_name">Upload Approval Letter copy</label>
                                        {{-- <input type="text" class="form-control" name="father_name" placeholder="name" value="@if($student){{ $student->father_name }}@else{{old('father_name')}}@endif"  maxlength="255"> --}}
                                        <input name="upfile" type="file" id="upfile" required="required" accept="pdf/*" onchange="ValidateSingleInputdoc(this);">
                                        <small>Please upload the pdf or image file size of below 3MB</small>
                                        <span class="text-danger">{{ $errors->first('paptit') }}</span>
                                    </div>
                                </div>
                                
                                {{-- <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="father_phone_no">Abstract</label>
                                        {{-- <input  type="text" class="form-control" name="father_phone_no" placeholder="phone or mobile number" value="@if($student){{$student->father_phone_no}}@else{{old('father_phone_no')}}@endif" maxlength="15"> 
                                        <textarea class="form-control" name="Abs" id="Abs" rows="4" cols="50" required="" placeholder="Type your Abstract here,...."></textarea>
                                        {{-- <span class="fa fa-phone form-control-feedback"></span> 
                                        <span class="text-danger">{{ $errors->first('Abs') }}</span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="mother_name">Upload Proof for impact Factor/Indexing</label>
                                        {{-- <input  type="text" class="form-control" name="mother_name" placeholder="name" value="@if($student){{ $student->mother_name }}@else{{old('mother_name')}}@endif" maxlength="255"> 
                                        <input name="upprf" type="file" id="upprf" accept="pdf/*" onchange="ValidateSingleInputdoc(this);">
                                        {{-- <span class="fa fa-info form-control-feedback"></span> 
                                        <span class="text-danger">{{ $errors->first('upprf') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="mother_phone_no">URL </label>
                                        {{-- <input  type="text" class="form-control" name="mother_phone_no"  placeholder="phone or mobile number" value="@if($student){{$student->mother_phone_no}}@else{{old('mother_phone_no')}}@endif"  maxlength="15"> 
                                        <input name="url" type="text" id="url" size="30">
                                        {{-- <span class="fa fa-phone form-control-feedback"></span> 
                                        <span class="text-danger">{{ $errors->first('url') }}</span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="guardian">Upload Paper</label>
                                        {{-- <input  type="text" class="form-control" name="guardian" placeholder="name" value="@if($student){{ $student->guardian }}@else{{old('guardian')}}@endif" maxlength="25>
                                        <input name="upppr" type="file" id="upppr" accept="pdf/*" onchange="ValidateSingleInputdoc(this);" required="">
                                        {{-- <span class="fa fa-info form-control-feedback"></span> 
                                        <span class="text-danger">{{ $errors->first('upppr') }}</span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="guardian_phone_no">Upload Paper Review comments</label>
                                        {{-- <input  type="text" class="form-control" name="guardian_phone_no" placeholder="phone or mobile number" value="@if($student){{$student->guardian_phone_no}}@else{{old('guardian_phone_no')}}@endif"  maxlength="15"> 
                                        <input name="updrv" type="file" id="updrv" accept="pdf/*" onchange="ValidateSingleInputdoc(this);">
                                        {{-- <span class="fa fa-phone form-control-feedback"></span> 
                                        <span class="text-danger">{{ $errors->first('updrv') }}</span>
                                    </div>
                                </div>
                            </div> --}}
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
                            <a href="{{URL::to('patent/list')}}" class="btn btn-default">Cancel</a>
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
    function selpat()
    {
      a =  $('#oselect').val(); 
      //alert(a);

      if(a == "Others") {
    $('#thers').show();
    
  } else {
    $('#thers').hide();
    
  }
    }
    </script>
@endsection
<!-- END PAGE JS-->
