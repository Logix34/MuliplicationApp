@extends('user::layouts.master')

@section('content')
    @role('Church Planter')
    <form method="post" action="{{ route('user.profile.update') }}" enctype="multipart/form-data" >
    @csrf
        <input type="hidden" name="user_id" value="{{$user->id}}">
        @if($user->project)
        <div class="row justify-content-center">
            <div class="col-6 col-md-3">
                <h6>{{$user->project->coordinator->name}}</h6>
                <hr style="margin: 0; padding: 0">
                <h6>Coordinator</h6>
            </div>
            <div class="col-6 col-md-3">
                <h6>{{$user->project->project_id}}</h6>
                <hr style="margin: 0; padding: 0">
                <h6>Project ID</h6>
            </div>
        </div>
        @endif
        <h5>Personal Information</h5>
        <div class="row">
            <div class="col-12 col-md-2">
                <img src="{{$user->getFirstMediaUrl('image')}}" alt="" height="256px" style="object-fit: cover">
                <input type="file" name="image" >
            </div>
            <div class="col-6 col-md-5">
                <div class="form-group">
                    <span class="data-label">SurName</span>
                    <input name="name" class="form-control" value="{{ $user->name }}" required>
                    <input type="hidden" name="id" value="{{ $user->id }}">
                </div>
                <div class="form-group">
                    <span class="data-label">Given Name</span>
                    <input type="text" name="given_name" class="form-control" value="{{ $user->given_name }}" required>
                </div>
                <div class="form-group">
                    <span class="data-label">Marital Status</span>
                    <select  class="form-control" id="marital_status" name="marital_status" required>
                        <option selected>Select Marital Status</option>
                            <option value="Married">Married</option>
                            <option value="single">Single</option>
                            <option value="devorced">Devorced</option>
                    </select>
                </div><!-- data-item -->
                <div class="form-group">
                    <span class="data-label">Gender</span>
                    <select  class="form-control" id="gender" name="gender" required>
                        <option selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="other">other</option>
                    </select>
                </div><!-- data-item -->
                <div class="form-group">
                    <input type="hidden" id="token" name="token" value="{{ $token }}" disabled>

                    <span class="data-label">Date of Birth</span>
                    <input type="date" name="dob" id="dob" class="form-control" value="{{ $user->dob }}" required>
                </div><!-- data-item -->
                <div class="form-group">
                    <span class="data-label"># of Children</span>
                    <input type="number" name="children" class="form-control" value="{{ $user->children }}" required>
                </div><!-- data-item -->
            </div>
            <div class="col-6 col-md-5">
                <div class="form-group">
                    <span class="data-label">Phone</span>
                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" required>
                </div><!-- data-item -->
                <div class="form-group">
                    <span class="data-label">Country</span>
                    <select  class="form-control" id="country" name="country" required>
                        <option selected>{{ $user->country }}</option>
                        @foreach($countries as $country)
{{--                             @php $country = (array)$country@endphp--}}
                            <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                        @endforeach
                    </select>
                </div><!-- data-item -->
                <div class="form-group">
                    <span class="data-label">State</span>
                    <select  class="form-control" id="states" name="state" required>
                        <option selected>{{ $user->state }}</option>
                    </select>
{{--                    <input type="text" name="state" class="form-control" value="{{ $user->state }}">--}}
                </div><!-- data-item -->
                <div class="form-group">
                    <span class="data-label">City</span>
                    <select  class="form-control" id="city" name="city" required>
                        <option selected>{{ $user->city }}</option>
                    </select>
{{--                    <input type="text" name="city" class="form-control" value="{{ $user->city }}">--}}
                </div><!-- data-item -->
                <div class="form-group">
                    <span class="data-label">Email</span>
                    <input type="text" class="form-control" value="{{ $user->email }}" disabled>
                </div><!-- data-item -->
                <div class="form-group">
                    <span class="data-label">Age</span>
                    <input type="number" id="age" class="form-control" value="{{ $user->age }}" readonly>
                </div><!-- data-item -->
            </div>
        </div>
        <hr>
        <h5>INFORMATION OF THE AREA WHERE THE NEW CHURCH WILL BE PLANTED</h5>
        <div class="row">
            <div class="form-group col-6 col-md">
                <span class="data-label">Name</span>
                <input name="area_name" class="form-control" value="{{ $user->area_name }}" required>
            </div><!-- data-item -->
            <div class="form-group col-6 col-md">
                <span class="data-label">Denomination</span>
                <input type="text" class="form-control" value="{{ $user->project->denomination }}" readonly>
            </div><!-- data-item -->
            <div class="form-group col-6 col-md">
                <span class="data-label">Country</span>
                <input type="text" class="form-control" value="{{ $user->project->country }}" readonly>
            </div><!-- data-item -->
            <div class="form-group col-6 col-md">
                <span class="data-label">State</span>
                <input type="text" class="form-control" value="{{ $user->project->state }}" readonly>
            </div><!-- data-item -->
            <div class="form-group col-6 col-md">
                <span class="data-label">City</span>
                <input type="text" name="area_city" class="form-control" value="{{ $user->project->city }}">
            </div><!-- data-item -->
        </div>
        <hr>
        <h5>INFORMATION OF THE MOTHER CHURCH</h5>
        <div class="row">
            <div class="form-group col-6 col-md">
                <span class="data-label">Name</span>
                <input name="mc_name" class="form-control" value="{{ $user->mc_name }}" required>
            </div><!-- data-item -->
            <div class="form-group col-6 col-md">
                <span class="data-label">Neighborhood</span>
                <input type="text" name="mc_neighbourhood" class="form-control" value="{{ $user->mc_neighbourhood }}" required>
            </div><!-- data-item -->
            <div class="form-group col-6 col-md">
                <span class="data-label">Country</span>
                <select  class="form-control" id="mcCountry" name="mc_country" required>
                    <option selected>{{ $user->mc_country }}</option>
                    @foreach($countries as $country)
                        {{-- @php $country = (array)$country@endphp--}}
                        <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                    @endforeach
                </select>
{{--                <input type="text" name="mc_country" class="form-control" value="{{ $user->mc_country }}" required>--}}
            </div><!-- data-item -->
            <div class="form-group col-6 col-md">
                <span class="data-label">State</span>
                <select  class="form-control" id="mcStates" name="mc_state" required>
                    <option selected>{{ $user->mc_state }}</option>
                </select>
{{--                <input type="text" name="mc_state" class="form-control" value="{{ $user->mc_state }}" required>--}}
            </div><!-- data-item -->
            <div class="form-group col-6 col-md">
                <span class="data-label">City</span>
                <select  class="form-control" id="mcCity" name="mc_city" required>
                    <option selected>{{ $user->mc_city }}</option>
                </select>
{{--                <input type="text" name="mc_city" class="form-control" value="{{ $user->mc_city }}" required>--}}
            </div><!-- data-item -->


        </div>
        <div class="row">
            <div class="form-group col-6 col-md">
                <span class="data-label">Pastor's Name</span>
                <input type="text" name="mc_pastor_name" class="form-control" value="{{ $user->mc_pastor_name }}" required>
            </div><!-- data-item -->
            <div class="form-group col-6 col-md">
                <span class="data-label">Mentor's Name</span>
                <input type="text" name="mc_mentor_name" class="form-control" value="{{ $user->mc_mentor_name }}" required>
            </div><!-- data-item -->
            <div class="form-group col-6 col-md">
                <span class="data-label">Phone</span>
                <input type="text" name="mc_phone" class="form-control" value="{{ $user->mc_phone }}" required>
            </div><!-- data-item -->
            <div class="form-group col-6 col-md">
                <span class="data-label">Email</span>
                <input type="text" name="mc_email" class="form-control" value="{{ $user->mc_email }}" required>
            </div><!-- data-item -->
        </div>
        <div class="row">
            <div class="form-group col">
                <span class="data-label">Address</span>
                <input type="text" name="mc_address" class="form-control" value="{{ $user->mc_address }}" required>
            </div><!-- data-item -->
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <h5>TESTIMONY OF THE CHURCH PLANTER</h5>
                <div class="form-group col-12">
                    <span class="data-label">How was your life before accepting Christ? </span>
                    <input name="testimony_1" class="form-control" value="{{ $user->testimony_1 }}">
                </div><!-- data-item -->
                <div class="form-group col-12">
                    <span class="data-label">How did you meet Christ?</span>
                    <input type="text" name="testimony_2" class="form-control" value="{{ $user->testimony_2 }}" required>
                </div><!-- data-item -->
                <div class="form-group col-12">
                    <span class="data-label">How were you called to church planting?</span>
                    <input type="text" name="testimony_3" class="form-control" value="{{ $user->testimony_3 }}">
                </div><!-- data-item -->
            </div>
            <div class="col-6">
                <h5>Prayer Requests</h5>
                <div class="form-group col-12">
                    <span class="data-label">Request 1</span>
                    <input name="prayer_1" class="form-control" value="{{ $user->prayer_1 }}">
                </div><!-- data-item -->
                <div class="form-group col-12">
                    <span class="data-label">Request 2</span>
                    <input name="prayer_2" class="form-control" value="{{ $user->prayer_2 }}">
                </div><!-- data-item -->
                <div class="form-group col-12">
                    <span class="data-label">Request 3</span>
                    <input name="prayer_3" class="form-control" value="{{ $user->prayer_3 }}">
                </div><!-- data-item -->
            </div>
        </div>
        <button type="submit" class="btn btn-lg btn-primary my-3 right-pull">Save Changes</button>
    </form>
    @else
    <div class="nk-block">
        <div class="card">
            <div class="card-aside-wrap">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head nk-block-head-lg">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Personal Information</h4>
                            </div>
                            <div class="nk-block-head-content align-self-start d-lg-none">
                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    {{-- @if (session('add'))
                    <div class="alert alert-success" role="alert" style="background-color: #d4edda; border-color:#c3e6cb; color:#155724; margin-bottom: 0px;">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" style="text-decoration: none;">&times;</a>
                        {{session()->get('add')}}
                    </div>
                    @endif --}}
                    <div class="nk-block">
                        <div class="nk-data data-list">
                            <form method="post" action="{{ route('user.profile.update') }}">
                                @csrf

                                <div class="data-head">
                                    <h6 class="overline-title">Basics</h6>
                                </div>
                                <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                    <div class="data-col">
                                        <span class="data-label">SurName</span>
                                        <input name="name" class="form-control" value="{{ $user->name }}">
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                    </div>
                                </div><!-- data-item -->
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">Given Name</span>
                                        <input type="text" name="given_name" class="form-control" value="{{ $user->given_name }}">
                                    </div>
                                </div><!-- data-item -->
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">Marital Status</span>
                                        <input type="text" name="marital_status" class="form-control" value="{{ $user->marital_status }}">
                                    </div>
                                </div><!-- data-item -->
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">Gender</span>
                                        <input type="text" name="gender" class="form-control" value="{{ $user->gender }}">
                                    </div>
                                </div><!-- data-item -->
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">Date of Birth</span>
                                        <input type="date" name="dob" id="dob" class="form-control" value="{{ $user->dob }}">
                                    </div>
                                </div><!-- data-item -->
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">Phone</span>
                                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                                    </div>
                                </div><!-- data-item -->
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">City</span>
                                        <input type="text" name="city" class="form-control" value="{{ $user->city }}">
                                    </div>
                                </div><!-- data-item -->
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">State</span>
                                        <input type="text" name="state" class="form-control" value="{{ $user->state }}">
                                    </div>
                                </div><!-- data-item -->
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">Country</span>
                                        <input type="text" name="country" class="form-control" value="{{ $user->country }}">
                                    </div>
                                </div><!-- data-item -->
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">Email</span>
                                        <span class="data-value">{{ $user->email }}</span>
                                    </div>
                                </div><!-- data-item -->
                                <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                    <div class="data-col">
                                        <span class="data-label">Change Password</span>
                                        <input name="password" type="password" class="form-control" placeholder="New Password" >
                                    </div>
                                </div><!-- data-item -->

                                    <button type="submit" class="btn btn-lg btn-primary my-3 right-pull">Save Changes</button>
                            </form>
                        </div><!-- data-list -->
                    </div><!-- .nk-block -->
                </div>
                <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                    <div class="card-inner-group" data-simplebar>
                        <div class="card-inner">
                            <div class="user-card">
                                <div class="user-avatar bg-primary">
                                    <span>{{  strtoupper(substr($user->name, 0, 2)) }}</span>
                                </div>
                                <div class="user-info">
                                    <span class="lead-text">{{ $user->name }}</span>
                                    <span class="sub-text">{{ $user->email }}</span>
                                </div>
                                {{-- <div class="user-action">
                                    <div class="dropdown">
                                        <a class="btn btn-icon btn-trigger mr-n2" data-toggle="dropdown" href="#"><em class="icon ni ni-more-v"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="#"><em class="icon ni ni-camera-fill"></em><span>Change Photo</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-edit-fill"></em><span>Update Profile</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}
                            </div><!-- .user-card -->
                        </div><!-- .card-inner -->
                        <div class="card-inner">
                            <div class="user-account-info py-0">
                                <h6 class="overline-title-alt">Sign Up Date</h6>
                                <div class="user-balance">{{ date_format($user->created_at,"d M Y H:i:s") }}</div>
                            </div>
                        </div><!-- .card-inner -->
                        <div class="card-inner p-0">
                            <ul class="link-list-menu">
                                @role('super_admin')
                                    <li><a class="active" href="{{ route('user.detail', $user->id) }}"><em class="icon ni ni-user-fill-c"></em><span>Personal Information</span></a></li>
                                @else
                                    <li><a class="active" href="{{ route('user.profile') }}"><em class="icon ni ni-user-fill-c"></em><span>Personal Information</span></a></li>
{{--                                    <li><a href="{{ route('user.church') }}"><em class="icon ni ni-user-fill-c"></em><span>Church Information</span></a></li>--}}
{{--                                    <li><a href="{{ route('user.m_church') }}"><em class="icon ni ni-user-fill-c"></em><span>Mother Church Information</span></a></li>--}}
{{--                                    <li><a href="{{ route('user.testimony') }}"><em class="icon ni ni-user-fill-c"></em><span>TESTIMONY OF THE CHURCH PLANTER</span></a></li>--}}

                                    {{-- <li><a class="" href="{{ route('user.account',$user->id) }}"><em class="icon ni ni-coins"></em><span>Account</span></a></li> --}}
{{--                                     <li><a href="{{ route('user.affiliation') }}"><em class="icon ni ni-user-fill-c"></em><span>Affiliation</span></a></li>--}}
                                    {{-- <li><a href="{{ route('user.kyc') }}"><em class="icon ni ni-check-circle-fill"></em><span>KYC</span></a></li> --}}
                                @endrole
                                    {{-- <li><a href="html/user-profile-notification.html"><em class="icon ni ni-bell-fill"></em><span>Notifications</span></a></li>
                                    <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-round-fill"></em><span>Account Activity</span></a></li> --}}
                            </ul>
                        </div>
                        <!-- .card-inner -->

                    </div><!-- .card-inner-group -->
                </div><!-- card-aside -->
            </div><!-- .card-aside-wrap -->
        </div><!-- .card -->
    </div><!-- .nk-block -->
    @endrole

@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $("#country").change(function () {
                var country = $('#country').val();
                if (country === '') {
                    country = 'null'
                }
                var data = {
                    token: $('#token').val(),
                    country: country
                }
                $.ajax({
                    url: "{{route('user.states')}}",
                    type: "GET",
                    data: data,
                    success: function (response) {
                        console.log(response);
                        var states = JSON.parse(response);
                        var html = '<option selected>Select State</option>';
                        if (states.length > 0) {
                            for (let i = 0; i < states.length; i++) {
                                html += '<option value="' + states[i]['state_name'] + '"> \
                                      ' + states[i]['state_name'] + ' \
                          ';
                            }
                        }
                        $('#states').html(html);
                    }
                });
            });
            // Cities fetch
            $("#states").change(function () {
                var state = $('#states').val();
                if (state === '') {
                    state = 'null'
                }
                var data = {
                    token: $('#token').val(),
                    state: state
                }
                $.ajax({
                    url: "{{route('user.cities')}}",
                    type: "GET",
                    data: data,
                    success: function (response) {
                        console.log(response);
                        var city = JSON.parse(response)
                        var html = '<option selected>Select City</option>';
                        if (city.length > 0) {
                            for (let i = 0; i < city.length; i++) {
                                html += '<option value="' + city[i]['city_name'] + '"> \
                                      ' + city[i]['city_name'] + ' \
                          ';
                            }
                        }
                        $('#city').html(html);
                    }
                });
            });
        });

    //    For mc Section
        $(document).ready(function () {
            $("#mcCountry").change(function () {
                var country = $('#mcCountry').val();
                if (country === '') {
                    country = 'null'
                }
                var data = {
                    token: $('#token').val(),
                    country: country
                }
                $.ajax({
                    url: "{{route('user.states')}}",
                    type: "GET",
                    data: data,
                    success: function (response) {
                        console.log(response);
                        var mcStates = JSON.parse(response);
                        var html = '<option selected>Select mcStates</option>';
                        if (mcStates.length > 0) {
                            for (let i = 0; i < mcStates.length; i++) {
                                html += '<option value="' + mcStates[i]['state_name'] + '"> \
                                      ' + mcStates[i]['state_name'] + ' \
                          ';
                            }
                        }
                        $('#mcStates').html(html);
                    }
                });
            });
            // Cities fetch
            $("#mcStates").change(function () {
                var state = $('#mcStates').val();
                if (state === '') {
                    state = 'null'
                }
                var data = {
                    token: $('#token').val(),
                    state: state
                }
                $.ajax({
                    url: "{{route('user.cities')}}",
                    type: "GET",
                    data: data,
                    success: function (response) {
                        console.log(response);
                        var mcCity = JSON.parse(response)
                        var html = '<option selected>Select mcCity</option>';
                        if (mcCity.length > 0) {
                            for (let i = 0; i < mcCity.length; i++) {
                                html += '<option value="' + mcCity[i]['city_name'] + '"> \
                                      ' + mcCity[i]['city_name'] + ' \
                          ';
                            }
                        }
                        $('#mcCity').html(html);
                    }
                });
            });
        });

    </script>
    <script>
        // JavaScript code to calculate age on change of the date of birth field and on page load

        $(document).ready(function() {
            console.log('aaa')
            // Calculate age on page load
            calculateAge();

            // Attach change event listener to the date of birth field
            $('#dob').on('change', function() {
                console.log('vvvvv')
                calculateAge();
            });
        });

        // Function to calculate age based on the date of birth field
        function calculateAge() {
            console.log('rrrrr')
            var dob = $('#dob').val();
            if (dob) {
                var today = new Date();
                var birthDate = new Date(dob);
                var age = today.getFullYear() - birthDate.getFullYear();
                var monthDiff = today.getMonth() - birthDate.getMonth();
                if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                $('#age').val(age);
            }
        }

    </script>
@endsection
