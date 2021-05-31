@extends('layouts.website', ['pageTitle' => 'Apply | Aksharam'])


@section('content')
@include('components.header', ['pageTitle' => 'Apply', 'pageSubTitle' => 'Join us within no time', 'links' => [
    0 => [
        'label' => 'Aksharam',
        'url' => 'javascript:void(0)'
    ],
    1 => [
        'label' => 'Apply',
        'url' => route('aksharam.apply')
    ]
]])

<section class="section bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="mb-3">
                    <div id="processTabs" data-plugin="tabs" class="customjs">
						<ul class="process-steps row col-mb-30">
							<li class="col-sm-6 col-lg-4 ui-tabs-active">
								<a href="{{ route('aksharam.apply') }}" class="i-circled i-bordered i-alt mx-auto">1</a>
								<h5>Apply</h5>
							</li>
							<li class="col-sm-6 col-lg-4">
								<a href="{{ route('aksharam.payment') }}" class="i-circled i-bordered i-alt mx-auto">2</a>
								<h5>Make Payment</h5>
							</li>
                            <li class="col-sm-6 col-lg-4">
								<a href="javascript:void(0)" class="i-circled i-bordered i-alt mx-auto">3</a>
								<h5>Complete</h5>
							</li>
						</ul>
                    </div>
                </div>

                @include('components.errors')
                @include('components.success')
                
                <form action="{{ route('aksharam.apply.post') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">First name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('first_name') error @enderror" value="{{ old('first_name', @$application->first_name) }}" name="first_name" id="first_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name">Last name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('last_name') error @enderror" value="{{ old('last_name', @$application->last_name) }}" name="last_name" id="last_name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Gender</label>
                            <div class="d-flex align-items-center">
                                <div class="form-check">
                                    <input type="radio" name="gender" id="male" class="form-check-input" value="Male" checked>
                                    <label for="male" class="form-check-label">Male</label>
                                </div>
                                <div class="form-check ml-2">
                                    <input type="radio" name="gender" id="female" class="form-check-input" value="Female">
                                    <label for="female" class="form-check-label">Female</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dob">Date of birth <span class="text-danger">*</span></label>
                                <input type="text" name="dob" value="{{ old('dob', @$application->dob) }}" class="form-control text-left component-datepicker default @error('username') error @enderror" value="{{ old('dob') }}" placeholder="DD-MM-YYYY" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_of_guardian">Name of guardian <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name_of_guardian') error @enderror" value="{{ old('name_of_guardian', @$application->name_of_guardian) }}" name="name_of_guardian" id="name_of_guardian" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="relationship_with_guardian">Relationship with guardian</label>
                                <input type="text" class="form-control @error('relationship_with_guardian') error @enderror" value="{{ old('relationship_with_guardian', @$application->relationship_with_guardian) }}" name="relationship_with_guardian" id="relationship_with_guardian">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') error @enderror" value="{{ old('email', @$application->email) }}" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control @error('phone') error @enderror" value="{{ old('phone', @$application->phone) }}" name="phone" id="phone" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone2">Secondary phone</label>
                                <input type="tel" class="form-control @error('phone2') error @enderror" value="{{ old('phone2', @$application->phone2) }}" name="phone2" id="phone2">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="whatsapp_number">Whatsapp number</label>
                                <input type="tel" class="form-control @error('whatsapp_number') error @enderror" value="{{ old('whatsapp_number', @$application->whatsapp_number) }}" name="whatsapp_number" id="whatsapp_number">
                            </div>
                        </div>
                    </div>
                    <div class="my-3">
                        <h4>Address in living country</h4>
                    </div>
                    <div class="form-group">
                        <label for="address_line1">Address Line 1 <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('address_line1') error @enderror" value="{{ old('address_line1', @$application->address_line1) }}" name="address_line1" id="address_line1" required>
                    </div>
                    <div class="form-group">
                        <label for="address_line2">Address Line 2</label>
                        <input type="text" class="form-control @error('address_line2') error @enderror" value="{{ old('address_line2', @$application->address_line2) }}" name="address_line2" id="address_line2">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="post">Post <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('post') error @enderror" value="{{ old('post', @$application->post) }}" name="post" id="post" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="state">State <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('state') error @enderror" value="{{ old('state', @$application->state) }}" name="state" id="state" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="country">Country <span class="text-danger">*</span></label>
                                <select name="country" id="country" class="form-control" required>
    
                                </select>
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group">
                       <label for="address_in_india">Address in India</label>
                       <textarea class="form-control" name="address_in_india" id="address_in_india" rows="5">{{ old('address_in_india', @$application->address_in_india) }}</textarea>
                   </div>

                   <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                               <label for="time_preference">Time preference (IST) <span class="text-danger">*</span></label>
                               <select name="time_preference" id="time_preference" class="form-control" required>
                                   <option value="1">7:00am to 7:45am</option>
                                   <option value="2">10:00am to 10:45am</option>
                                   <option value="3">2:45pm to 3:30am</option>
                                   <option value="4">8:30pm to 9:15pm</option>
                               </select>
                           </div>
                       </div>
                       <div class="col-md-6">
                           <div class="form-group">
                               <label for="learnt_malayalam_before">Learnt Malayalam before? <span class="text-danger">*</span></label>
                               <div class="d-flex align-items-center">
                                <div class="form-check">
                                    <input type="radio" name="learnt_malayalam_before" id="learnt_malayalam_yes" class="form-check-input" value="1" checked required>
                                    <label for="learnt_malayalam_yes" class="form-check-label">Yes</label>
                                </div>
                                <div class="form-check ml-2">
                                    <input type="radio" name="learnt_malayalam_before" id="learnt_malayalam_no" class="form-check-input" value="0" required>
                                    <label for="learnt_malayalam_no" class="form-check-label">No</label>
                                </div>
                            </div>
                           </div>
                       </div>
                   </div>

                   <div class="form-group">
                        <label for="photo">Photo</label>
                        <input type="file" name="photo" id="photo" class="form-control-file" {{ !@$application || !@$application->hasPhoto() ? 'required' : '' }}>
                   </div>
                   
                   <div class="form-group">
                       <label for="know_about_aksharam">How did you know about AKSHARAM?</label>
                       <textarea name="know_about_aksharam" id="know_about_aksharam" class="form-control" rows="5">{{ old('know_about_aksharam', @$application->know_about_aksharam) }}</textarea>
                   </div>

                   
                   <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="button button-rounded">Submit</button>
                            </div>
                            <div class="col-md-6 text-right">
                                Already applied? Edit <a href="{{ route('aksharam.application.requestcode') }}">here</a>
                            </div>
                        </div>
                   </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/components/datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/select-boxes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components/bs-filestyle.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('js/components/datepicker.js') }}"></script>
    <script src="{{ asset('js/components/select-boxes.js') }}"></script>
    <script src="{{ asset('js/components/bs-filestyle.js') }}"></script>
@endsection

@section('custom_js')
$('.component-datepicker.default').datepicker({
    autoclose: true,
    format: 'dd-mm-yyyy'
});

$('#country').select2({
    data: window.countries
})

$('#photo').fileinput({
    showUpload: false,
    allowedFileTypes: ['image'],
    maxFileSize: 1024,
    @if ($application && $application->hasPhoto())
        initialPreviewAsData: true,
        initialPreview: "{{ Storage::url($application->photo) }}"
    @endif
})
@endsection