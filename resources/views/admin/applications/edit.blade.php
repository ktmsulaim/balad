@extends('layouts.admin.app', ['title' => 'View application'])

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            @include('components.admin.notification')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Application #{{ $application->id }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.applications.update', $application->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">First name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('first_name') error @enderror"
                                        value="{{ old('first_name', $application->first_name) }}" name="first_name"
                                        id="first_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Last name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('last_name') error @enderror"
                                        value="{{ old('last_name', $application->last_name) }}" name="last_name"
                                        id="last_name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Gender</label>
                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input type="radio" name="gender" id="male" class="form-check-input" value="Male"
                                            checked>
                                        <label for="male" class="form-check-label">Male</label>
                                    </div>
                                    <div class="form-check ml-2">
                                        <input type="radio" name="gender" id="female" class="form-check-input"
                                            value="Female">
                                        <label for="female" class="form-check-label">Female</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dob">Date of birth <span class="text-danger">*</span></label>
                                    <input type="text" name="dob" value="{{ old('dob', $application->dob) }}"
                                        class="form-control text-left datepicker @error('username') error @enderror"
                                        value="{{ old('dob') }}" data-toggle="datetimepicker" placeholder="DD-MM-YYYY" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_of_guardian">Name of guardian <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name_of_guardian') error @enderror"
                                        value="{{ old('name_of_guardian', $application->name_of_guardian) }}"
                                        name="name_of_guardian" id="name_of_guardian" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="relationship_with_guardian">Relationship with guardian</label>
                                    <input type="text"
                                        class="form-control @error('relationship_with_guardian') error @enderror"
                                        value="{{ old('relationship_with_guardian', $application->relationship_with_guardian) }}"
                                        name="relationship_with_guardian" id="relationship_with_guardian">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') error @enderror"
                                        value="{{ old('email', $application->email) }}" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control @error('phone') error @enderror"
                                        value="{{ old('phone', $application->phone) }}" name="phone" id="phone" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone2">Secondary phone</label>
                                    <input type="tel" class="form-control @error('phone2') error @enderror"
                                        value="{{ old('phone2', $application->phone2) }}" name="phone2" id="phone2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="whatsapp_number">Whatsapp number</label>
                                    <input type="tel" class="form-control @error('whatsapp_number') error @enderror"
                                        value="{{ old('whatsapp_number', $application->whatsapp_number) }}"
                                        name="whatsapp_number" id="whatsapp_number">
                                </div>
                            </div>
                        </div>
                        <div class="my-3">
                            <h4>Address in living country</h4>
                        </div>
                        <div class="form-group">
                            <label for="address_line1">Address Line 1 <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('address_line1') error @enderror"
                                value="{{ old('address_line1', $application->address_line1) }}" name="address_line1"
                                id="address_line1" required>
                        </div>
                        <div class="form-group">
                            <label for="address_line2">Address Line 2</label>
                            <input type="text" class="form-control @error('address_line2') error @enderror"
                                value="{{ old('address_line2', $application->address_line2) }}" name="address_line2"
                                id="address_line2">
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="post">Post <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('post') error @enderror"
                                        value="{{ old('post', $application->post) }}" name="post" id="post" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="state">State <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('state') error @enderror"
                                        value="{{ old('state', $application->state) }}" name="state" id="state" required>
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
                            <textarea class="form-control" name="address_in_india" id="address_in_india"
                                rows="5">{{ old('address_in_india', $application->address_in_india) }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="time_preference">Time preference (IST) <span
                                            class="text-danger">*</span></label>
                                    <select name="time_preference" id="time_preference" class="form-control" required>
                                        @foreach ((new \App\Models\Application)->time_preferences as $key => $tp)
                                            <option value="{{ $key }}" {{ $application->time_preference == $key ? 'selected' : '' }}>{{ $tp }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="learnt_malayalam_before">Learnt Malayalam before? <span
                                            class="text-danger">*</span></label>
                                    <div class="d-flex align-items-center">
                                        <div class="form-check">
                                            <input type="radio" name="learnt_malayalam_before" id="learnt_malayalam_yes"
                                                class="form-check-input" value="1" checked required>
                                            <label for="learnt_malayalam_yes" class="form-check-label">Yes</label>
                                        </div>
                                        <div class="form-check ml-2">
                                            <input type="radio" name="learnt_malayalam_before" id="learnt_malayalam_no"
                                                class="form-check-input" value="0" required>
                                            <label for="learnt_malayalam_no" class="form-check-label">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="know_about_aksharam">How did you know about AKSHARAM?</label>
                            <textarea name="know_about_aksharam" id="know_about_aksharam" class="form-control"
                                rows="5">{{ old('know_about_aksharam', $application->know_about_aksharam) }}</textarea>
                        </div>


                        <div class="form-group">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ $application->photo() }}" alt="Applicant's photo" class="img-fluid" width="150">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Payment info</h3>
                </div>
                <div class="card-body">
                    @if ($application->hasAdmissionFee())
                    <div class="table-responsive">
                        <table class="table border">
                            <tr>
                                <th>Trnasaction ID</th>
                                <td>{{ $application->admissionFee()->transaction_id }}</td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td>{{ $application->admissionFee()->created_at->format('F d, Y') }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if ($application->admissionFee()->status == 1)
                                        <span class="badge badge-success">Success</span>
                                    @else
                                        <span class="badge badge-danger">Failed</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    @else
                        <p>Applicant didn't make application fee.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('js/website-custom.js') }}"></script>
@endsection

@section('custom_scripts')

$('.datepicker').datetimepicker({
    autoclose: true,
    format: 'DD-mm-yyyy'
});

$('#country').select2({
    data: window.countries,
})

$('#country').val("{{$application->country}}");
$('#country').trigger('change');
@endsection