@extends('rolepermission::layouts.master')

@section('content')
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">All Permissions</h3>
        </div><!-- .nk-block-head-content -->
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        @can('add_permission')
                        <li class="nk-block-tools-opt" data-toggle="modal" data-target="#modalCreate"><a href="{{ route('permission.create') }}" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add Permission</span></a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div><!-- .toggle-wrap -->
        </div><!-- .nk-block-head-content -->
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->
<div class="nk-block">
    <div class="card card-stretch">
        <div class="card-inner-group">
            <div class="card-inner p-0">
                <table style="width: 100%;" class="table datatable-init-export " data-export-title="Export" data-auto-responsive="false">
                    <thead>
                        <tr>
                            <th><span class="sub-text">Name</span></th>
                            <th> Action
                            </th>
                        </tr><!-- .nk-tb-item -->
                    </thead>
                    <tbody>
                        @if(count($rows))
                        @foreach ($rows as $row)
                        <tr>
                            <td>
                                {{ $row->name }}
                            </td>
                            <td class="">
                                <a class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('permission.edit',["id"=>$row->id]) }}"><em class="icon ni ni-edit-fill text-success"></em></a>
                                <a class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Delete" href="{{ route('permission.delete',["id"=>$row->id]) }}"><em class="icon ni ni-trash-fill text-danger"></em></a>
                            </td>
                        </tr><!-- .nk-tb-item -->
                        @endforeach
                        @else
                        <tr>
                            <td colspan="100">
                                <p class="text-center">No data found</p>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table><!-- .nk-tb-list -->
            </div>

        </div>
    </div><!-- .card -->
</div><!-- .nk-block -->
@endsection
