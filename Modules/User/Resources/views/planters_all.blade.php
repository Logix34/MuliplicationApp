@extends('user::layouts.master')


@section('content')
    <div class="nk-content " style="width: 100%;">
        <div class="">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview">

                        <div class="nk-block">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">All Planters
                                        @can('add_planter')
                                            <a href="{{route('planter.create')}}" class="btn btn-outline-success float-right"><em class="icon ni ni-plus"></em><span>Add Planter</span></a>
                                        @endcan
                                    </h4>
                                    <div class="nk-block-des">
                                        <!-- <p>Using the most basic table markup, here’s how <code class="code-class">.table</code> based tables look by default.</p> -->
                                    </div>
                                </div>
                            </div>

                            <div class="card card-preview">

                                <div class="card-inner">
                                    <table style="width: 100%;" class="datatable-init-export nk-tb-list nk-tb-ulist" data-export-title="Export" data-auto-responsive="false">
                                        <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col"><span class="sub-text">Image</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Email</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Coordinator</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Sign up Date</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Parent</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Status</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Report</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col">
                                                    <div class="user-avatar">
                                                        <img src="{{$user->getFirstMediaUrl('image')}}" alt="">
                                                    </div>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>{{$user->name}}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>{{$user->email}}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    @if($user->project)
                                                        <span>{{ $user->project->coordinator->name }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span>{{ date_format($user->created_at,"d M Y H:i:s") }}</span>
                                                </td>
                                                <td>
                                                    @php
                                                        $parentUser = \App\Models\User::find($user->parent_id);
                                                    @endphp
                                                    <span>{{ $parentUser->name ?? ''  }}</span>
                                                </td>
                                                <td>
                                                    @php
                                                        $excludeColumns = ['email_verified_at', 'status', 'parent_id', 'age', 'cp_signature', 'mentor_signature', 'project_id', 'created_at', 'updated_at', 'media', 'project', 'roles', 'area_address', 'area_country', 'area_state', 'area_city'];

                                                        $fillableColumns = array_diff(array_keys($user->toArray()), $excludeColumns);

                                                            $attributes = \Illuminate\Support\Arr::only($user->toArray(), $fillableColumns);

                                                            $filledColumns = count(array_filter($attributes));

                                                            if ($filledColumns == count($fillableColumns)) {
                                                               $status = '<span class="badge badge-success">Completed</span>';
                                                            } else {
                                                                $status = '<span class="badge badge-warning">Incomplete</span>';
                                                            }
                                                    @endphp
                                                    {!! $status !!}
                                                </td>
                                                <td>
                                                    @if(count($user->reports) > 0)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-warning">Inactive</span>
                                                    @endif
                                                </td>

                                                <td class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1">
                                                        @can('edit_planter')
                                                            <li class="">
                                                                <a href="{{route('user.view', $user->id)}}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="View"><em class="icon ni ni-eye text-success"></em></a>
                                                            </li>
                                                        @endcan
                                                        @can('delete_planter')
                                                                <li class="">
                                                                    <a href="{{route('user.delete', $user->id)}}"  class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Delete"><em class="icon ni ni-trash-fill text-danger"></em></a>
                                                                </li>
                                                        @endcan
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
