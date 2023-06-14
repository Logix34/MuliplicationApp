@extends('rolepermission::layouts.master')

@section('content')
    <div class="components-preview">

        <div class="nk-block">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">All Role
                        @can('add_role')
                        <a href="{{route('role.create')}}" class="btn btn-primary float-right"><em class="icon ni ni-plus"></em><span>Add Role</span></a>
                        @endcan

                    </h4>

                    <div class="nk-block-des">
                        <!-- <p>Using the most basic table markup, here’s how <code class="code-class">.table</code> based tables look by default.</p> -->
                    </div>
                </div>
            </div>

            <div class="card card-preview">

                <div class="card-inner">
                    <table style="width: 100%;" class="table datatable-init-export" data-export-title="Export" data-auto-responsive="false">
                        <thead>
                            <tr >
                                <th><span class="sub-text">Name</span></th>
                                <th><span class="sub-text">Number of users</span></th>
                                <th ><span class="sub-text">Assign Role Permissions</span></th>
                                <th><span class="sub-text"></span></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($rows as $row)
                            <tr>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->users()->count() }}</td>
                                <td>
                                    @can('assign_permissions_to_roles')
                                        <span class="tb-status text-success"><a href="{{ route('rolepermission.edit',["id"=>$row->id]) }}" class="project-title">
                                        Role Permissions
                                    </a>
                                    </span>
                                    @endcan
                                </td>
                                <td class="">
{{--                                    @if($row->name != 'Church Planter' && $row->name != 'Denominational Leader' && $row->name != 'Regional Leader')--}}
{{--                                        <a class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('role.edit',["id"=>$row->id]) }}"><em class="icon ni ni-edit-fill text-success"></em></a>--}}
{{--                                        <a class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Delete" href="{{ route('role.delete',['id'=>$row->id]) }}"><em class="icon ni ni-trash-fill text-danger"></em></a>--}}
{{--                                    @endif--}}
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div><!-- .card-preview -->
        </div> <!-- nk-block -->

    </div><!-- .components-preview -->
@endsection
