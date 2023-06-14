@extends('dashboard::layouts.master')

@section('content')
    @php
        $user = \Illuminate\Support\Facades\Auth::user();
    @endphp
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title page-title">Welcome {{$user->name}}</h4>
                @php
                    $excludeColumns = ['email_verified_at', 'status', 'parent_id', 'age', 'cp_signature', 'mentor_signature', 'project_id', 'created_at', 'updated_at', 'media', 'project', 'roles', 'area_address', 'area_country', 'area_state', 'area_city'];

                    $fillableColumns = array_diff(array_keys($user->toArray()), $excludeColumns);

                        $attributes = \Illuminate\Support\Arr::only($user->toArray(), $fillableColumns);

                        $filledColumns = count(array_filter($attributes));

                        if ($filledColumns == count($fillableColumns)) {
                           $status = true;
                        } else {
                            $status = false;
                        }
                @endphp
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 col-lg-6 col-xl-3">
                <div class="card bg-gray-dim">
                    <div class="card-body">
                        <h5 class="text-red mb-0">{{$totalPlanters}} <span class="float-right"><i class="fas fa-user-circle"></i></span></h5>
                        <div class="progress my-3" style="height:3px;">
                            <div class="progress-bar" style="width:{{$totalPlanters}}%"></div>
                        </div>
                        <p class="mb-0 text-red small-font">Total Planers</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3">
                <div class="card bg-orange-dim">
                    <div class="card-body">
                        <h5 class="text-red mb-0">{{$totalProjects}} <span class="float-right"><i class="far fa-chart-bar"></i></span></h5>
                        <div class="progress my-3" style="height:3px;">
                            <div class="progress-bar" style="width:{{$totalProjects}}%"></div>
                        </div>
                        <p class="mb-0 text-red small-font">Total Projects</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3">
                <div class="card bg-success-dim">
                    <div class="card-body">
                        <h5 class="text-red mb-0">6200 <span class="float-right"><i class="fas fa-graduation-cap"></i></span></h5>
                        <div class="progress my-3" style="height:3px;">
                            <div class="progress-bar" style="width:55%"></div>
                        </div>
                        <p class="mb-0 text-red small-font">Graduated</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3">
                <div class="card bg-danger-dim">
                    <div class="card-body">
                        <h5 class="text-red mb-0">{{$inactivePlanters}} <span class="float-right"><i class="fas fa-low-vision"></i></span></h5>
                        <div class="progress my-3" style="height:3px;">
                            <div class="progress-bar" style="width:{{$inactivePlanters}}%"></div>
                        </div>
                        <p class="mb-0 text-red small-font">Inactive</p>
                    </div>
                </div>
            </div>
        </div>

    </div>


{{--                @if(!$status)--}}
{{--                    <div class="alert alert-warning" role="alert">--}}
{{--                        Profile is not completed, Please complete your profile.--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--                @if(count($user->reports) > 0)--}}
{{--                    <div class="alert alert-warning" role="alert">--}}
{{--                        No report submitted. Please submit ABC report.--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </div><!-- .nk-block-head-content -->--}}
{{--        </div><!-- .nk-block-between -->--}}
{{--    </div><!-- .nk-block-head -->--}}

@endsection
