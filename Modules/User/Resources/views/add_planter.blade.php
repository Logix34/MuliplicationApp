@extends('user::layouts.master')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-between mb-2">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Add Planter</h3>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                {{-- Categories/Add Category --}}
                            </div>
                        </div>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
                <div class="card">
                    <div class="card-inner">

                        <form method="POST" action="{{ route('user.store') }}" id="form" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="name">Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="name">Email</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="name">Password</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="password" name="password" required>
                                </div>
                            </div>
                            @php
                                $role = \Spatie\Permission\Models\Role::where('name', 'Church Planter')->first();
                            @endphp
                            <input type="hidden" name="role" value="{{$role->id}}">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>

                        </form>
                    </div>
                </div><!-- card -->

            </div>
        </div>

        @endsection
