@extends('user::layouts.master')

@section('content')
    <!-- content @s -->
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">User Lists</h3>
                                <div class="nk-block-des text-soft">
                                    <p>You have total {{count($users)}} users.</p>
                                </div>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="more-options"><em class="icon ni ni-more-v"></em></a>
                                    <div class="toggle-expand-content" data-content="more-options">
                                        <ul class="nk-block-tools g-3">

                                            <li class="nk-block-tools-opt">
                                                <a href="#" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                                <a href="{{route('user.create')}}" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="nk-tb-list is-separate mb-3">
                            <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col"><span class="sub-text">User</span></div>
                                <div class="nk-tb-col tb-col-mb"><span class="sub-text">Sign up Date</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Role</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Parent</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Actions</span></div>
                            </div><!-- .nk-tb-item -->
                            @foreach($users as $user)
                                <div class="nk-tb-item">
                                    <div class="nk-tb-col">
                                        <div class="user-card">
                                            <div class="user-avatar">
                                                <img src="{{$user->getFirstMediaUrl('image')}}" alt="">
                                            </div>
                                            <div class="user-info">
                                                <span class="tb-lead">{{$user->name}} <span class="dot dot-warning d-md-none ml-1"></span></span>
                                                <span>{{$user->email}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-tb-col tb-col-mb">
                                        <span>{{ date_format($user->created_at,"d M Y H:i:s") }}</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-mb">
                                        <span>{{ $user->getRoleNames()[0] }}</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-mb">
                                        @php
                                            $parentUser = \App\Models\User::find($user->parent_id);
                                        @endphp
                                        <span>{{ $parentUser->name ?? ''  }}</span>
                                    </div>
                                    <div class="nk-tb-col nk-tb-col-tools">
                                        <a href="{{route('user.view', $user->id)}}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="View"><em class="icon ni ni-eye text-success"></em></a>

{{--                                        <a href="{{route('user.detail', $user->id)}}" class="btn btn-sm btn-warning "><em class="icon ni ni-edit"></em><span>Edit</span></a>--}}

                                        <a href="{{route('user.delete', $user->id)}}"  class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Delete"><em class="icon ni ni-trash-fill text-danger"></em></a>

                                    </div>
                                </div><!-- .nk-tb-item -->
                            @endforeach
                        </div><!-- .nk-tb-list -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->



@endsection
