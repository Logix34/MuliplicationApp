@extends('user::layouts.master')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-between mb-2">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Add User</h3>
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
                                <label class="form-label" for="name">User Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="name">User Email</label>
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
                            @if(\Illuminate\Support\Facades\Auth::user()->getRoleNames()[0] == 'Denominational Leader')
                                <div class="form-group">
                                    <label class="form-label">Role</label>
                                    <div class="form-control-wrap">
                                        @php
                                            $roles = \Spatie\Permission\Models\Role::whereIn('name', ['Regional Leader', 'Assistant'])->get();
                                        @endphp
                                        <select name="role" class="form-select" data-placeholder="Select Role" required>
                                            <option disabled selected></option>
                                            @foreach ($roles as $item)
                                                <option value="{{$item->name}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="parent_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                                    </div>
                                </div>
                            @elseif(\Illuminate\Support\Facades\Auth::user()->getRoleNames()[0] == 'Regional Leader')
                                @php
                                    $roles = \Spatie\Permission\Models\Role::where('name', 'Assistant')->get();
                                @endphp
                                <div class="form-group">
                                    <label class="form-label">Role</label>
                                    <div class="form-control-wrap">
                                        <select name="role" class="form-select" data-placeholder="Select Role" required>
                                            <option disabled selected></option>
                                            @foreach ($roles as $item)
                                                <option value="{{$item->name}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="parent_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                                    </div>
                                </div>
                            @elseif(\Illuminate\Support\Facades\Auth::user()->getRoleNames()[0] == 'Assistant')
                                @php
                                    $roles = \Spatie\Permission\Models\Role::where('name', 'Church Planter')->get();
                                @endphp
                                <div class="form-group">
                                    <label class="form-label">Role</label>
                                    <div class="form-control-wrap">
                                        <select name="role" class="form-select" data-placeholder="Select Role" required>
                                            <option disabled selected></option>
                                            @foreach ($roles as $item)
                                                <option value="{{$item->name}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="parent_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                                    </div>
                                </div>
                            @else
                                <div class="form-group">
                                    <label class="form-label">Role</label>
                                    <div class="form-control-wrap">
                                        <select name="role" class="form-select" data-placeholder="Select Role" id="role" required>
                                            <option disabled selected></option>
                                            @foreach ($roles as $item)
                                                <option value="{{$item->name}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hideThis d-none" id="regional-parent">
                                    <label class="form-label">Denominational Leader</label>
                                    <div class="form-control-wrap">
                                        <select name="parent_id" class="form-select regional-parent_id" data-placeholder="Select Denominational Leader">
                                            <option disabled selected></option>
                                            @foreach ($denom as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group hideThis d-none" id="member-parent">
                                    <label class="form-label">Regional Leader</label>
                                    <div class="form-control-wrap">
                                        <select name="parent_id" class="form-select member-parent_id" data-placeholder="Select Regional Leader">
                                            <option disabled selected></option>
                                            @foreach ($regional as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary float-right">Submit</button>

                        </form>
                    </div>
                </div><!-- card -->

            </div>
        </div>

        @endsection
        @section('script')
            <script>

                $("#form").on("submit",function() {
                    var myEditor = document.querySelector('#editor')
                    var html = myEditor.children[0].innerHTML
                    $("#description").val(html);
                })

                    $("#role").change(function(){
                        $(".hideThis").addClass("d-none");

                        if($(this).val() != "Denominational Leader" && $(this).val() == "Regional Leader"){
                            $("#regional-parent").removeClass("d-none");
                            $(".regional-parent_id").prop("required", true);
                        }
                        else if($(this).val() != "Denominational Leaders" && $(this).val() == "Assistant"){
                            $("#member-parent").removeClass("d-none");
                            $(".member-parent_id").prop("required", true);
                        }
                    });
            </script>
@endsection
