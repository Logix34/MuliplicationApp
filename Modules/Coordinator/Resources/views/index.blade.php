@extends('coordinator::layouts.master')

@section('content')
    <div class="nk-content " style="width: 100%;">
        <div class="">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview">

                        <div class="nk-block">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">All Coordinators
                                        <a href="{{route('coordinator.create')}}" class="btn btn-outline-success float-right"><em class="icon ni ni-plus"></em><span>Add Coordinator</span></a>
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

                                            <th class="nk-tb-col"><span class="sub-text">ID</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                            <th class="nk-tb-col nk-tb-col-tools text-right">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($coordinators as $coordinator)
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col">
                                                    <span>{{$coordinator->id}}</span>
                                                </td>
                                                <td class="nk-tb-col">
                                                    <span>{{$coordinator->name}}</span>
                                                </td>

                                                <td class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1">
                                                        @can('edit_coordinator')
                                                            <li class="">
                                                                <a href="{{ route('coordinator.edit',$coordinator->id) }}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                    <em class="icon ni ni-edit-fill text-success"></em>
                                                                </a>
                                                            </li>
                                                        @endcan
                                                        @can('delete_coordinator')
                                                            <li class="">
                                                                <form action="{{ route('coordinator.delete',$coordinator->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                        <em class="icon ni ni-trash-fill text-danger"></em>
                                                                    </button>
                                                                </form>
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
