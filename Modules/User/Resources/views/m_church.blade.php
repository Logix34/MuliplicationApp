@extends('user::layouts.master')

@section('content')
    <div class="nk-block">
        <div class="card">
            <div class="card-aside-wrap">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head nk-block-head-lg">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">INFORMATION OF THE MOTHER CHURCH</h4>
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
                                <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                    <div class="data-col">
                                        <span class="data-label">Name</span>
                                        <input name="mc_name" class="form-control" value="{{ $user->mc_name }}">
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                    </div>
                                </div><!-- data-item -->
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">Pastor's Name</span>
                                        <input type="text" name="mc_pastor_name" class="form-control" value="{{ $user->mc_pastor_name }}">
                                    </div>
                                </div><!-- data-item -->
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">Mentor's Name</span>
                                        <input type="text" name="mc_mentor_name" class="form-control" value="{{ $user->mc_mentor_name }}">
                                    </div>
                                </div><!-- data-item -->
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">Phone</span>
                                        <input type="text" name="mc_phone" class="form-control" value="{{ $user->mc_phone }}">
                                    </div>
                                </div><!-- data-item -->
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">Email</span>
                                        <input type="text" name="mc_email" class="form-control" value="{{ $user->mc_email }}">
                                    </div>
                                </div><!-- data-item -->
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">Address</span>
                                        <input type="text" name="mc_address" class="form-control" value="{{ $user->mc_address }}">
                                    </div>
                                </div><!-- data-item -->
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">Neighborhood</span>
                                        <input type="text" name="mc_neighbourhood" class="form-control" value="{{ $user->mc_neighbourhood }}">
                                    </div>
                                </div><!-- data-item -->
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">City</span>
                                        <input type="text" name="mc_city" class="form-control" value="{{ $user->mc_city }}">
                                    </div>
                                </div><!-- data-item -->
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">State</span>
                                        <input type="text" name="mc_state" class="form-control" value="{{ $user->mc_state }}">
                                    </div>
                                </div><!-- data-item -->
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">Country</span>
                                        <input type="text" name="mc_country" class="form-control" value="{{ $user->mc_country }}">
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
                                    <li><a href="{{ route('user.profile') }}"><em class="icon ni ni-user-fill-c"></em><span>Personal Information</span></a></li>
                                    <li><a href="{{ route('user.church') }}"><em class="icon ni ni-user-fill-c"></em><span>Church Information</span></a></li>
                                    <li><a class="active" href="{{ route('user.m_church') }}"><em class="icon ni ni-user-fill-c"></em><span>Mother Church Information</span></a></li>
                                    <li><a href="{{ route('user.testimony') }}"><em class="icon ni ni-user-fill-c"></em><span>TESTIMONY OF THE CHURCH PLANTER</span></a></li>
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
@endsection
