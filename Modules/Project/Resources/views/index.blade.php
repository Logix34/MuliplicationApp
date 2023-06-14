@extends('project::layouts.master')


@section('content')
    <div class="nk-content " style="width: 100%;">
        <div class="">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview">

                        <div class="nk-block">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">All Projects
                                        @can('add_project')
                                            <a href="{{route('projects.denomination')}}" class="btn btn-outline-success float-right ml-2"><em class="icon ni ni-plus"></em><span>Add Denomination </span></a>
                                        @endcan
                                        @can('add_project')
                                            <a href="{{route('project.create')}}" class="btn btn-outline-success float-right "><em class="icon ni ni-plus"></em><span>Add Project </span></a>
                                        @endcan
                                    </h4>
                                    <div class="nk-block-des">
                                        <!-- <p>Using the most basic table markup, here’s how <code class="code-class">.table</code> based tables look by default.</p> -->
                                    </div>
                                </div>
                            </div>

                            <div class="card card-preview">

                                <div class="card-inner">
                                    <table style="width: 100%;" class="table datatable-init-export table-responsive" data-export-title="Export" data-auto-responsive="false">
                                        <thead>
                                        <tr >
                                            <th class="nk-tb-col"><span class="sub-text">Project ID</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Invite Link</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Denomination</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">District/Zone</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Country</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">State</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">City</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Start Date</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Program</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Coordinator</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Number of planters</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Action</span></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($projects as $row)
                                            <tr>
                                                <td class="nk-tb-col">
                                                    <span>{{ $row->project_id }}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>
                                                        <button class="btn btn-sm btn-success copy-button" data-url="{{ route('register',['project_id' => $row->id] )}}">Copy URL</button>
                                                    </span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>{{ $row->denomination }}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>{{ $row->district }}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>{{ $row->country }}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>{{ $row->state }}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>{{ $row->city }}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>{{ $row->start_date }}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>{{ $row->program->name }}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>{{ $row->coordinator->name }}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$row->id}}">
                                                        {{ count($row->planters) }}
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal{{$row->id}}" tabindex="-1" >
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">{{$row->project_id}}</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered">
                                                                        <tr>
                                                                            <th>Name</th>
                                                                            <th>Email</th>
                                                                            <th>Nationality</th>
                                                                            <th>Church Name</th>
                                                                            <th>Church Country</th>
                                                                            <th>Church State</th>
                                                                            <th>Mentor Name</th>
                                                                        </tr>
                                                                        @foreach($row->planters as $planter)
                                                                            <tr>
                                                                                <td>
                                                                                    <a target="_blank" href="{{route('user.view', $planter->id)}}">{{$planter->name}}</a>
                                                                                </td>
                                                                                <td>
                                                                                     {{$planter->email}}
                                                                                </td>
                                                                                <td>
                                                                                     {{$planter->country}}
                                                                                </td>
                                                                                <td>
                                                                                     {{$planter->area_name}}
                                                                                </td>
                                                                                <td>
                                                                                     {{$planter->area_country}}
                                                                                </td>
                                                                                <td>
                                                                                     {{$planter->area_state}}
                                                                                </td>
                                                                                <td>
                                                                                     {{$planter->mc_name}}
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1">
                                                        <!-- Button trigger modal -->
                                                        <a class="btn btn-trigger btn-icon" data-bs-toggle="modal" data-bs-target="#addPlanterModel{{$row->id}}"  data-toggle="tooltip" data-placement="top" title="Add planter">
                                                            <em class="icon ni ni-user-add-fill text-success"></em>
                                                        </a>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="addPlanterModel{{$row->id}}" tabindex="-1" >
                                                            <div class="modal-dialog modal-xl">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Add Planter</h5>
                                                                    </div>
                                                                    <form method="post" action="{{ route('planter.add') }}" >
                                                                        @csrf
                                                                        <div class="modal-body">

                                                                                <input type="hidden" name="project_id" value="{{$row->id}}">
                                                                                <div class="form-group">
                                                                                    <label class="form-label">Choose Planter</label>
                                                                                    <div class="form-control-wrap">
                                                                                        @php
                                                                                            $users = \App\Models\User::whereHas('roles', function($query) {
                                                                                                        $query->where('name', 'Church Planter');
                                                                                                    })
                                                                                                    ->whereDoesntHave('project')
                                                                                                    ->get();
                                                                                        @endphp
                                                                                        <select name="user_id" class="form-select" data-placeholder="Choose Planter" required>
                                                                                            <option disabled selected></option>
                                                                                            @foreach ($users as $user)
                                                                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Add Planter</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <a class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('project.edit',$row->id) }}"><em class="icon ni ni-edit-fill text-success"></em></a>
                                                        <a class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Delete" href="{{ route('project.delete',$row->id) }}"><em class="icon ni ni-trash-fill text-danger"></em></a>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- .card-preview -->
                        </div> <!-- nk-block -->

                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
       $(document).ready(function() {
            // Add click event listener to button
            $('.copy-button').click(function() {
                // Get URL to copy from the data-url attribute
                var url = $(this).data('url');

                // Create a temporary input element
                var input = $('<input>').val(url).appendTo('body').select();

                // Copy the URL to the clipboard
                document.execCommand('copy');

                // Remove the temporary input element
                input.remove();

                // Display a message to the user
                $.fn.successToast('URL copied successfully');
            });
        });

    </script>
@endsection
