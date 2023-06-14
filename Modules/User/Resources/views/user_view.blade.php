@extends('user::layouts.master')

@section('content')
    @if($user->hasRole('Church Planter'))
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
                    <input type="file" name="image">
                </div>
                <div class="col-6 col-md-5">
                    <div class="form-group">
                        <span class="data-label">SurName</span>
                        <input name="name" class="form-control" value="{{ $user->name }}">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                    </div>
                    <div class="form-group">
                        <span class="data-label">Given Name</span>
                        <input type="text" name="given_name" class="form-control" value="{{ $user->given_name }}">
                    </div>
                    <div class="form-group">
                        <span class="data-label">Marital Status</span>
                        <input type="text" name="marital_status" class="form-control" value="{{ $user->marital_status }}">
                    </div><!-- data-item -->
                    <div class="form-group">
                        <span class="data-label">Gender</span>
                        <input type="text" name="gender" class="form-control" value="{{ $user->gender }}">
                    </div><!-- data-item -->
                    <div class="form-group">
                        <span class="data-label">Date of Birth</span>
                        <input type="date" name="dob" id="dob" class="form-control" value="{{ $user->dob }}">
                    </div><!-- data-item -->
                    <div class="form-group">
                        <span class="data-label"># of Children</span>
                        <input type="number" name="children" class="form-control" value="{{ $user->children }}">
                    </div><!-- data-item -->
                </div>
                <div class="col-6 col-md-5">
                    <div class="form-group">
                        <span class="data-label">Phone</span>
                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                    </div><!-- data-item -->
                    <div class="form-group">
                        <span class="data-label">City</span>
                        <input type="text" name="city" class="form-control" value="{{ $user->city }}">
                    </div><!-- data-item -->
                    <div class="form-group">
                        <span class="data-label">State</span>
                        <input type="text" name="state" class="form-control" value="{{ $user->state }}">
                    </div><!-- data-item -->
                    <div class="form-group">
                        <span class="data-label">Country</span>
                        <input type="text" name="country" class="form-control" value="{{ $user->country }}">
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
            <h5>Information where new church will be planted</h5>
            <div class="row">
                <div class="form-group col-6 col-md">
                    <span class="data-label">Name</span>
                    <input name="area_name" class="form-control" value="{{ $user->area_name }}">
                </div><!-- data-item -->
                <div class="form-group col-6 col-md">
                    <span class="data-label">Denomination</span>
                    <input type="text" class="form-control" value="{{ $user->project->denomination ?? '' }}" readonly>
                </div><!-- data-item -->
                <div class="form-group col-6 col-md">
                    <span class="data-label">Country</span>
                    <input type="text" class="form-control" value="{{ $user->project->country ?? '' }}" readonly>
                </div><!-- data-item -->
                <div class="form-group col-6 col-md">
                    <span class="data-label">State</span>
                    <input type="text" class="form-control" value="{{ $user->project->state ?? '' }}" readonly>
                </div><!-- data-item -->
                <div class="form-group col-6 col-md">
                    <span class="data-label">City</span>
                    <input type="text" name="area_city" class="form-control" value="{{ $user->project->city ?? '' }}">
                </div><!-- data-item -->
            </div>
            <hr>
            <h5>INFORMATION OF THE MOTHER CHURCH</h5>
            <div class="row">
                <div class="form-group col-6 col-md">
                    <span class="data-label">Name</span>
                    <input name="mc_name" class="form-control" value="{{ $user->mc_name }}">
                </div><!-- data-item -->
                <div class="form-group col-6 col-md">
                    <span class="data-label">Neighborhood</span>
                    <input type="text" name="mc_neighbourhood" class="form-control" value="{{ $user->mc_neighbourhood }}">
                </div><!-- data-item -->
                <div class="form-group col-6 col-md">
                    <span class="data-label">City</span>
                    <input type="text" name="mc_city" class="form-control" value="{{ $user->mc_city }}">
                </div><!-- data-item -->
                <div class="form-group col-6 col-md">
                    <span class="data-label">State</span>
                    <input type="text" name="mc_state" class="form-control" value="{{ $user->mc_state }}">
                </div><!-- data-item -->
                <div class="form-group col-6 col-md">
                    <span class="data-label">Country</span>
                    <input type="text" name="mc_country" class="form-control" value="{{ $user->mc_country }}">
                </div><!-- data-item -->
            </div>
            <div class="row">
                <div class="form-group col-6 col-md">
                    <span class="data-label">Pastor's Name</span>
                    <input type="text" name="mc_pastor_name" class="form-control" value="{{ $user->mc_pastor_name }}">
                </div><!-- data-item -->
                <div class="form-group col-6 col-md">
                    <span class="data-label">Mentor's Name</span>
                    <input type="text" name="mc_mentor_name" class="form-control" value="{{ $user->mc_mentor_name }}">
                </div><!-- data-item -->
                <div class="form-group col-6 col-md">
                    <span class="data-label">Phone</span>
                    <input type="text" name="mc_phone" class="form-control" value="{{ $user->mc_phone }}">
                </div><!-- data-item -->
                <div class="form-group col-6 col-md">
                    <span class="data-label">Email</span>
                    <input type="text" name="mc_email" class="form-control" value="{{ $user->mc_email }}">
                </div><!-- data-item -->
            </div>
            <div class="row">
                <div class="form-group col">
                    <span class="data-label">Address</span>
                    <input type="text" name="mc_address" class="form-control" value="{{ $user->mc_address }}">
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
                        <input type="text" name="testimony_2" class="form-control" value="{{ $user->testimony_2 }}">
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
    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block">
                        <div class="card">
                            <div class="card-aside-wrap">
                                <div class="card-inner card-inner-lg">
                                    <div class="nk-block-head nk-block-head-lg">
                                        <div class="nk-block-between">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Personal Information</h4>
                                                <div class="nk-block-des">
                                                    <p>Basic info, like your name and address.</p>
                                                </div>
                                            </div>
                                            <div class="nk-block-head-content align-self-start d-lg-none">
                                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <div class="nk-data data-list">
                                            <div class="data-head">
                                                <h6 class="overline-title">Basics</h6>
                                            </div>
                                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                                <div class="data-col">
                                                    <span class="data-label">Given Name</span>
                                                    <span class="data-value">{{$user->given_name}}</span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                            </div><!-- data-item -->
                                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                                <div class="data-col">
                                                    <span class="data-label">Marital Status</span>
                                                    <span class="data-value">{{$user->marital_status}}</span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                            </div><!-- data-item -->
                                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                                <div class="data-col">
                                                    <span class="data-label">Gender</span>
                                                    <span class="data-value">{{$user->gender}}</span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                            </div><!-- data-item -->
                                            <div class="data-item">
                                                <div class="data-col">
                                                    <span class="data-label">Email</span>
                                                    <span class="data-value">{{$user->email}}</span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                                            </div><!-- data-item -->
                                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                                <div class="data-col">
                                                    <span class="data-label">Phone Number</span>
                                                    <span class="data-value text-soft">{{$user->phone}}</span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                            </div><!-- data-item -->
                                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                                <div class="data-col">
                                                    <span class="data-label">Date of Birth</span>
                                                    <span class="data-value">{{$user->dob}}</span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                            </div><!-- data-item -->
                                            <div class="data-item" data-toggle="modal" data-target="#profile-edit" data-tab-target="#address">
                                                <div class="data-col">
                                                    <span class="data-label">Address</span>
                                                    <span class="data-value">{{$user->city}},<br>{{$user->state}}, {{$user->country}}</span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                            </div><!-- data-item -->
                                        </div><!-- data-list -->
                                        <div class="nk-data data-list">
                                            <div class="data-head">
                                                <h6 class="overline-title">Preferences</h6>
                                            </div>
                                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                                <div class="data-col">
                                                    <span class="data-label">Role</span>
                                                    <span class="data-value">{{ $user->getRoleNames()[0] }}</span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                            </div><!-- data-item -->
                                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                                <div class="data-col">
                                                    <span class="data-label">Parent</span>
                                                    <span class="data-value">
                                                        @php
                                                            $parentUser = \App\Models\User::find($user->parent_id);
                                                        @endphp
                                                        {{ $parentUser->name ?? ''  }}
                                                    </span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                            </div><!-- data-item -->
                                        </div><!-- data-list -->
                                    </div><!-- .nk-block -->
                                </div>
                                <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                    <div class="card-inner-group" data-simplebar>
                                        <div class="card-inner">
                                            <div class="user-card">
                                                <div class="user-avatar bg-primary">
                                                    <img src="{{$user->getFirstMediaUrl('image')}}" alt="">
                                                </div>
                                                <div class="user-info">
                                                    <span class="lead-text">{{$user->name}}</span>
                                                    <span class="sub-text">{{$user->email}}</span>
                                                </div>

                                            </div><!-- .user-card -->
                                        </div><!-- .card-inner -->
                                        <div class="card-inner">
                                            <div class="user-account-info py-0">
                                                <h6 class="overline-title-alt">Signup Date</h6>
                                                <div class="user-balance">{{ date_format($user->created_at,"d M Y H:i:s") }}</div>
                                            </div>
                                        </div><!-- .card-inner -->
                                        <div class="card-inner p-0">
                                            <ul class="link-list-menu">
                                                <li><a class="active" href="{{route('user.view', $user->id)}}"><em class="icon ni ni-user-fill-c"></em><span>Personal Information</span></a></li>
{{--                                                <li><a href="html/user-profile-notification.html"><em class="icon ni ni-bell-fill"></em><span>Notifications</span></a></li>--}}
{{--                                                <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-round-fill"></em><span>Account Activity</span></a></li>--}}
{{--                                                <li><a href="html/user-profile-setting.html"><em class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a></li>--}}
                                            </ul>
                                        </div><!-- .card-inner -->
                                    </div><!-- .card-inner-group -->
                                </div><!-- card-aside -->
                            </div><!-- .card-aside-wrap -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->
    <!-- @@ Profile Edit Modal @e -->
    <div class="modal fade" role="dialog" id="profile-edit">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <h5 class="title">Update Profile</h5>
                    <ul class="nk-nav nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#personal">Personal</a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" data-toggle="tab" href="#address">Preferences</a>--}}
{{--                        </li>--}}
                    </ul><!-- .nav-tabs -->
                    <form action="{{route('user.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="tab-content">
                            <div class="tab-pane active" id="personal">
                                <div class="row gy-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name">Sur Name</label>
                                            <input type="text" class="form-control form-control-lg" id="full-name" name="name" value="{{$user->name}}" placeholder="Enter Sur Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="given_name">Given Name</label>
                                            <input type="text" class="form-control form-control-lg" id="given_name" name="given_name" value="{{$user->given_name}}" placeholder="Given Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="marital_status">Marital Status</label>
                                            <input type="text" class="form-control form-control-lg" id="marital_status" name="marital_status" value="{{$user->marital_status}}" placeholder="Marital Status">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="gender">Gender</label>
                                            <select class="form-select" id="gender" data-ui="lg">
                                                <option selected disabled value=" "> Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="dob">Date of Birth</label>
                                            <input type="date" class="form-control form-control-lg" name="dob" value="{{$user->dob}}" placeholder="Date of Birth">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="phone">Phone</label>
                                            <input type="number" class="form-control form-control-lg" id="phone" name="phone" value="{{$user->phone}}" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="city">City</label>
                                            <input type="text" class="form-control form-control-lg" id="city" name="city" value="{{$user->city}}" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="state">State</label>
                                            <input type="text" class="form-control form-control-lg" id="state" name="state" value="{{$user->state}}" placeholder="State">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="country">Country</label>
                                            <input type="text" class="form-control form-control-lg" id="country" name="country" value="{{$user->country}}" placeholder="Country">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="password">Change Password</label>
                                            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="image">Change Profile Picture</label>
                                            <input type="file" class="form-control form-control-lg" id="image" name="image">
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .tab-pane -->
{{--                            <div class="tab-pane" id="address">--}}
{{--                                <div class="row gy-4">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="form-label" for="address-l1">Address Line 1</label>--}}
{{--                                            <input type="text" class="form-control form-control-lg" id="address-l1" value="2337 Kildeer Drive">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="form-label" for="address-l2">Address Line 2</label>--}}
{{--                                            <input type="text" class="form-control form-control-lg" id="address-l2" value="">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="form-label" for="address-st">State</label>--}}
{{--                                            <input type="text" class="form-control form-control-lg" id="address-st" value="Kentucky">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label class="form-label" for="address-county">Country</label>--}}
{{--                                            <select class="form-select" id="address-county" data-ui="lg">--}}
{{--                                                <option>Canada</option>--}}
{{--                                                <option>United State</option>--}}
{{--                                                <option>United Kindom</option>--}}
{{--                                                <option>Australia</option>--}}
{{--                                                <option>India</option>--}}
{{--                                                <option>Bangladesh</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div><!-- .tab-pane -->--}}
                            <div class="col-12">
                                <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                    <li>
                                        <button type="submit" class="btn btn-lg btn-primary">Update Profile</button>
                                    </li>
                                    <li>
                                        <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .tab-content -->
                    </form>
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->
    @endif
@endsection
@section('script')
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