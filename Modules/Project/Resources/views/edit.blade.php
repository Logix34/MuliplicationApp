@extends('rolepermission::layouts.master')

@section('content')
<div class="">
    <div class="nk-block-head nk-block-head-lg wide-sm">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title fw-normal">Create Project</h3>
        </div>
    </div><!-- .nk-block -->
    <div class="nk-block nk-block-lg">
        <div class="row g-gs">
            <div class="col-lg-12">
                <div class="card h-100">
                    <div class="card-inner">
                        <div class="card-head">
                            <h5 class="card-title">Project Info</h5>
                        </div>
                        <form method="post" action="{{ route('project.update', $project->id) }}" >
                            @csrf
                            <input type="hidden" id="token" name="token"  value="{{ $token }}">
                            <div class="row">
                                <div class="form-group col-3">
                                    <label class="form-label" for="denomination">Denomination</label>
                                    <select  class="form-control" id="denomination" name="denomination" required>
                                        <option>Select Denomination</option>
                                        @foreach($denominations as $denomination)
                                            <option value="{{$denomination->name}}">{{$denomination->name}}</option>
                                        @endforeach
                                    </select>
{{--                                    <div class="form-control-wrap">--}}
{{--                                        <input type="text" class="form-control" id="denomination" name="denomination" value="{{$project->denomination}}" required>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="form-group col-3">
                                    <label class="form-label" for="district">District/Zone</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="district" name="district" value="{{$project->district}}" required>
                                    </div>
                                </div>
                                <div class="form-group col-3">
                                    <label class="form-label" for="country">Country</label>
                                    <select  class="form-control" id="country" name="country" required>
                                        <option selected>Select Country</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                                        @endforeach
                                    </select>
{{--                                    <div class="form-control-wrap">--}}
{{--                                        <input type="text" class="form-control" id="country" name="country" value="{{$project->country}}" required>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="form-group col-3">
                                    <label class="form-label" for="state">State</label>
                                    <select  class="form-control" id="states" name="state" required>
                                        <option selected>{{$project->state}}</option>
                                    </select>
{{--                                    <div class="form-control-wrap">--}}
{{--                                        <input type="text" class="form-control" id="state" name="state" value="{{$project->state}}" required>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="form-group col-3">
                                    <label class="form-label" for="city">City</label>
                                    <select  class="form-control" id="city" name="city" required>
                                        <option selected>{{$project->city}}</option>
                                    </select>
{{--                                    <div class="form-control-wrap">--}}
{{--                                        <input type="text" class="form-control" id="city" name="city" value="{{$project->city}}" required>--}}
{{--                                    </div>--}}
                                </div>
                                <div class="form-group col-3">
                                    <label class="form-label" for="start_date">Start Date</label>
                                    <div class="form-control-wrap">
                                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{$project->start_date}}" required>
                                    </div>
                                </div>
                                <div class="form-group col-3">
                                    <label class="form-label" for="coordinator_id">Coordinator</label>
                                    <div class="form-control-wrap">
                                        <select  class="form-control" id="coordinator_id" name="coordinator_id" required>
                                            <option selected>Select Coordinator</option>
                                            @foreach ($coordinators as $item)
                                                <option value="{{$item->id}}" @if($project->coordinator_id == $item->id) selected @endif>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-3">
                                    <label class="form-label" for="program_id">Program</label>
                                    <div class="form-control-wrap">
                                        <select  class="form-control" id="program_id" name="program_id" required>
                                            <option selected>Select Coordinator</option>
                                            @foreach ($programs as $item)
                                                <option value="{{$item->id}}" @if($project->program_id == $item->id) selected @endif>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-3">
                                    <label class="form-label" for="user_id">Select Denomination Leader</label>
                                    <div class="form-control-wrap">
                                        <select  class="form-control" id="user_id" name="user_id" required>
                                            <option selected>Select Denom Leader</option>
                                            @foreach ($denomLeader as $denom)
                                                <option value="{{$denom->id}}">{{$denom->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-control-wrap my-2">
                                <button type="submit" class="btn btn-lg btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- .components-preview -->

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
                    url: "{{route('project.states')}}",
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
                    url: "{{route('project.cities')}}",
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
    </script>
@endsection
