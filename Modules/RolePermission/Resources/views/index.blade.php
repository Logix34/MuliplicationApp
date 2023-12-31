@extends('rolepermission::layouts.master')

@section('content')
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">All Roles</h3>
        </div><!-- .nk-block-head-content -->
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->
<div class="nk-block">
    <div class="card card-stretch">
        <div class="card-inner-group">
            <div class="card-inner p-0">
                <table class="nk-tb-list nk-tb-ulist">
                    <thead>
                        <tr class="nk-tb-item nk-tb-head">
                            <th class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="pid-all">
                                    <label class="custom-control-label" for="pid-all"></label>
                                </div>
                            </th>
                            <th class="nk-tb-col"><span class="sub-text">Role Name</span></th>
                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Number of users</span></th>
                            <th class="nk-tb-col nk-tb-col-tools text-right">
                            </th>
                        </tr><!-- .nk-tb-item -->
                    </thead>
                    <tbody>
                        @if(count($rows))
                        @foreach ($rows as $row)
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="pid-01">
                                    <label class="custom-control-label" for="pid-01"></label>
                                </div>
                            </td>
                            <td class="nk-tb-col">
                                <a href="#" class="project-title">
                                    <div class="project-info">
                                        <h6 class="title">{{ $row->name }}</h6>
                                    </div>
                                </a>
                            </td>
                            <td class="nk-tb-col tb-col-lg">
                                <span>0</span>
                            </td>
                            <td class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1">
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="{{ route('rolepermission.edit',["id"=>$row->id]) }}"><em class="icon ni ni-edit"></em><span>Assign Permissiond To Role</span></a></li>
                                                    {{-- <li><a data-toggle="modal" data-target="#modalDelete" href="#"><em class="icon ni ni-delete"></em><span>Delete Course</span></a></li> --}}
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
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
            <div class="card-inner">
                <div class="nk-block-between-md g-3">
                    <div class="g">
                        {{ $rows->links() }}
                    </div>
                </div><!-- .nk-block-between -->
            </div><!-- .card-inner -->
        </div>
    </div><!-- .card -->
</div><!-- .nk-block -->
@endsection
